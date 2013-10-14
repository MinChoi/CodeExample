<script type="text/javascript">
	function sameasstreetaddress(status){
		if(status){
			$('OrganisationPostalCountryId').value 	= 	$('OrganisationStreetCountryId').value;
			$('OrganisationPostalAddress').value   	= 	$('OrganisationStreetAddress').value;
			$('OrganisationPostalPostcode').value  	= 	$('OrganisationStreetPostcode').value;
			$('OrganisationPostalStateId').value	= 	$('OrganisationStreetStateId').value;
			$('OrganisationPostalSuburb').value		=	$('OrganisationStreetSuburb').value;
		}else{
			$('OrganisationPostalCountryId').value 	= 	'';
			$('OrganisationPostalAddress').value   	= 	'';
			$('OrganisationPostalPostcode').value  	= 	'';
			$('OrganisationPostalStateId').value	= 	'';
			$('OrganisationPostalSuburb').value		=	'';
		}
	}
</script>
<div class="page-title"><?= __('Manage organisation details');?></div>
<?= $this->Form->create(null,array('url'=>'/memberarea-mod','id'=>'organisation_edit'));?>
	<div id="dca_reg_frm_step_1" style="display:block;">
		<div class="frow">
			<label>Name of Organisation</label>
			<?
				echo $this->Form->input('id');
			  echo $this->Form->input('name',array('label'=>false,'div'=>'false'));
			?>
		</div>

		<h2 class="sub_head">Organisational street address.</h2>
		<div class="frow">
			<label>Country</label>
			<?
				echo $this->Form->input('street_country_id',array('options'=>$countries,'label'=>false,'div'=>'false'));
			?>
		</div>
		<div class="frow">
			<label>State</label>
			<?
				echo $this->Form->input('street_state_id',array('options'=>$sstates,'label'=>false,'div'=>'false'));
			?>
		</div>
		<div class="frow">
			<label>Sub urb</label>
			<?
				echo $this->Form->input('street_suburb',array('label'=>false,'div'=>'false'));
			?>
		</div>
		<div class="frow">
			<label>Street Address</label>
			<?
				echo $this->Form->input('street_address',array('label'=>false,'div'=>'false'));
			?>
		</div>
		<div class="frow">
			<label>Postal code</label>
			<?
				echo $this->Form->input('street_postcode',array('label'=>false,'div'=>'false'));
			?>
		</div>


		<h2 class="sub_head">Organizational postal address.</h2>
		<div class="frow">
				<label>&nbsp;</label>
				<div class="option">
					<input type="checkbox" id="OrganisationSameAsPostaladdress" value="1" onclick="sameasstreetaddress(this.checked);" name="data[Organisation][same_as_postaladdress]" style="float:left;"><label style="float:left;margin-left:10px;" for="OrganisationSameAsPostaladdress">same as street address</label>
				</div>
		</div>		
		<div class="frow">
			<label>Country</label>
			<?
				echo $this->Form->input('postal_country_id',array('options'=>$countries,'label'=>false,'div'=>'false'));
			?>
		</div>
		<div class="frow">
			<label>State</label>
			<?
				echo $this->Form->input('postal_state_id',array('options'=>$sstates,'label'=>false,'div'=>'false'));
			?>
		</div>
		<div class="frow">
			<label>Sub urb</label>
			<?
				echo $this->Form->input('postal_suburb',array('label'=>false,'div'=>'false'));
			?>
		</div>
		<div class="frow">
			<label>Street Address</label>
			<?
				echo $this->Form->input('postal_address',array('label'=>false,'div'=>'false'));
			?>
		</div>
		<div class="frow">
			<label>Postal code</label>
			<?
				echo $this->Form->input('postal_postcode',array('label'=>false,'div'=>'false'));
			?>
		</div>
		<h2 class="sub_head">About the organisation.</h2>			
	
		<div class="frow">
			<label>Website</label>
			<?
				echo $this->Form->input('website',array('label'=>false,'div'=>'false'));
			?>
		</div>
		<div class="frow">
			<label>Parent company </label>
			<?
				echo $this->Form->input('parent_company',array('label'=>false,'div'=>'false'));
			?>
		</div>
		<div class="frow">
			<label>Industry type</label>
			<?
				echo $this->Form->input('industry_type_id',array('label'=>false,'div'=>'false'));
			?>
		</div>
		<div class="frow">
			<label>States/territories in<br />
				   which the organisation <br />
				   operates
			</label>
			<div id="multichk">
			<?
				echo $this->Form->input('OperatingArea',array('label'=>false,'multiple'=>'checkbox'));
			?>
			</div>
		</div>

		<div class="frow">
			<a class="reg_nxt_btn scroll" onclick="$('organisation_edit').submit();return false;" href="#" id="redlink1">Submit</a>
		</div>

</div>	



