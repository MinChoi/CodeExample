<?
/*********************************
 * PAYPAL SIMPLE PAY FUNCTIONALITY
 * Works with (and relies upon) Paypal Controller
 * Currently uses Paypal "Express Checkout for Digital Goods"
 * which allows for quick lightbox-style checkouts.
 * 
 * REQUIREMENTS:
 * 		- CakePHP 2.0+
 * 		- PHP with CURL extensions
 * 		- Need to sign up for Paypal API keys as well as
 * 		  Sandbox API keys
 * 		- Need to sign up for digitally delivered goods
 * 		- These need to be configured in core.php (see below)
 *		
 * USAGE: 
 * 		The Paypal helper is used simply by calling: 
 * 
 * 				$this->Paypal->payButton(amount, description, success action, redirect);
 * 				$this->Paypal->payButton(30.00, 'Membership Fee', '/controller/payment_success', '/controller/thankyou_page');
 *			
 * 		The API keys must be configured inside core.php, example:
 * 
 * 			// Paypal Configuration.  Used by PaypalHelper & PaypalController
 *			// Comment out UseSandbox when on production
 *			Configure::write('Paypal.UseSandbox', true);
 *			Configure::write('Paypal.Live', array(
 *				'API_UserName' 	=> '',
 *				'API_Password' 	=> '',
 *				'API_Signature' => '',
 *			));
 *			Configure::write('Paypal.Sandbox', array(
 *				'API_UserName' 	=> 'me_1338862281_biz_api1.simoneast.net',
 *				'API_Password' 	=> '1338862302',
 *				'API_Signature' => 'ARUcIvcPOtkiKc5VG-n4Ck.gikbZAwLcLpPWlYvh6HBcxwzI7vm1K5Zb',
 *			));
 *
 *		You then create an action which receives the data after Paypal succeeds. Example:
 *
 *			// Paypal callback. Called only via requestAction from Paypal controller
 *			// Transaction data is inside $this->params is email, amount, transactionId, itemId, data
 *			public function payment_success() {
 *				if (!$this->params['requested']) throw new ForbiddenException();		
 *				$job = array(
 *					'id' => $this->params['itemId'],
 *					'paid' => 1,
 *					'paid_date' => mysql_date(),
 *					'paypal_address' => $this->params['email'],
 *					'paypal_transaction_id' => $this->params['transactionId'],
 *					'paypal_data' => json_encode($this->params['data']),
 *					'expiry_date' => mysql_date(strtotime('+31 days')),
 *				);
 *				return $this->Job->save($job);
 *			}
 * 
 * Debugging and sandbox testing is enabled by either:
 * 		- Appending ?ppDebug to the URL containing the Paypal button
 * 		- Calling the Paypal helper with the 5th (optional) parameter as true
 * 
 * Enabling debugging means that:
 * 		- The helper will display a warning that its in sandbox mode
 * 		- The helper will print out extra info about test login details to use
 * 		- The transaction will be sent to Paypal's SANDBOX servers NOT the live ones
 * 		- The receiving account will be different
 * 		- Notification emails are not sent by Paypal, instead they are stored 
 * 		  in the developer sandbox area
 * 
 * Payment process explained:
 * 		1.  User reaches page containing pay button, PaypalHelper embeds form 
 * 		    with hidden (and security hashed) fields.  Paypal JS is also loaded.
 * 		2.  When user clicks pay button, Paypal script detects whether user has
 * 		    paid via this site before.  If so, a lightbox is presented.
 * 		    If not, a popup window is presented (guessing this is more secure?)
 * 		3.  /paypal/checkout Cake action is loaded in iframe/popup
 * 		4.  The action makes an initial authorisation request to Paypal (PHP+curl) 
 * 			& receives a token
 * 		5.  Action triggers Paypal's JS code & Paypal login screen is presented in
 * 			popup/lightbox
 * 		6.  User uses Paypal to select payment method etc. then clicks "Pay Now"
 * 		7.  Popup/lightbox is redirected back to local site:
 *  		 /paypal/confirmation?token=EC-58U18781SL743431X&PayerID=YCSCZT25MLGXE
 * 		8.  The action asks Paypal for transaction details based on token & ID (PHP+curl)
 *		9.  If this succeeds, action asks Paypal (PHP+curl) to perform transaction
 *		10. Popup/lightbox is closed and main window is redirected to final URL
 *			(or a JS callback is performed)
 *
 * Based upon Paypal's integration manual:
 * https://cms.paypal.com/cms_content/US/en_US/files/developer/PP_ExpressCheckout_IntegrationGuide_DG.pdf
 * 
 * This does NOT have support for shipping addresses
 * or some other advanced features. It's designed for single digital payments.
 *********************************/
class PaypalHelper extends AppHelper {

	public $helpers = array('Form');

