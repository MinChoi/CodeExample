<style>
input{
float:left;
}
#content ul li {
background:none;
}
</style>
<div id="content">
<form action="/members/renewal" method="post" id="jqvalidated">
<div class="page-title">Renew membership</div>
	<div class="frow">
		<label><span>*</span>Number of employees</label>
		<?
			echo $this->Form->input('Member.member_tier_id',array('label'=>false,'div'=>'false','class'=>'validate[required]','onchange'=>'populateMemberShipFee(this.value)'));
		?>
	</div>

<fieldset style="display: none;"><input type="hidden" value="POST" name="_method">
<input type="hidden" id="Token312397786" value="8708e07235dbadcdc3d61af1eeeef758a0ca50e8" name="data[_Token][key]">
</fieldset><div id="errors">
	<ul>
		</ul>
</div>

<!--Second Form  Start-->

<!--Second Form  End-->
<!--Third Form  Start-->

<!--Third Form  End-->
<!--Fourth Form  Start-->
<div style="" id="dca_reg_frm_step_4">
	<script type="text/javascript">
	
		//<![CDATA[
		function populateMemberShipFee(OrganisationMemberTierId){
			var noe = parseInt(OrganisationMemberTierId);
			if(noe>0){
				switch(parseInt(noe)){
					case 1:	$('mfee_1').update('Membership Level 1-299 employees');		break;
					case 2:	$('mfee_1').update('Membership Level 300-599 employees');	break;
					case 3:	$('mfee_1').update('Membership Level 600-1199 employees');	break;
					case 4:	$('mfee_1').update('Membership Level 1200-2999 employees');	break;
					case 5:	$('mfee_1').update('Membership Level 3000+ employees');		break;
				}

				new Ajax.Request('/member_tiers/gettried/'+noe,
				  {
					method:'get',
					onSuccess: function(transport,serverechk){
					  var response = transport.responseText || "no response text";
					  var price = parseFloat(response);
					//  alert(price);  
					  var gst = get_gst(price,10);
					  $('mfee_2').update('$'+number_format(price-gst,2, '.', ','));
					
					  $('mfee_3').update('$'+number_format(gst, 2, '.', ','));
					  $('mfee_4').update('$'+number_format(price, 2, '.', ','));
					  $('mfee_5').update('$'+number_format(price,2, '.', ','));
					},
					onFailure: function(){ alert('Something went wrong...') }
				  });
			}else{
				alert('Please select number of employees.');
				regFormsGo(1);
			}
		}
				
		function number_format(number, decimals, dec_point, thousands_sep) {
			number = (number+'').replace(',', '').replace(' ', '');
			var n = !isFinite(+number) ? 0 : +number, 
				prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
				sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
				dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
				s = '',
				toFixedFix = function (n, prec) {
					var k = Math.pow(10, prec);
					return '' + Math.round(n * k) / k;
				};
			// Fix for IE parseFloat(0.55).toFixed(0) = 0;
			s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
			if (s[0].length > 3) {
				s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
			}
			if ((s[1] || '').length < prec) {
				s[1] = s[1] || '';
				s[1] += new Array(prec - s[1].length + 1).join('0');
			}
			return s.join(dec);
		}
		
		
		function get_gst($total,$percentage){
			$processed_percentage = (parseFloat($percentage)/100);
			$percentage_plus_one = parseFloat($processed_percentage)+1;

			$real_price =  parseFloat($total)/parseFloat($percentage_plus_one);
			$gst = parseFloat($real_price) * parseFloat($processed_percentage);
			return $gst;
		}

		//]]>
	</script>
	<div id="membershipfee">
		<div class="title_row">
			Confirmation of your membership application
		</div>
		<div class="irow">
			<div id="mfee_1" class="mfee_l">Membership Level </div>
			<div id="mfee_2" class="mfee_v">$0,000.00</div>
		</div>
		<div class="irow" id="membershipfee_info">
			<div class="mfee_l">GST</div>
			<div id="mfee_3" class="mfee_v">$000.00</div>
		</div>
		<div class="irow" id="membershipfee_info">
			<div class="mfee_l_bold">TOTAL</div>
			<div id="mfee_4" class="mfee_v_bold">$0,000.00</div>
		</div>
	</div>
	<script type="text/javascript">
	<!--
	function selectPayment(type){
		if(type=='cc'){
			$('cc_frm').show();
			$('snt-invoice-payment').hide();
		}else{
			$('cc_frm').hide();
			$('snt-invoice-payment').show();
		}
	}
	-->
	</script>
		<div class="frow">
			<label class="widthfinal"><span>*</span>How would you like to pay?</label>
			<div class="option" style="width:310px; margin-top:4px">

				<input type="radio" name="data[CC][payment_method]" id="pay_inv_2" value="2"  onclick="selectPayment('inv');" checked="checked" /><label for="pay_inv_2">Email me an invoice for payment</label> 
				<div class="hint">
					You will receive an invoice within a maximum of 3 business days. Upon receiving payment, we will email you a receipt within 3 business days.
				</div>
				
				<!--<input type="radio" name="data[CC][payment_method]" id="pay_inv_1" value="1" checked="checked" onclick="selectPayment('cc');" /><label for="pay_inv_1" style="margin-left:25px">Pay with credit card</label> -->
				<div class="hint">
					<!--You will receive a receipt via email once your payment has been processed.-->
				</div>	
			
			</div>
		</div>

	<div id="errors">
		<ul>
		<?
			if(isset($errors)){
				foreach($errors as $error){
					$error_arr = explode(':',$error);
					echo '<li style="color:#DD0000">'.(isset($error_arr[1])?$error_arr[1]:$error_arr[0]).'</li>';		
				}
			}
		?>
		</ul>
	</div>	
	<div class="frow">
		<a class="reg_nxt_btn" onclick="regFormsGo(5,'dca_reg_frm_step_4',1);return false;" href="#regfrm" id="redlink4">Submit</a>
	</div>
</div>
<!--Fourth Form  End-->
</form>
</div>

<script type="text/javascript">
<!--
	populateMemberShipFee('<?=$this->request->data['Member']['member_tier_id']?>');
//-->
</script>