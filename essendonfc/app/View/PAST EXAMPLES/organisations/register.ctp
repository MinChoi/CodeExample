<?
if(isset($success)){
?>
	<div class="page-title">Registration Completed Successfully</div>
	<?
		if($payment_method=='online'){
	?>
	<p>Thank you, your payment has been received and your organisation is now a DCA member. The nominated key contact and any additional account holders set up in the membership process will receive emails notifying them of their DCA website log-in details to access member-only content.</p>
	<p>The Key Contact will receive a payment receipt via email.</p>
	<p>Your organisation also has the option to become a 'full member'. This gives your organisation voting rights at the AGM, the ability to nominate directors etc. <a href="/membership/information-about-full-membership.html">Click here</a> to read more and to download the form. The Key Contact will also receive a copy of the form via email.</p>
	<?
		}else{
	?>
	<p>Thank you, your invoice will be sent to the nominated address within 3 business days. Your membership will then be activated within 3 days of receipt of payment.</p>

	<p>If you have a special need to access DCA's member services in advance of payment please contact us and we will try to accommodate your request.</p>

	<p>Your organisation also has the option to become a 'full member'. This gives your organisation voting rights at the AGM, the ability to nominate directors etc. <a href="/membership/information-about-full-membership.html">Click here</a> to read more and to download the form.</p>

	<p>The Key Contact will receive a copy of the full member application form via email.</p>
	<?
		}
	?>
<?
}else{
?>
<script type="text/javascript">
<!--
jQuery(document).ready(function()
{
	jQuery('a.scroll').bind("click", jump);
	$countries = sCountryString.split('|');   
	var $country_iArr = ['OrganisationStreetCountryId','OrganisationPostalCountryId','OrganisationCeoCountryId','OrganisationKcCountryId'];
	jQuery.each($country_iArr, function(key, value){   
		var $states;

		$states = aStates[jQuery('#'+value).find('option:selected').val()].split('|');
		switch(value){
			case 'OrganisationStreetCountryId':
			attachToSelect('OrganisationStreetStateId',$states);
			break;
			case 'OrganisationPostalCountryId':
			attachToSelect('OrganisationPostalStateId',$states);
			break;
			case 'OrganisationCeoCountryId':
			attachToSelect('OrganisationCeoStateId',$states);
			break;
			case 'OrganisationKcCountryId':
			attachToSelect('OrganisationKcStateId',$states);
			break;
		}

		
		jQuery("#"+value).bind('change', function() {
			var $states = aStates[jQuery(this).find('option:selected').val()].split('|');
			switch(jQuery(this).attr('id')){
				case 'OrganisationStreetCountryId':
				attachToSelect('OrganisationStreetStateId',$states);
				break;
				case 'OrganisationPostalCountryId':
				attachToSelect('OrganisationPostalStateId',$states);
				break;
				case 'OrganisationCeoCountryId':
				attachToSelect('OrganisationCeoStateId',$states);
				break;
				case 'OrganisationKcCountryId':
				attachToSelect('OrganisationKcStateId',$states);
				break;
			}
		});
	});
       return false;
});

-->
</script>
<div class="page-title">Become a DCA member</div>
<a id="regfrm" name="regfrm">&nbsp;</a>
<div id="dca_rm_steps" class="dca_reg_steps dca_reg_org"></div><br />
<?= $this->Form->create('Organisation',array('id'=>'jqvalidated','url'=>'/organisations/register'));?>
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
<div id="dca_reg_frm_step_1" style="display:block;">
	<div><b>Complete the following details for your organisation</b></div>
	<h2 class="sub_head">Organisation</h2>
	<div class="frow">
		<label><span>*</span>Name of Organisation</label>
		<?
			echo $this->Form->input('Organisation.name',array('label'=>false,'div'=>'false','class'=>'validate[required,ajax[ajaxName]]'));
		?>
	</div>
	<h2 class="sub_head">Organisation street address</h2>
	<div class="frow">
		<label><span>*</span>Country</label>
		<?
			echo $this->Form->input('Organisation.street_country_id',array('label'=>false,'div'=>'false','class'=>'validate[required]','options'=>$countires,'default'=>13));
		?>
	</div>
	<div class="frow">
		<label><span>*</span>Street address 1</label>
		<?
			echo $this->Form->input('Organisation.street_address_1',array('label'=>false,'div'=>'false','class'=>'validate[required]'));
		?>
	</div>
	<div class="frow">
		<label>Street address 2</label>
		<?
			echo $this->Form->input('Organisation.street_address_2',array('label'=>false,'div'=>'false','class'=>''));
		?>
	</div>
	<div class="frow">
		<label><span>*</span>Suburb/City</label>
		<?
			echo $this->Form->input('Organisation.street_suburb',array('label'=>false,'div'=>'false','class'=>'validate[required]'));
		?>
	</div>
	<div class="frow">
		<label><span>*</span>Postcode</label>
		<?
			echo $this->Form->input('Organisation.street_postcode',array('label'=>false,'div'=>'false','class'=>'validate[required,onlyNumber]'));
		?>
	</div>
	<div class="frow">
		<label><span>*</span>State</label>
		<?
			echo $this->Form->input('Organisation.street_state_id',array('label'=>false,'div'=>'false','class'=>'validate[required]','options'=>$states));
		?>
	</div>
	<h2 class="sub_head">Organisation postal address</h2>
	<div class="frow">
		<label>&nbsp;</label>
		<div class="option">
			<input type="radio" name="data[Organisation][postal_address_chk]" id="org_pos_addr_1" checked="checked" onclick="$('postaladdress').hide();" value="0"  /><label for="org_pos_addr_1">Same as organisation's address</label><br />
			<input type="radio" name="data[Organisation][postal_address_chk]" id="org_pos_addr_2" onclick="$('postaladdress').show();" value="1"  /><label for="org_pos_addr_2">Different from organisation's address</label> 
		</div>
	</div>
	<div id="postaladdress" style="display:none;">
	<div class="frow">
		<label>Country</label>
		<?
			echo $this->Form->input('Organisation.postal_country_id',array('label'=>false,'div'=>'false','options'=>$countires,'default'=>13));
		?>
	</div>
	<div class="frow">
		<label>Postal address 1</label>
		<?
			echo $this->Form->input('Organisation.postal_address_1',array('label'=>false,'div'=>'false'));
		?>
	</div>
	<div class="frow">
		<label>Postal address 2</label>
		<?
			echo $this->Form->input('Organisation.postal_address_2',array('label'=>false,'div'=>'false'));
		?>
	</div>
	<div class="frow">
		<label>Suburb/City</label>
		<?
			echo $this->Form->input('Organisation.postal_suburb',array('label'=>false,'div'=>'false'));
		?>
	</div>
	<div class="frow">
		<label>Postcode</label>
		<?
			echo $this->Form->input('Organisation.postal_postcode',array('label'=>false,'div'=>'false','class'=>'validate[onlyNumber]'));
		?>
	</div>
	<div class="frow">
		<label>State</label>
		<?
			echo $this->Form->input('Organisation.postal_state_id',array('label'=>false,'div'=>'false','options'=>$states));
		?>
	</div>
	</div>
	<h2 class="sub_head">Other organisation details</h2>
	<div class="frow">
		<label>Phone number</label>
		<?
			echo $this->Form->input('Organisation.phonenumber',array('label'=>false,'div'=>'false','class'=>'validate[telephone]'));
		?>
	</div>
	<div class="frow">
		<label>Website address</label>
		<?
			echo $this->Form->input('Organisation.website',array('label'=>false,'div'=>'false'));
		?>
	</div>
	<div class="frow">
		<label>Parent company</label>
		<?
			echo $this->Form->input('Organisation.parent_company',array('label'=>false,'div'=>'false'));
		?>
	</div>
	<div class="frow">
		<label>States/territories in<br />
			   which the organisation <br />
			   operates
		</label>
		<div id="multichk">
		<?
			echo $this->Form->input('OperatingArea.OperatingArea',array('label'=>false,'options'=>$operatingAreas,'multiple'=>'checkbox'));
		?>
		</div>
	</div>
	<div class="frow">
		<label><span>*</span>Industry/Sector</label>
		<?
			echo $this->Form->input('Organisation.industry_type_id',array('label'=>false,'div'=>'false','class'=>'','options'=>$industryTypes));//validate[required]
		?>
	</div>
	<div class="frow">
		<label><span>*</span>Number of employees</label>
		<?
			echo $this->Form->input('Organisation.member_tier_id',array('label'=>false,'div'=>'false','class'=>'validate[required]'));
		?>
	</div>
	<div class="frow">
		<label><span>*</span>What is the main<br />
		reason your<br />organisation has<br />decided to become a<br />
		DCA member?</label>
		<?
		echo $this->Form->input('Organisation.reason_id',array('label'=>false,'div'=>'false','class'=>'validate[required]','onchange'=>'checkForOther(this.value);'));
		?>
		<div id="reason_txt" class="false required" style="display:none;float:left;margin-top:10px;width:260px;">
			<input type="text" id="ortxt" name="data[Organisation][reason_txt]"  value="Please specify here..." onfocus="focustext();" />
		</div>
		<script type="text/javascript">
			//<![CDATA[
			function checkForOther(val){
				$('reason_txt').hide();
				if(val==5){
					$('reason_txt').show();
				}
			}
			
			function focustext(){
				if($('ortxt').value=='Please specify here...'){
					$('ortxt').value = '';
				}
			}
			//]]>
		</script>
	</div>
	<div class="frow">
		<a id="redlink1" href="#regfrm" onclick="regFormsGo(2,'dca_reg_frm_step_1',1);return false;" class="reg_nxt_btn scroll">Next &gt;</a>
	</div>
</div>
<!--Second Form  Start-->
<div id="dca_reg_frm_step_2" style="display:none;">
	<div><b>Please complete the following details for the key people in your organisation</b></div>
	<h2 class="sub_head">Chief Executive Officer</h2>
	<div class="frow">
		<label><span>*</span>Given Name</label>
		<?
			echo $this->Form->input('Organisation.ceo_gname',array('label'=>false,'div'=>'false','class'=>'validate[required]'));
		?>
	</div>
	<div class="frow">
		<label><span>*</span>Last Name</label>
		<?
			echo $this->Form->input('Organisation.ceo_lname',array('label'=>false,'div'=>'false','class'=>'validate[required]'));
		?>
	</div>
	<div class="frow">
		<label><span>*</span>CEO's address</label>
		<div class="option">
			<input type="radio" name="data[Organisation][ceo_address_chk]" id="ceo_addr_1" checked="checked" onclick="$('ceo_address').hide();" value="0" /><label for="ceo_addr_1">Same as organisation's address</label> 
			<input type="radio" name="data[Organisation][ceo_address_chk]" id="ceo_addr_2" onclick="$('ceo_address').show();" value="1" /><label for="ceo_addr_2">Different to organisation's address</label> 
		</div>
	</div>
	<div id="ceo_address" style="display:none;">
	<div class="frow">
		<label>Country</label>
		<?
			echo $this->Form->input('Organisation.ceo_country_id',array('label'=>false,'div'=>'false','options'=>$countires,'default'=>13));
		?>
	</div>
	<div class="frow">
		<label>Street address 1</label>
		<?
			echo $this->Form->input('Organisation.ceo_address_1',array('label'=>false,'div'=>'false'));
		?>
	</div>
	<div class="frow">
		<label>Street address 2</label>
		<?
			echo $this->Form->input('Organisation.ceo_address_2',array('label'=>false,'div'=>'false'));
		?>
	</div>
	<div class="frow">
		<label>Suburb/City</label>
		<?
			echo $this->Form->input('Organisation.ceo_suburb',array('label'=>false,'div'=>'false'));
		?>
	</div>
	<div class="frow">
		<label>Postcode</label>
		<?
			echo $this->Form->input('Organisation.ceo_postcode',array('label'=>false,'div'=>'false','class'=>'validate[onlyNumber]'));
		?>
	</div>
	<div class="frow">
		<label>State</label>
		<?
			echo $this->Form->input('Organisation.ceo_state_id',array('label'=>false,'div'=>'false','options'=>$states));
		?>
	</div>
	</div>
	<h2 class="sub_head">Personnel/ HR Director</h2>
	<div class="frow">
		<label>Given Name</label>
		<?
			echo $this->Form->input('Organisation.hr_gname',array('label'=>false,'div'=>'false'));
		?>
	</div>
	<div class="frow">
		<label>Last Name</label>
		<?
			echo $this->Form->input('Organisation.hr_lname',array('label'=>false,'div'=>'false'));
		?>
	</div>
	<div class="frow">
		<label>Email address</label>
		<?
			echo $this->Form->input('Organisation.hr_email',array('label'=>false,'div'=>'false'));
		?>
	</div>
	<h2 class="sub_head">Head of Diversity/ Diversity Manager</h2>
	<div class="frow">
		<label></label>
		<div class="option">
		<input type="checkbox" name="data[OrganisationExtra][sameashr]" id="Organisationsameashr" onclick="sameashr(this.checked);" /><label for="head_of_dive">Same as Personnel/HR Director</label> 
		</div>
	</div>
	<script type="text/javascript">
		//<![CDATA[
		function sameashr(chk_status){
			if(chk_status){
				$('OrganisationHodGname').value = $('OrganisationHrGname').value 
				$('OrganisationHodLname').value = $('OrganisationHrLname').value 
				$('OrganisationHodEmail').value = $('OrganisationHrEmail').value 
			}else{
				$('OrganisationHodGname').value = '';
				$('OrganisationHodLname').value = '';
				$('OrganisationHodEmail').value = '';

			}
		}
		//]]>
	</script>
	<div class="frow">
		<label>Given Name</label>
		<?
			echo $this->Form->input('Organisation.hod_gname',array('label'=>false,'div'=>'false'));
		?>
	</div>
	<div class="frow">
		<label>Last Name</label>
		<?
			echo $this->Form->input('Organisation.hod_lname',array('label'=>false,'div'=>'false'));
		?>
	</div>
	<div class="frow">
		<label>Email address</label>
		<?
			echo $this->Form->input('Organisation.hod_email',array('label'=>false,'div'=>'false'));
		?>
	</div>
	<h2 class="sub_head">Key Contact</h2>
	<p>The Key Contact is the person responsible for managing the organisation's details and
	payment/renewals relating to the DCA membership. They will be the key contact for
	membership matters and may also be asked to particpate in surveys on key diversity
	issues.<p>
	<p>
	Each DCA member organisation <u>must</u> nominate a key contact.</p>
	<p><b>The Key Contact will be automatically set up with a DCA website account.</b></p>
	<div class="frow">
		<label><span>*</span>Given name</label>
		<?
			echo $this->Form->input('Organisation.kc_gname',array('label'=>false,'div'=>'false','class'=>'validate[required]'));
		?>
	</div>
	<div class="frow">
		<label><span>*</span>Last name</label>
		<?
			echo $this->Form->input('Organisation.kc_lname',array('label'=>false,'div'=>'false','class'=>'validate[required]'));
		?>
	</div>
	<div class="frow">
		<label><span>*</span>Position title</label>
		<?
			echo $this->Form->input('Organisation.kc_position',array('label'=>false,'div'=>'false','class'=>'validate[required]'));
		?>
	</div>
	<div class="frow">
		<label><span>*</span>Email address</label>
		<?
			echo $this->Form->input('Organisation.kc_email',array('label'=>false,'div'=>'false','class'=>'validate[required,custom[email],ajax[ajaxEmail]]'));
		?>
	</div>
	<div class="frow">
		<label><span>*</span>Phone number</label>
		<?
			echo $this->Form->input('Organisation.kc_phone',array('label'=>false,'div'=>'false','class'=>'validate[required]'));
		?>
	</div>
	<div class="frow">
		<label><span>*</span>Mailing address</label>
		<div class="option">
			<input type="radio" name="data[Organisation][kc_address_chk]" id="key_con_1" checked="checked" onclick="$('kc_address').hide();" value="0" /><label for="key_con_1">Same as organisation's street address</label> 
			<input type="radio" name="data[Organisation][kc_address_chk]" id="key_con_2" onclick="$('kc_address').show();" value="1" /><label for="key_con_2">Different from organisation's street address</label> 
		</div>
	</div>
	<div id="kc_address" style="display:none;">
	<div class="frow">
		<label>Country</label>
		<?
			echo $this->Form->input('Organisation.kc_country_id',array('label'=>false,'div'=>'false','options'=>$countires,'default'=>13));
		?>
	</div>
	<div class="frow">
		<label>Street address 1</label>
		<?
			echo $this->Form->input('Organisation.kc_address_1',array('label'=>false,'div'=>'false'));
		?>
	</div>
	<div class="frow">
		<label>Street address 2</label>
		<?
			echo $this->Form->input('Organisation.kc_address_2',array('label'=>false,'div'=>'false'));
		?>
	</div>
	<div class="frow">
		<label>Suburb/City</label>
		<?
			echo $this->Form->input('Organisation.kc_suburb',array('label'=>false,'div'=>'false'));
		?>
	</div>
	<div class="frow">
		<label>Postcode</label>
		<?
			echo $this->Form->input('Organisation.kc_postcode',array('label'=>false,'div'=>'false','class'=>'validate[onlyNumber]'));
		?>
	</div>
	<div class="frow">
		<label>State</label>
		<?
			echo $this->Form->input('Organisation.kc_state_id',array('label'=>false,'div'=>'false','options'=>$states));
		?>
	</div>
	</div>
	<div class="frow">
		<a id="redlink2" href="#regfrm" onclick="regFormsGo(3,'dca_reg_frm_step_2',1);" class="reg_nxt_btn scroll">Next &gt;</a>
		<a id="redlink3" href="#regfrm" onclick="regFormsGo(1,'dca_reg_frm_step_2',0);" class="reg_bk_btn scroll">&lt; Back</a>
	</div>
</div>
<!--Second Form  End-->
<!--Third Form  Start-->
<div id="dca_reg_frm_step_3" style="display:none;">
	<p><b>If you want to create DCA website accounts for additional employees of your
		organisation, please add them below.</b></p>
	<p>Employees of your organisation can create individual accounts to log in to access
	members only resources on the website. (Each individual will be sent an email
	advising them of their login details).</p>
	<p>Individuals can also create their own accounts via the website if you don't create
	them here.</p>
	<p><b>Create new accounts by clicking the 'add another account' button below or
	click the 'next' button now to skip this step.</b></p>
	
	<script type="text/javascript">
	//<![CDATA[
		function populateData(){
			$('row_0').down('b').update($('OrganisationKcGname').value+' '+$('OrganisationKcLname').value);
		}
		
		function populateData(){
			$('row_0').down('b').update($('OrganisationKcGname').value+' '+$('OrganisationKcLname').value);
		}
		
		function addindividual(){
			var i = 1;
			
			//Create Unique ID
			while(1){if($('indi_row_'+i)==null){break;}i++;}
			
			$('individual_forms').insert('<div id="individual_forms_'+i+'"><h2 class="sub_head">New Individual account</h2><div class="frow"><label><span>*</span>Given name</label><input type="text" name="nia_fname" id="nia_fname_'+i+'"/></div><div class="frow"><label><span>*</span>Last Name</label><input type="text" name="nia_lname" id="nia_lname_'+i+'" /></div><div class="frow"><label><span>*</span>Position title</label><input type="text" name="nia_title" id="nia_title_'+i+'" /></div><div class="frow"><label><span>*</span>Email address</label><input type="text" name="nia_email" id="nia_email_'+i+'" /></div><div class="frow"><a href="#" onclick="cancelthisacc('+i+');return false;" class="cancelthisaccbtn">cancel</a><a href="#" onclick="saveindividual('+i+');return false;" class="addthisaccbtn">ADD THIS ACCOUNT</a></div></div>');
		}
		
		function cancelthisacc(id){
			$('individual_forms_'+id).remove();
		}
		function deleteindividual(idi){
			if(confirm('Are you sure you want to delete this individual account?')){
				$('indi_row_'+idi).remove();
			}
		}
		function saveindividual(id){
			validateIndividual(id);
		}
		
		function validateIndividual(idi){
			if($('nia_fname_'+idi).value.trim().length==0){
				alert('Please enter given name.');
				return false;
			}
			if($('nia_lname_'+idi).value.trim().length==0){
				alert('Please enter last name.');
				return false;
			}
			if($('nia_title_'+idi).value.trim().length==0){
				alert('Please enter position title.');
				return false;
			}
			
			if($('nia_email_'+idi).value.trim().length==0 || isValidEmailAddress($('nia_email_'+idi).value.trim())==false){
				alert('Please enter a valid email.');
				return false;
			}
			
			if(checkcurrentemail($('nia_email_'+idi).value.trim())){
				alert('Please try with another email, This email already added.');
				return false;
			}
			

			new Ajax.Request('/members/checkemail/'+$('nia_email_'+idi).value+'/nia_email_'+idi,
			  {
				method:'get',
				onSuccess: function(transport,serverechk){
				  var response = transport.responseText || "no response text";
				  if(response.trim()=='{"jsonValidateReturn":["nia_email_'+idi+'","ajaxEmail","true"]}')
				  {
					$('individual_rows').insert('<div id="indi_row_'+idi+'" class="irow"><b>'+$('nia_fname_'+idi).value.trim()+' '+$('nia_lname_'+idi).value.trim()+'</b><span>x <a href="#" onclick="deleteindividual('+idi+');return false;">remove</a></span><input type="hidden" name="data[individuals]['+idi+'][gname]" value="'+$('nia_fname_'+idi).value.trim()+'" /><input type="hidden" name="data[individuals]['+idi+'][lname]" value="'+$('nia_lname_'+idi).value.trim()+'" /><input type="hidden" name="data[individuals]['+idi+'][position]" value="'+$('nia_title_'+idi).value.trim()+'" /><input type="hidden" name="data[individuals]['+idi+'][email]" class="hidden_emails" id="hidden_iemail_'+idi+'" value="'+$('nia_email_'+idi).value.trim()+'" /></div>');
					$('individual_forms_'+idi).remove();
				  }else{
					alert('Please try with another email, This email already registered.');
				  }
				},
				onFailure: function(){ alert('Something went wrong...') }
			  });
			
			return true;
		}
		function isValidEmailAddress(emailAddress) {
			var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
			return pattern.test(emailAddress);
		}

		function checkcurrentemail($email){
			$indirows = $('individual_rows').childElements();
			length = $indirows.size();
			for(var ei=0;ei<length;ei++){
				if($indirows[ei].down('input.hidden_emails').value==$email){
					return true;
				}
			}
			if($('OrganisationKcEmail').value.trim()==$email){
				return true;
			}
			return false;;
		}
		//]]>
	</script>
	<div id="individuals">
		<div class="title_row">
			Current Individual Accounts
		</div>
		<div id="row_0" class="irow">
			<b> 
			<?
				if($this->request->data['Organisation']['kc_lname']){
					echo $this->request->data['Organisation']['kc_gname'].' '.$this->request->data['Organisation']['kc_lname'];
				}
			?>
			</b>
			<span class="inactive">key contact, cannot remove</span>
		</div>
		<div id="individual_rows">
			<?
				if(isset($this->request->data['individuals'])){
					foreach($this->request->data['individuals'] as $key=>$individuals){
			?>
			<div id="indi_row_<?=$key?>" class="irow">
				<b><?=$individuals['gname'];?> <?=$individuals['lname'];?></b>
				<span>x <a href="#" onclick="deleteindividual(<?=$key?>);return false;">remove</a></span>
				<input type="hidden" name="data[individuals][<?=$key?>][gname]" value="<?=$individuals['gname']?>" />
				<input type="hidden" name="data[individuals][<?=$key?>][lname]" value="<?=$individuals['lname']?>" />
				<input type="hidden" name="data[individuals][<?=$key?>][position]" value="<?=$individuals['position']?>" />
				<input type="hidden" name="data[individuals][<?=$key?>][email]" class="hidden_emails" id="hidden_iemail_<?=$key?>" value="<?=$individuals['email']?>" />
			</div>
			<?
					}
				}
			?>
		</div>
	</div>
	<div class="frow">
		<a href="#" onclick="addindividual();return false;" class="addanobtn">Add another account</a>
	</div>
	<div id="individual_forms">
		
	</div>
	<br /><br />
	<div class="frow">
		<a id="redlink4" href="#regfrm" onclick="regFormsGo(4,'dca_reg_frm_step_3',1);" class="reg_nxt_btn scroll">Next &gt;</a>
		<a id="redlink5" href="#regfrm" onclick="regFormsGo(2,'dca_reg_frm_step_3',0);" class="reg_bk_btn scroll">&lt; Back</a>
	</div>	
</div>
<!--Third Form  End-->
<!--Fourth Form  Start-->
<div id="dca_reg_frm_step_4" style="display:none;">
	<script type="text/javascript">
		//<![CDATA[
		function populateMemberShipFee(){
			var noe = parseInt($('OrganisationMemberTierId').value);
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
		
		/* function addSeparatorsNF(nStr, inD, outD, sep)
		{
			nStr += '';
			var dpos = nStr.indexOf(inD);
			var nStrEnd = '';
			if (dpos != -1) {
				nStrEnd = outD + nStr.substring(dpos + 1, nStr.length);
				nStr = nStr.substring(0, dpos);
			}
			var rgx = /(\d+)(\d{3})/;
			while (rgx.test(nStr)) {
				nStr = nStr.replace(rgx, '$1' + sep + '$2');
			}
			return nStr + nStrEnd;
		} */
		//]]>
	</script>
	<div id="membershipfee">
		<div class="title_row">
			Confirmation of your membership application
		</div>
		<div class="irow">
			<div class='mfee_l' id="mfee_1">Membership Level 300-599 employees</div>
			<div class='mfee_v' id="mfee_2">$1964.55</div>
		</div>
		<div id="membershipfee_info" class="irow">
			<div class='mfee_l'>GST</div>
			<div class='mfee_v' id="mfee_3">$196.45</div>
		</div>
		<div id="membershipfee_info" class="irow">
			<div class='mfee_l_bold'>TOTAL</div>
			<div class='mfee_v_bold' id="mfee_4">$2161.00</div>
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
	<h2 class="sub_head"><? //Payment and/or ?>Invoicing</h2>
	<div class="frow">
		<label class="widthfinal"><span>*</span>How would you like to pay?</label>
		<div class="option" style="width:310px;">
			<?
			/*<input type="radio" name="data[pay][inv]" id="pay_inv_1" value="1" checked="checked" onclick="selectPayment('cc');" /><label for="pay_inv_1">Online by Credit Card</label> 
			<div class="hint">
				 Upon successfully submitting your credit card details, a receipt will be emailed immediately to the key contact and your membership will be activated.
			</div>
			*/
			?>
			<input type="radio" name="data[pay][inv]" id="pay_inv_2" value="2" <? /* onclick="selectPayment('inv');"*/ ?> checked="checked" /><label for="pay_inv_2">Send an invoice for payment</label> 
			<div class="hint">
				The key contact will be sent an invoice via email or post - this may take up to 3 business days. On issuing of the invoice, your membership will be activated.
			</div>
		</div>
	</div>
	<?
	/*<div id="snt-invoice-payment" style="display:none;">*/
	?>
	<div id="snt-invoice-payment">
		<div class="frow">
			<label class="widthfinal"><span>*</span>Send the invoice to the key contact via</label>
			<select name="" style="width:160px;">	
				<option value="email">email</option>
				<option value="paddr">postal address</option>
				<option value="saddr">street address</option>
			</select>
		</div>
		<div class="frow">
			<label class="widthfinal">Special invoice instructions</label>
			<textarea name="special_invoice_instruction" class="regtextarea"></textarea>
		</div>
	</div>
	<?
	/*
	<div id="cc_frm">
		<h2 class="sub_head">Credit Card details</h2>
		<?
			//if(isset($errors)){
			//	echo '<font color="red"><b>'.$errors.'</b></font>';
			//}
		?>
		<div class="frow">
			<label class="widthfinal"><span>*</span>Name on card</label>
			<input type="text" name="data[CC][name]" id="cc_name" autocomplete="off" class='validate[onlyNumber]' /> 
		</div>
		<div class="frow">
			<label class="widthfinal"><span>*</span>Card Number</label>
			<input type="text" name="data[CC][number]" id="cc_number" autocomplete="off" class='validate[onlyNumber]' /> 
		</div>
		<div class="frow">
			<label class="widthfinal"><span>*</span>Expiry Date</label>
			<div id="ccchk">
			<select name="data[CC][expire_month]">
				<option value="01">January</option>
				<option value="02">February</option>
				<option value="03">March</option>
				<option value="04">April</option>
				<option value="05">May</option>
				<option value="06">June</option>
				<option value="07">July</option>
				<option value="08">August</option>
				<option value="09">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			</select>
			<select name="data[CC][expire_year]">
				 <?
					$final_year = date('Y')+10;
					for($cur_year = date('Y');$cur_year<=$final_year;$cur_year++){
						echo '<option value="',$cur_year,'">',$cur_year,'</option>';
					}
				 ?>
			</select>
			</div>
		</div>
		<div class="frow">
			<label class="widthfinal"><span>*</span>CVV Number</label>
			<div style="float:left:width:71px;">
				<input autocomplete="off" name="data[CC][cvv]" type="text" id="ccv" style="width:71px;" maxlength="4"  size="4" class='validate[onlyNumber]' />
			    <a href="#" class="ccwit">What is this?</a>
			</div>
		</div>
		<div class="frow">
			<div class="paymentsumm">
				<b>Payment Summary:<span id="mfee_5"></span></b>
			</div>
		</div>
		<div class="frow cchint">
			By pressing "Submit", DCA will charge your card in accordance with your order. All information is transferred securely and is subject to the DCA <!--<a href="/terms-of-use-and-privacy-statement.html" title="privacy policy" rel="lightbox">privacy policy</a>--><a href="#" title="privacy policy" onclick="showStyleBox('privacy-overlay');return false;">privacy policy</a>
		</div>
	</div>
	*/
	?>
	<div class="frow">
		<a id="redlink6" href="#regfrm" onclick="regFormsGo(3,'dca_reg_frm_step_4',0);return false;" class="reg_bk_btn scroll reg_bk_btn_fl">&lt; Back</a>
		<a id="redlink4" href="#regfrm" onclick="regFormsGo(5,'dca_reg_frm_step_4',1);return false;" class="reg_nxt_btn">Submit</a>
	</div>
</div>
<!--Fourth Form  End-->
</form>

<?
	$page_obj = ClassRegistry::init('Page');
	$page = $page_obj->read('content',1137);
?>

<div style="display:none;" class="white_content" id="privacy-overlay">
	<div class="white_content_inner">
		<?=$page['Page']['content'];?>
	</div>
</div>

<?
}
?>