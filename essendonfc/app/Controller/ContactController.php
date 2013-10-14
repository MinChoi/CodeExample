<?
/**
 * This controller now supports the basic "Contact Us" functionality
 * Which can be used across sites.  To use this on a site:
 * 
 *   - Set Configure::write('Core.ClientEmail') and Configure::write('Core.SiteTitle') in core.php
 *   - Link to /contact_us to display the form
 *   - To customise the form, copy /CORE/View/ContactUs/index.php into /app/
 *   - To customise the email, copy /CORE/View/Emails/html/default.php into /app/
 *   - To customise the thankyou page, copy /CORE/View/ContactUs/contact_complete.ctp into /app/
 * 
 */
App::uses('CakeEmail', 'Network/Email');
App::uses('CmsCoreController', 'Controller');
class ContactController extends CmsCoreController {
	
	public $uses = array();
	public $helpers = array('CmsForm');
		
	// TODO: Block spambots somehow, some javascript tricks perhaps
	function CustServiceTeam() {
		// We'll load the widgets from page #190 (the "New Members" page)
		$this->loadModel('Page');
		$page = $this->Page->findById(190);
		if ($page)
			$this->set('widgets', $page['Widget']);
		
		// no logic required for initial GET request, only upon POST
		if ($this->request->isPost()) {
			$e = &$this->request->data;
			$email = new CakeEmail('DebugAndLog');
			$email->from(array(Configure::read('Core.ClientEmail') => $e['First_name'] . ' ' . $e['Last_name']))
				// You can set the following two values in your core.php (so you don't have to edit this file!)
				  ->to(Configure::read('Core.ClientEmail'))
				  ->subject('Membership Site: Callback requested')
				  ->viewVars(array('fields' => $e))
				  ->template('cust_service_team')				// View/Emails/html/CustServiceTeam.ctp and View/Layouts/Emails/html/CustServiceTeam.ctp
				  ->emailFormat('html')
				  ->send();
				  
			// Show this view to the user
			$this->view = 'contact_complete';
		}
	}	
	
}