	/**
	 * Displays a "Pay Now" Paypal button with the following attributes
	 *
	 * Limitations: will probably not work when used more than once per page
	 *
	 * @param $itemId - database ID for the product/item. This will be sent to the successAction
	 * 					and the redirect page as an additional parameter
	 * @param $amount - dollar amount to charge user
	 * @param $description - description of the item to be printed on the Paypal receipt
	 * @param $successAction - Cake URL to pass the successful result to 
	 * 			eg. /members/join_success
	 * 			Various pieces of info returned from Paypal will be passed into $this->params
	 * 			This action should also protect against users loading it directly in their browser
	 * 			(see the example code that throws an exception)
	 * @param $redirect - URL to redirect user to on successful completion 
	 * 			eg. "/members/join_thankyou" (no trailing slash)
	 * 			$itemId will then be appended to this in case you need to make use of this
	 * 				= /members/join_thankyou/123
	 * @param $debug - boolean indicating whether to pause after payment and display debug info
	 * 			This can also be activated by appending ?ppDebug to the URL or in core.php
	 * @return HTML code containing form, hidden fields, button, javascript, etc.
	 */
	// If no redirect is desired (using JS callbacks instead), send null
	function payButton($itemId, $amount, $description, $successAction, $redirect, $debug = false) {
		// Allow debugging of Paypal at any time by appending ?ppDebug to URL
		if (isset($_GET['ppDebug']) || Configure::read('Paypal.UseSandbox')) $debug = true;
		$settings = serialize(get_defined_vars());
		?>
	
		<!-- INFO: The post URL "/paypal/checkout" is invoked when clicking on "Pay with PayPal" button -->

		<form action="/paypal/checkout" method="POST" class="paypalButtonForm">
			<?= $this->Form->hidden('settings', array('value' => $settings)) ?>
			<?= $this->Form->hidden('hash', array('value' => Security::hash($settings, null, true))) ?>
			
			<input type="image" name="paypal_submit" id="paypal_submit" 
			src="//www.paypal.com/en_US/i/btn/btn_dg_pay_w_paypal.gif" border="0" align="top" alt="Pay with PayPal"/>
			
		</form>

		<?// Add Paypal's digital goods in-context experience. Ensure that this script is added before the closing of html body tag ?>
		<script src="//www.paypalobjects.com/js/external/dg.js" type="text/javascript"></script>
		<script type="text/javascript">

			var dg = new PAYPAL.apps.DGFlow({
				trigger: 'paypal_submit',	// Dom ID of button
				expType: 'instant',
				RMC: true,
				// PayPal will decide the experience type for the buyer based on his/her 'Remember me on your computer' option.
				// expType can be any of:
				//		instant 	(uses lightbox when possible), 
				//		mini 		(always uses popup), 
				//		popup 		(popup with no mask on page), 
				//		or left empty
			});
			
			var PaypalCallback = {
				// success: function() { alert('yay!') },
				cancel: function() { alert('ooh, cancelled...') },
				fail: function() { alert('oops, failed...') }
			};

		</script>
		<style type="text/css">
			form.paypalButtonForm {
				margin: 0;
				padding: 0;
			}
			#paypal_submit {
				display: block;
				clear: both;
			}
			#paypal_submit:hover {
				background-color: #FFE4B5;
			}
		</style>
		
		<? if (!Configure::read('Paypal')) { ?>
			<div style="color: #c00; font-weight: bold">Warning: Paypal settings are missing. Ensure they are set in core.php.</div>
		<? } if ($debug) { ?>
			<div style="border: 1px solid #c00; padding: 20px; margin-top: 20px">
				<div style="color: #c00; font-weight: bold">Warning: Currently in Paypal Sandbox Mode</div>
				You can perform test transactions by using Paypal login test@simoneast.net / captainmartha3
				<br/>or, by using sample credit card numbers from <a href="http://www.darkcoding.net/credit-card-numbers/" target="_blank">this page</a>
				<br/>This message will disappear as soon as sandbox mode is disabled.
			</div>
<? }}
	
	function cards() { ?>
		<div class="paypalCards">
			<div class="ccard visa" style="background-position: 0px -30px"></div>
			<div class="ccard amex" style="background-position: 0px -120px"></div>
			<div class="ccard mastercard" style="background-position: 0px -60px"></div>
			<div class="ccard diners" style="background-position: 0px -332px; margin-left: 5px;"></div>
		</div>
		<style type="text/css">
			.paypalCards { overflow: hidden; /* to contain the floats */ margin-bottom: 5px; }
			.paypalCards .ccard {
				background-image: url(//www.paypalobjects.com/en_US/i/logo/payment_icons_sprite.2D.png);
				width: 37px;
				height: 25px;
				float: left;
				margin-right: 3px;
			}
		</style>
		<?
	}
	
	function explanation() { ?>
		<p>We utilise <strong>Paypal</strong> to handle payments securely.  You can pay quickly &amp; easily using a credit card (or a bank account if previously setup) and we will never see your private financial information. If you don't have an account, simply choose "Buy as a Guest". <a href="#" onclick="javascript:window.open('https://www.paypal.com/au/cgi-bin/webscr?cmd=xpt/Marketing/popup/OLCWhatIsPayPal-outside','olcwhatispaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=400, height=350');">More information about Paypal</a>.</p>
		<?
	}
}
