<?
	$this->StyleBox->ConfirmMessageStart('organisationmsg','');
	$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');

	echo $this->element('admin/organisation/jscript');
?>

<?= $this->Form->create('Organisation',array('id'=>'organisationadd','ENCTYPE'=>'multipart/form-data'));?>
<?=$this->Form->input('Redirect.redirect',array('type'=>'hidden'));?>
<div class="frm-l" style="padding:0px;">
	<h3><address>Add New Member Organisation</address></h3>
	<ol class="erroruls">
		<? 
		if(isset($errors)){
		foreach($errors as $error){
		?>
			<li><?=$error;?></li>
		<?
		}}
		?>
	</ol>
	<br />
	<div class="rbox"><div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<a href="#" id="d1" class="ndropdown " onclick="return false;"></a>
			<div id="rbox-content-d1" style="display:block;">
				<table>
					<tr>
						<td>
							<?
								$uniqueid = 'i_name';
							?>
							<div id="member_name_div" style="display:block" class="inline_form">
								<h3>Name of Organisation</h3>
								<div id="<?=$uniqueid;?>_from">
									<span id="<?=$uniqueid;?>_label" class="label"><?=isset($this->request->data['Organisation']['name'])?$this->request->data['Organisation']['name']:'Enter Organisation Name';?></span>
									<a href="#" class="iedit" onclick="return false;"  id="<?=$uniqueid;?>_edit">Edit</a>
								</div>
								<div id="<?=$uniqueid;?>_from_i" style="display:none;">
									<?=$this->Form->input('Organisation.name',array('id'=>$uniqueid.'_txt','label'=>false,'div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Organisation Name','default'=>'Enter Organisation Name'));?>
									<a href="#" class="iapply" onclick="return false;" id="<?=$uniqueid;?>_apply" >Apply</a>&nbsp;|&nbsp;<a href="#" class="icancel" onclick="return false;" id="<?=$uniqueid;?>_cancel">Cancel</a>
								</div>
							</div>	
						</td>
					</tr>
				</table>
			</div>	
		</div>
	<div class="rbox-btm"><div></div></div></div>
	<br />
	<div class="rbox"><div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<a href="#" id="d2" class="ndropdown " onclick="return false;"></a>
			<div id="rbox-content-d2" style="display:block;">
				<table>
					<tr>
						<td>
							<?
								$uniqueid = 'i_street_address';
							?>
							<script type="text/javascript">
							<!--
										function org_stradd_edit(){
											$('<?=$uniqueid;?>_from').hide(); $('<?=$uniqueid;?>_from_i').show();
											g_str_cid=$('OrganisationStreetCountryId').value;
											g_str_address1=$('OrganisationStreetAddress1').value;
											g_str_address2=$('OrganisationStreetAddress2').value;
											g_str_postcode=$('OrganisationStreetPostcode').value;
											g_str_sid=$('OrganisationStreetStateId').value;
											g_str_suburb=$('OrganisationStreetSuburb').value;
											}
										function org_stradd_apply(){
											$('<?=$uniqueid;?>_from').show();	$('<?=$uniqueid;?>_from_i').hide();
											$('<?=$uniqueid;?>_label').update(
											
											$('OrganisationStreetAddress1').value+', '+
											$('OrganisationStreetAddress2').value+', '+
											$('OrganisationStreetSuburb').value+', '+
											getSelectedOptionHTML($('OrganisationStreetStateId'))+', '+
											getSelectedOptionHTML($('OrganisationStreetCountryId'))+', '+
											$('OrganisationStreetPostcode').value
											);
											}
										function org_stradd_cancel(){
											$('<?=$uniqueid;?>_from').show();	$('<?=$uniqueid;?>_from_i').hide();
											$('OrganisationStreetCountryId').value=g_str_cid;
											$('OrganisationStreetAddress1').value=g_str_address1;
											$('OrganisationStreetAddress2').value=g_str_address2;
											$('OrganisationStreetPostcode').value=g_str_postcode;
											$('OrganisationStreetStateId').value=g_str_sid;
											$('OrganisationStreetSuburb').value=g_str_suburb;
										}
								-->
								</script>							
							<div id="member_name_div" style="display:block" class="inline_form">
								<h3>Organisation Street Address</h3>
								<div id="<?=$uniqueid;?>_from">
									<span id="<?=$uniqueid;?>_label" class="label">
									<?
										echo isset($this->request->data['Organisation']['street_address_1'])?$this->request->data['Organisation']['street_address_1'].', ':'';
										echo isset($this->request->data['Organisation']['street_address_2'])?$this->request->data['Organisation']['street_address_2'].', ':'';
										echo isset($this->request->data['Organisation']['street_suburb'])?$this->request->data['Organisation']['street_suburb'].', ':'';
										echo isset($this->request->data['Organisation']['street_state_id'])?$sstates[$this->request->data['Organisation']['street_state_id']].', ':'';
										echo isset($this->request->data['Organisation']['street_country_id'])?$countires[$this->request->data['Organisation']['street_country_id']].', ':'';
										echo isset($this->request->data['Organisation']['street_postcode'])?$this->request->data['Organisation']['street_postcode']:'';
									?>
									</span>
									<a class="editlink" href="#" onclick="org_stradd_edit();return false;"  id="<?=$uniqueid;?>_edit">Edit</a>
								</div>
								<div id="<?=$uniqueid;?>_from_i" style="display:none;">
									<table border="0" cellpadding="4" cellspacing="0">
										<tr><td>
											<?=$this->Form->input('Organisation.street_address_1',array('label'=>false,'div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Street Address Line 1','default'=>'Enter Street Address Line 1'));?>
										</td></tr>
										<tr><td>
											<?=$this->Form->input('Organisation.street_address_2',array('label'=>false,'div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Street Address Line 2','default'=>'Enter Street Address Line 2'));?>
										</td></tr>
										<tr><td>
											<?=$this->Form->input('Organisation.street_suburb',array('label'=>false,'div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Suburb','default'=>'Enter Suburb'));?>
										</td></tr>
										<tr><td>
											<?=$this->Form->input('Organisation.street_country_id',array('label'=>false,'div'=>false,'class'=>'focus orgi','options'=>$countires));?>	
										</td></tr>
										<tr><td>
											<?=$this->Form->input('Organisation.street_state_id',array('label'=>false,'div'=>false,'class'=>'focus orgi','options'=>$sstates));?>	
										</td></tr>
										<tr><td>
											<?=$this->Form->input('Organisation.street_postcode',array('label'=>false,'div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Postal code','default'=>'Enter Postal code'));?>
										</td></tr>
										<tr><td>
											<a href="#" onclick="org_stradd_apply();return false;" id="<?=$uniqueid;?>_apply" >Apply</a>&nbsp;|&nbsp;<a href="#" onclick="org_stradd_cancel();return false;" id="<?=$uniqueid;?>_cancel">Cancel</a>
										</td></tr>
									</table>
								</div>
							</div>	
						</td>
					</tr>
				</table>
			</div>	
		</div>
	<div class="rbox-btm"><div></div></div></div>
	<br />
	<div class="rbox"><div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<a href="#" id="d3" class="ndropdown " onclick="return false;"></a>
			<div id="rbox-content-d3" style="display:block;">
				<table>
					<tr>
						<td>
							<?
								$uniqueid = 'i_postal_address';
							?>
							<script type="text/javascript">
							<!--
										function org_postadd_edit(){
											$('<?=$uniqueid;?>_from').hide(); $('<?=$uniqueid;?>_from_i').show();
											g_post_cid=$('OrganisationPostalCountryId').value;
											g_post_address1=$('OrganisationPostalAddress1').value;
											g_post_address2=$('OrganisationPostalAddress2').value;
											g_post_postcode=$('OrganisationPostalPostcode').value;
											g_post_sid=$('OrganisationPostalStateId').value;
											g_post_suburb=$('OrganisationPostalSuburb').value;
											}
										function org_postadd_apply(){
											$('<?=$uniqueid;?>_from').show();	$('<?=$uniqueid;?>_from_i').hide();
											$('<?=$uniqueid;?>_label').update(
											
											$('OrganisationPostalAddress1').value+', '+
											$('OrganisationPostalAddress2').value+', '+
											$('OrganisationPostalSuburb').value+', '+
											getSelectedOptionHTML($('OrganisationPostalStateId'))+', '+
											getSelectedOptionHTML($('OrganisationPostalCountryId'))+', '+
											$('OrganisationPostalPostcode').value
											);
											}
										function org_postadd_cancel(){
											$('<?=$uniqueid;?>_from').show();	$('<?=$uniqueid;?>_from_i').hide();
											$('OrganisationPostalCountryId').value=g_post_cid;
											$('OrganisationPostalAddress1').value=g_post_address1;
											$('OrganisationPostalAddress2').value=g_post_address2;
											$('OrganisationPostalPostcode').value=g_post_postcode;
											$('OrganisationPostalStateId').value=g_post_sid;
											$('OrganisationPostalSuburb').value=g_post_suburb;
										}
										
										function sameasstreetaddress(status){
											if(status){
												$('OrganisationPostalCountryId').value 	= 	$('OrganisationStreetCountryId').value;
												$('OrganisationPostalAddress1').value   = 	$('OrganisationStreetAddress1').value;
												$('OrganisationPostalAddress2').value  	= 	$('OrganisationStreetAddress2').value;
												$('OrganisationPostalPostcode').value  	= 	$('OrganisationStreetPostcode').value;
												$('OrganisationPostalStateId').update($('OrganisationStreetStateId').innerHTML);					
												$('OrganisationPostalStateId').value	= 	$('OrganisationStreetStateId').value;
												$('OrganisationPostalSuburb').value		=	$('OrganisationStreetSuburb').value;
											}else{
												$('OrganisationPostalCountryId').value 	= 	'';
												$('OrganisationPostalAddress1').value   = 	'';
												$('OrganisationPostalAddress2').value   = 	'';
												$('OrganisationPostalPostcode').value  	= 	'';
												$('OrganisationPostalStateId').value	= 	'';
												$('OrganisationPostalSuburb').value		=	'';
											}
										}
								-->
								</script>								
							
							<div id="member_name_div" style="display:block" class="inline_form">
								<h3>Organisation Postal Address</h3>
								<div id="<?=$uniqueid;?>_from">
									<span id="<?=$uniqueid;?>_label" class="label">
									<?
										echo isset($this->request->data['Organisation']['postal_address_1'])?$this->request->data['Organisation']['postal_address_1'].', ':'';
										echo isset($this->request->data['Organisation']['postal_address_2'])?$this->request->data['Organisation']['postal_address_2'].', ':'';
										echo isset($this->request->data['Organisation']['postal_suburb'])?$this->request->data['Organisation']['postal_suburb'].', ':'';
										echo isset($this->request->data['Organisation']['postal_state_id'])?$pstates[$this->request->data['Organisation']['postal_state_id']].', ':'';
										echo isset($this->request->data['Organisation']['postal_country_id'])?$countires[$this->request->data['Organisation']['postal_country_id']].', ':'';
										echo isset($this->request->data['Organisation']['postal_postcode'])?$this->request->data['Organisation']['postal_postcode']:'';
									?>
									</span>
									<a class="editlink" href="#" onclick="org_postadd_edit(); return false;"  id="<?=$uniqueid;?>_edit">Edit</a>
								</div>
								<div id="<?=$uniqueid;?>_from_i" style="display:none;">
									<table border="0" cellpadding="4" cellspacing="0">		
										<tr><td>
											<input type="checkbox" id="OrganisationSameAsPostaladdress" value="1" onclick="sameasstreetaddress(this.checked);" name="data[Organisation][same_as_postaladdress]" style="float:left;"><label style="float:left;margin-left:10px;" for="OrganisationSameAsPostaladdress">same as street address</label>
										</td></tr>
										<tr><td>
											<?=$this->Form->input('Organisation.postal_address_1',array('label'=>false,'div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Street Address Line 1','default'=>'Enter Street Address Line 1'));?>
										</td></tr>
										<tr><td>
											<?=$this->Form->input('Organisation.postal_address_2',array('label'=>false,'div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Street Address Line 2','default'=>'Enter Street Address Line 2'));?>
										</td></tr>
										<tr><td>
											<?=$this->Form->input('Organisation.postal_suburb',array('label'=>false,'div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Suburb','default'=>'Enter Suburb'));?>
										</td></tr>
										<tr><td>
											<?=$this->Form->input('Organisation.postal_country_id',array('label'=>false,'div'=>false,'class'=>'focus orgi','options'=>$countires));?>
										</td></tr>
										<tr><td>
											<?=$this->Form->input('Organisation.postal_state_id',array('label'=>false,'div'=>false,'class'=>'focus orgi','options'=>$pstates));?>	
										</td></tr>
										<tr><td>
											<?=$this->Form->input('Organisation.postal_postcode',array('label'=>false,'div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Postal code','default'=>'Enter Postal code'));?>
										</td></tr>
										<tr><td>
											<a href="#" onclick="org_postadd_apply(); return false;" id="<?=$uniqueid;?>_apply" >Apply</a>&nbsp;|&nbsp;<a href="#" onclick="org_postadd_cancel(); return false;" id="<?=$uniqueid;?>_cancel">Cancel</a>
										</td></tr>
									</table>
								</div>
							</div>	
						</td>
					</tr>
				</table>
			</div>	
		</div>
	<div class="rbox-btm"><div></div></div></div>
	<br />
	<div class="rbox"><div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<a href="#" id="d4" class="ndropdown " onclick="return false;"></a>
			<div id="rbox-content-d4" style="display:block;">
				<table>
					<tr>
						<td>
							<?
								$uniqueid = 'i_about_organisation';
							?>
							<script type="text/javascript">
							<!--
							
							
										function org_abt_edit(){
											$('<?=$uniqueid;?>_from').hide(); $('<?=$uniqueid;?>_from_i').show();
											g_web=$('OrganisationWebsite').value;
											g_parent=$('OrganisationParentCompany').value;
											//g_operating_areas=$('OperatingArea').value;
											g_indus=$('OrganisationIndustryTypeId').value;
											g_numemp=$('OrganisationMemberTierId').value;
											g_reason=$('OrganisationReasonId').value;
											
											operartingarea_arr = [];
											operationareachks = $$('div#operatingAresChks input');
											operationareachks.each(function(e){
												if(e.readAttribute('type')=='checkbox' && e.checked){
													operartingarea_arr[operartingarea_arr.length] = e.id;
												}
											});
										}
										function org_abt_apply(){
											$('i_about_organisation_from').show();	$('i_about_organisation_from_i').hide();
											$('web').update($('OrganisationWebsite').value);
											$('parent').update($('OrganisationParentCompany').value);
											$('indus').update(getSelectedOptionHTML($('OrganisationIndustryTypeId')));
											$('numemp').update(getSelectedOptionHTML($('OrganisationMemberTierId')));
											$('reason').update(getSelectedOptionHTML($('OrganisationReasonId')));
											
											operartingarea_arr = [];
											operationareachks = $$('div#operatingAresChks input');
											operationareachks.each(function(e){
												if(e.readAttribute('type')=='checkbox' && e.checked){
													operartingarea_arr[operartingarea_arr.length] = e.next(0).innerHTML
												}
											});
											$('operating_areas').update(operartingarea_arr.join(','));
										}
										function org_abt_cancel(){
											$('i_about_organisation_from').show();	$('i_about_organisation_from_i').hide();
											$('OrganisationWebsite').value=g_web;
											$('OrganisationParentCompany').value=g_parent;
											$('OrganisationIndustryTypeId').value=g_indus;
											$('OrganisationMemberTierId').value=g_numemp;
											$('OrganisationReasonId').value=g_reason;
											
											for(ie=0;ie<operartingarea_arr.length;ie++){
												$(operartingarea_arr[ie]).checked=true;
											}
										}
								-->
								</script>
							<div id="member_name_div" style="display:block" class="inline_form">
								<h3>About the Organisation</h3>
								<div id="<?=$uniqueid;?>_from">
									<table> 
										<tr><td class="lab">Website Address:</td>
									<td>
									<span id="web" class="label"><?= isset($this->request->data['Organisation']['website'])?$this->request->data['Organisation']['website']:'';?></span></td>
										</tr>
										<tr><td class="lab">Parent Company:</td>
									<td>
									<span id="parent" class="label"><?= isset($this->request->data['Organisation']['parent_company'])?$this->request->data['Organisation']['parent_company']:'';?></span></td>
										</tr>
										<tr><td class="lab">States/territories in<br />
			   which the organisation <br />
			   operates</td>
											<td ><span id="operating_areas" class="label">
											<?
												if(isset($this->request->data['OperatingArea'])){
													$oas = array();
													if(is_array($this->request->data['OperatingArea']['OperatingArea'])){
														foreach($this->request->data['OperatingArea']['OperatingArea'] as $OArea){
															if(isset($operatingAreas[$OArea]))
																$oas[] = $operatingAreas[$OArea];	
														}
													}
													
													echo implode(', ',$oas);
												}
											?>
											</span></td>
										</tr>
										<tr><td class="lab">Industry/Sector:</td>
											<td ><span id="indus" class="label">
											<?= isset($this->request->data['Organisation']['industry_type_id'])?$industryTypes[$this->request->data['Organisation']['industry_type_id']]:'';?>
											</span></td>
										</tr>
										<tr><td class="lab">Number of Employees:</td>
											<td><span id="numemp" class="label">
											<?= isset($this->request->data['Organisation']['member_tier_id'])?$memberTiers[$this->request->data['Organisation']['member_tier_id']]:'';?>
											</span></td>
										</tr>
										<tr><td class="lab">Main reason for membership:</td>
											<td><span id="reason" class="label">
											<?= isset($this->request->data['Organisation']['reason_id'])?$reasons[$this->request->data['Organisation']['reason_id']]:'';?>
											</span></td>
										</tr>
										<tr>
											<td class="lab" colspan="2">
												<a class="editlink" href="#" onclick="org_abt_edit();return false;" id="<?=$uniqueid;?>_edit">Edit</a>
											</td>
										</tr>
										
									</table>
								</div>
								<div id="<?=$uniqueid;?>_from_i" style="display:none;">
									<table border="0" cellpadding="4" cellspacing="0">		
										<tr><td>
											<?=$this->Form->input('Organisation.website',array('div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Website Address','default'=>'Enter Website Address'));?>
										</td></tr>
										<tr><td>
											<?=$this->Form->input('Organisation.parent_company',array('div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Parent Company','default'=>'Enter Parent Company'));?>
										</td></tr>
										<tr><td>
											<div id='operatingAresChks'>
											<?
											echo $this->Form->input('OperatingArea.OperatingArea',array('id'=>'OperatingArea','options'=>$operatingAreas,'multiple'=>'checkbox'));
											?>
											</div>
										</td></tr>
										<tr><td>
											<?=$this->Form->input('Organisation.member_tier_id',array('div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Number of Employees','default'=>'Enter Number of Employees'));?>
										</td></tr>
										<tr><td>
											<?=$this->Form->input('Organisation.industry_type_id',array('div'=>false,'class'=>'focus orgi'));?>
										</td></tr>
										<tr><td>
											<?=$this->Form->input('Organisation.reason_id',array('div'=>false,'class'=>'focus orgi ','focus_txt'=>'Enter Reason','default'=>'Enter Reason'));?>
										</td></tr>

										<tr><td>
											<a href="#" onclick="org_abt_apply();return false;" id="<?=$uniqueid;?>_apply" >Apply</a>&nbsp;|&nbsp;<a href="#" onclick="org_abt_cancel();return false;" id="<?=$uniqueid;?>_cancel">Cancel</a>
										</td></tr>
									</table>
								</div>
							</div>	
						</td>
					</tr>
				</table>
			</div>	
		</div>
	<div class="rbox-btm"><div></div></div></div>
	<br />
	<div class="rbox"><div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<a href="#" id="d5" class="ndropdown " onclick="return false;"></a>
			<div id="rbox-content-d5" style="display:block;">
				<table>
					<tr>
						<td>
							<?
								$uniqueid = 'i_key_contact';
							?>
				
							<script type="text/javascript">
										function kc_edit(){
											$('<?=$uniqueid;?>_from').hide(); $('<?=$uniqueid;?>_from_i').show();

											g_kcgname		=	$('OrganisationKcGname').value;
											g_kcemail		=	$('OrganisationKcEmail').value;
											g_kclname		=	$('OrganisationKcLname').value;
											g_kcphone		=	$('OrganisationKcPhone').value;
											g_kcposition	=	$('OrganisationKcPosition').value;
											
											g_kcaddress1	=	$('OrganisationKcAddress1').value;
											g_kcaddress2	=	$('OrganisationKcAddress2').value;
											g_kcsuburb		=	$('OrganisationKcSuburb').value;
											g_kccountryid	=	$('OrganisationKcCountryId').value;
											g_kcstateid		=	$('OrganisationKcStateId').value;
											g_kcpostcode	=	$('OrganisationKcPostcode').value;
											
											
											}
										function kc_apply(){
											$('<?=$uniqueid;?>_from').show();	$('<?=$uniqueid;?>_from_i').hide();
											$('kcgname').update($('OrganisationKcGname').value);
											$('kcemail').update($('OrganisationKcEmail').value);
											$('kclname').update($('OrganisationKcLname').value);
											$('kcphone').update($('OrganisationKcPhone').value);
											$('kcposition').update($('OrganisationKcPosition').value);
											$('kcaddress').update(
												$('OrganisationKcAddress1').value+', '+
												$('OrganisationKcAddress2').value+', '+
												$('OrganisationKcSuburb').value+', '+
												getSelectedOptionHTML($('OrganisationKcCountryId'))+', '+
												getSelectedOptionHTML($('OrganisationKcStateId'))+', '+
												$('OrganisationKcPostcode').value
											);
										}
										function kc_cancel(){
											$('<?=$uniqueid;?>_from').show();	$('<?=$uniqueid;?>_from_i').hide();
											$('OrganisationKcGname').value=g_kcgname;
											$('OrganisationKcEmail').value=g_kcemail;
											$('OrganisationKcLname').value=g_kclname;
											$('OrganisationKcPhone').value=g_kcphone;
											$('OrganisationKcPosition').value=g_kcposition;
											$('OrganisationKcAddress1').value=g_kcaddress1;
											$('OrganisationKcAddress2').value=g_kcaddress2;
											$('OrganisationKcSuburb').value=g_kcsuburb;
											$('OrganisationKcCountryId').value=g_kccountryid;
											$('OrganisationKcStateId').value=g_kcstateid;
											$('OrganisationKcPostcode').value=g_kcpostcode;
										}
										function sameasorgaddress(status){
											if(status){
												$('OrganisationKcCountryId').value 	= 	$('OrganisationStreetCountryId').value;
												$('OrganisationKcAddress1').value   	= 	$('OrganisationStreetAddress1').value;
												$('OrganisationKcAddress2').value   	= 	$('OrganisationStreetAddress2').value;
												$('OrganisationKcPostcode').value  	= 	$('OrganisationStreetPostcode').value;
												$('OrganisationKcStateId').update($('OrganisationStreetStateId').innerHTML);
												$('OrganisationKcStateId').value	= 	$('OrganisationStreetStateId').value;
												$('OrganisationKcSuburb').value		=	$('OrganisationStreetSuburb').value;
											}else{
												$('OrganisationKcCountryId').value 	= 	'';
												$('OrganisationKcAddress1').value   	= 	'';
												$('OrganisationKcAddress2').value   	= 	'';
												$('OrganisationKcPostcode').value  	= 	'';
												$('OrganisationKcStateId').value	= 	'';
												$('OrganisationKcSuburb').value		=	'';
											}
										}
								</script>
							<div id="member_name_div" style="display:block" class="inline_form">
								<h3>Key Contact</h3>		
								<div id="<?=$uniqueid;?>_from">
									<table width="100%"> 
										<tr><td class="lab">Given Name:</td>
											<td ><span id="kcgname" class="label"><?=isset($this->request->data['Organisation']['kc_gname'])?$this->request->data['Organisation']['kc_gname']:'';?></span></td>
											<td colspan="5"></td>
											<td class="lab">Email Address:</td>
											<td><span id="kcemail" class="label"><?=isset($this->request->data['Organisation']['kc_email'])?$this->request->data['Organisation']['kc_email']:'';?></span></td>
										</tr>
										<tr><td class="lab">Last Name:</td>
											<td><span id="kclname" class="label"><?=isset($this->request->data['Organisation']['kc_lname'])?$this->request->data['Organisation']['kc_lname']:'';?></span></td>
											<td colspan="5"></td>
											<td class="lab">Phone:</td>
											<td><span id="kcphone" class="label"><?=isset($this->request->data['Organisation']['kc_phone'])?$this->request->data['Organisation']['kc_phone']:'';?></span></td>
										</tr>
										<tr><td class="lab">Position Title:</td>
											<td><span id="kcposition" class="label"><?=isset($this->request->data['Organisation']['kc_position'])?$this->request->data['Organisation']['kc_position']:'';?></span></td>
											<td colspan="5"></td>
											<td class="lab">Address:</td>
											<td>
												<span id="kcaddress" class="label">
												<?
													echo isset($this->request->data['Organisation']['kc_address_1'])?$this->request->data['Organisation']['kc_address_1'].', ':'';
													echo isset($this->request->data['Organisation']['kc_address_2'])?$this->request->data['Organisation']['kc_address_2'].', ':'';
													echo isset($this->request->data['Organisation']['kc_suburb'])?$this->request->data['Organisation']['kc_suburb'].', ':'';
													echo isset($this->request->data['Organisation']['kc_state_id'])?$kstates[$this->request->data['Organisation']['kc_state_id']].', ':'';
													echo isset($this->request->data['Organisation']['kc_country_id'])?$countires[$this->request->data['Organisation']['kc_country_id']].', ':'';
													echo isset($this->request->data['Organisation']['kc_postcode'])?$this->request->data['Organisation']['kc_postcode']:'';
												?>
												
												</span>
											</td>
										</tr>
										<tr>
											<td colspan="9">
											<a class="editlink" onclick="kc_edit() ;return false;" id="<?=$uniqueid;?>_edit">Edit</a>
											</td>
										</tr>
								</table>									
								
								</div>
								<div id="<?=$uniqueid;?>_from_i" style="display:none;">
									<table border="0" cellpadding="4" cellspacing="0">		
										<tr><td>
											<?=$this->Form->input('Organisation.kc_gname',array('label'=>false,'div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Given Name','default'=>'Enter Given Name'));?>
										</td><td>
											<?=$this->Form->input('Organisation.kc_email',array('label'=>false,'div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Email Address','default'=>'Enter Email Address'));?>
										</td></tr>
										<tr><td>
											<?=$this->Form->input('Organisation.kc_lname',array('label'=>false,'div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Last Name','default'=>'Enter Last Name'));?>
										</td><td>
											<?=$this->Form->input('Organisation.kc_phone',array('label'=>false,'div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Phone Number','default'=>'Enter Phone Number'));?>
										</td></tr>
										<tr><td>
											<?=$this->Form->input('Organisation.kc_position',array('label'=>false,'div'=>false,'class'=>'focus orgi ','focus_txt'=>'Enter Position Title','default'=>'Enter Position Title'));?> 
										</td><td>
											<input type="checkbox" id="OrganisationSameAsOrganisationaddress" value="1" onclick="sameasorgaddress(this.checked);" name="data[Organisation][same_as_organisation_address]" style="float:left;"><label style="float:left;margin-left:10px;" for="OrganisationSameAsPostaladdress">same as organisation's address</label>
										</td></tr>
										<tr><td>
											<?=$this->Form->input('Organisation.kc_address_1',array('label'=>false,'div'=>false,'class'=>'focus orgi ','focus_txt'=>'Enter Address Line 1','default'=>'Enter Address Line 1'));?> 
											
										</td><td><?=$this->Form->input('Organisation.kc_address_2',array('label'=>false,'div'=>false,'class'=>'focus orgi ','focus_txt'=>'Enter Address Line 2','default'=>'Enter Address Line 2'));?> 
											
										</td></tr>
										<tr><td><?=$this->Form->input('Organisation.kc_suburb',array('label'=>false,'div'=>false,'class'=>'focus orgi ','focus_txt'=>'Enter Suburb','default'=>'Enter Suburb'));?> 
											
										</td><td><?=$this->Form->input('Organisation.kc_country_id',array('label'=>false,'div'=>false,'class'=>'focus orgi','options'=>$countires));?> 
										
										</td></tr>
										<tr><td>	<?=$this->Form->input('Organisation.kc_state_id',array('label'=>false,'div'=>false,'empty'=>'-- select a state --','class'=>'focus orgi','options'=>$kstates));?> 
											
										</td><td><?=$this->Form->input('Organisation.kc_postcode',array('label'=>false,'div'=>false,'class'=>'focus orgi ','focus_txt'=>'Enter Postcode','default'=>'Enter Postcode'));?> 
										</td></tr>
										<tr><td colspan="2">
											<a href="#" onclick="kc_apply();return false;" id="<?=$uniqueid;?>_apply" >Apply</a>&nbsp;|&nbsp;<a href="#" onclick="kc_cancel();return false;" id="<?=$uniqueid;?>_cancel">Cancel</a>
										</td></tr>
									</table>
								</div>
							</div>	
						</td>
					</tr>
				</table>
			</div>	
		</div>
	<div class="rbox-btm"><div></div></div></div>
	
	<br />
	<div class="rbox"><div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<a href="#" id="d6" class="ndropdown " onclick="return false;"></a>
			<div id="rbox-content-d6" style="display:block;">
				<table>
					<tr>
						<td>
							<?
								$uniqueid = 'i_ceo';
							?>
							
							<script type="text/javascript">
										function ceo_edit(){
											$('<?=$uniqueid;?>_from').hide(); $('<?=$uniqueid;?>_from_i').show();
											g_ceogname=$('OrganisationCeoGname').value;
											g_ceolname=$('OrganisationCeoLname').value;
											}
										function ceo_apply(){
											$('<?=$uniqueid;?>_from').show();	$('<?=$uniqueid;?>_from_i').hide();
											$('ceogname').update($('OrganisationCeoGname').value);
											$('ceolname').update($('OrganisationCeoLname').value);
											}
										function ceo_cancel(){
											$('<?=$uniqueid;?>_from').show();	$('<?=$uniqueid;?>_from_i').hide();
											$('OrganisationCeoGname').value=g_ceogname;
											$('OrganisationCeoLname').value=g_ceolname;
										}
								</script>							
							<div id="member_name_div" style="display:block" class="inline_form">
								<h3>Chief Executive Officer</h3>
								
								<div id="<?=$uniqueid;?>_from">
									<table width="100%"> 
											<tr><td class="lab">Given Name:</td>
												<td ><span id="ceogname" class="label"><?=isset($this->request->data['Organisation']['ceo_gname'])?$this->request->data['Organisation']['ceo_gname']:'';?></span></td>
											</tr>
											<tr><td class="lab">Last Name:</td>
												<td><span id="ceolname" class="label"><?=isset($this->request->data['Organisation']['ceo_lname'])?$this->request->data['Organisation']['ceo_lname']:'';?></span></td>
											</tr><tr><td class="lab" colspan="2">
											<a class="editlink" onclick="ceo_edit();return false;" id="<?=$uniqueid;?>_edit">Edit</a>
											</td>
											</tr>
									</table>
								</div>
								<div id="<?=$uniqueid;?>_from_i" style="display:none;">
									<?=$this->Form->input('Organisation.ceo_gname',array('label'=>false,'div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Given Name','default'=>'Enter Given Name'));?><br /><br />
									
									<?=$this->Form->input('Organisation.ceo_lname',array('label'=>false,'div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Last Name','default'=>'Enter Last Name'));?> <br /><br />
									<a style="cursor:pointer" onclick="ceo_apply();return false;" id="<?=$uniqueid;?>_apply" >Apply</a>&nbsp;|&nbsp;<a style="cursor:pointer" onclick="ceo_cancel();return false;" id="<?=$uniqueid;?>_cancel">Cancel</a>
								</div>
							</div>	
						</td>
					</tr>
				</table>
			</div>	
		</div>
	<div class="rbox-btm"><div></div></div></div>
	
	
	<br />
	<div class="rbox"><div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<a href="#" id="d7" class="ndropdown " onclick="return false;"></a>
			<div id="rbox-content-d7" style="display:block;">
				<table>
					<tr>
						<td>
							<?
								$uniqueid = 'i_hr';
							?>
							<script type="text/javascript">
										function p_edit(){
											$('<?=$uniqueid;?>_from').hide(); $('<?=$uniqueid;?>_from_i').show();
											g_hrgname=$('OrganisationHrGname').value;
											g_hrlname=$('OrganisationHrLname').value;
											g_hremail=$('OrganisationHrEmail').value;
											}
										function p_apply(){
											$('<?=$uniqueid;?>_from').show();	$('<?=$uniqueid;?>_from_i').hide();
											$('hrgname').update($('OrganisationHrGname').value);
											$('hrlname').update($('OrganisationHrLname').value);
											$('hremail').update($('OrganisationHrEmail').value);
											}
										function p_cancel(){
											$('<?=$uniqueid;?>_from').show();	$('<?=$uniqueid;?>_from_i').hide();
											$('OrganisationHrGname').value=g_hrgname;
											$('OrganisationHrLname').value=g_hrlname;
											$('OrganisationHrEmail').value=g_hremail;
										}
								</script>									
							<div id="member_name_div" style="display:block" class="inline_form">
								<h3>Personnel / HR Director</h3>
								<div id="<?=$uniqueid;?>_from">
									<table width="100%"> 
											<tr><td class="lab">Given Name:</td>
												<td ><span id="hrgname" class="label"><?=isset($this->request->data['Organisation']['hr_gname'])?$this->request->data['Organisation']['hr_gname']:'';?></span></td>
											</tr>
											<tr><td class="lab">Last Name:</td>
												<td><span id="hrlname" class="label"><?=isset($this->request->data['Organisation']['hr_lname'])?$this->request->data['Organisation']['hr_lname']:'';?></span></td>
											</tr>
											<tr><td class="lab">Email Address:</td>
												<td><span id="hremail" class="label"><?=isset($this->request->data['Organisation']['hr_email'])?$this->request->data['Organisation']['hr_email']:'';?></span></td>
											</tr>
											<tr>
												<td colspan="2">
													<a  class="editlink" onclick="p_edit();return false;" id="<?=$uniqueid;?>_edit">Edit</a>
												</td>
											</tr>
									</table>
								</div>
								<div id="<?=$uniqueid;?>_from_i" style="display:none;">
									<?=$this->Form->input('Organisation.hr_gname',array('label'=>false,'div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Given Name','default'=>'Enter Given Name'));?><br /><br />
									
									<?=$this->Form->input('Organisation.hr_lname',array('label'=>false,'div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Last Name','default'=>'Enter Last Name'));?> <br /><br />
									<?=$this->Form->input('Organisation.hr_email',array('label'=>false,'div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Email Address','default'=>'Enter Email Address'));?> <br /><br />
									<a style="cursor:pointer" onclick="p_apply();return false;" id="<?=$uniqueid;?>_apply" >Apply</a>&nbsp;|&nbsp;<a style="cursor:pointer" onclick="p_cancel();return false;" id="<?=$uniqueid;?>_cancel">Cancel</a>
								</div>
							</div>	
						</td>
					</tr>
				</table>
			</div>	
		</div>
	<div class="rbox-btm"><div></div></div></div>
	
	
	<br />
	<div class="rbox"><div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<a href="#" id="d8" class="ndropdown " onclick="return false;"></a>
			<div id="rbox-content-d8" style="display:block;">
				<table>
					<tr>
						<td>
							<?
								$uniqueid = 'i_hd';
							?>
							<script type="text/javascript">
										function hd_edit(){
											$('<?=$uniqueid;?>_from').hide(); $('<?=$uniqueid;?>_from_i').show();
											g_hdgname=$('OrganisationHodGname').value;
											g_hdlname=$('OrganisationHodLname').value;
											g_hdemail=$('OrganisationHodEmail').value;
											}
										function hd_apply(){
											$('<?=$uniqueid;?>_from').show();	$('<?=$uniqueid;?>_from_i').hide();
											$('hdgname').update($('OrganisationHodGname').value);
											$('hdlname').update($('OrganisationHodLname').value);
											$('hdemail').update($('OrganisationHodEmail').value);
											}
										function hd_cancel(){
											$('<?=$uniqueid;?>_from').show();	$('<?=$uniqueid;?>_from_i').hide();
											$('OrganisationHodGname').value=g_hdgname;
											$('OrganisationHodLname').value=g_hdlname;
											$('OrganisationHodEmail').value=g_hdemail;
										}
									  function same_as_hod(status){
										if(status){
											$('OrganisationHodGname').value	 =  $('OrganisationHrGname').value;
											$('OrganisationHodLname').value  =  $('OrganisationHrLname').value;
											$('OrganisationHodEmail').value	 =  $('OrganisationHrEmail').value;
										}else{
											$('OrganisationHodGname').value	 =  '';
											$('OrganisationHodLname').value  =  '';
											$('OrganisationHodEmail').value	 =  '';
										}
									  }
								</script>		
							<div id="member_name_div" style="display:block" class="inline_form">
								<h3>Head of Diversity / Diversity Manager</h3>
								
								<div id="<?=$uniqueid;?>_from">
									<table width="100%"> 
											<tr><td class="lab">Given Name:</td>
												<td ><span id="hdgname" class="label"><?=isset($this->request->data['Organisation']['hod_gname'])?$this->request->data['Organisation']['hod_gname']:'';?></span></td>
											</tr>
											<tr><td class="lab">Last Name:</td>
												<td><span id="hdlname" class="label"><?=isset($this->request->data['Organisation']['hod_lname'])?$this->request->data['Organisation']['hod_lname']:'';?></span></td>
											</tr>
											<tr><td class="lab">Email Address:</td>
												<td><span id="hdemail" class="label"><?=isset($this->request->data['Organisation']['hod_email'])?$this->request->data['Organisation']['hod_email']:'';?></span></td>
											</tr>
											<tr><td class="lab" colspan="2">
											<a class="editlink" onclick="hd_edit();return false;" id="<?=$uniqueid;?>_edit">Edit</a>
											</td>
											</tr>
									</table>
								</div>
								<div id="<?=$uniqueid;?>_from_i" style="display:none;">
									<table border="0" cellpadding="4" cellspacing="0">		
										<tr><td>
											<input type="checkbox" id="OrganisationSameAsHODs" value="1" onclick="same_as_hod(this.checked);" name="data[Organisation][same_as_hod]" style="float:left;"><label style="float:left;margin-left:10px;" for="OrganisationSameAsHODs">same as above</label>
										</td></tr>
										<tr><td>
											<?=$this->Form->input('Organisation.hod_gname',array('label'=>false,'div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Given Name','default'=>'Enter Given Name'));?>
										</td></tr>
										<tr><td>
											<?=$this->Form->input('Organisation.hod_lname',array('label'=>false,'div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Last Name','default'=>'Enter Last Name'));?>
										</td></tr>
										<tr><td>
											<?=$this->Form->input('Organisation.hod_email',array('label'=>false,'div'=>false,'class'=>'focus orgi','focus_txt'=>'Enter Email Address','default'=>'Enter Email Address'));?>
										</td></tr>
										<tr><td>
											<a style="cursor:pointer" onclick="hd_apply();return false;" id="<?=$uniqueid;?>_apply" >Apply</a>&nbsp;|&nbsp;<a style="cursor:pointer" onclick="hd_cancel();return false;" id="<?=$uniqueid;?>_cancel">Cancel</a>
										</td></tr>
									</table>
								</div>
							</div>	
						</td>
					</tr>
				</table>
			</div>	
		</div>
	<div class="rbox-btm"><div></div></div></div>
	
</div>
<div class="frm-r">
	<?=$this->element('/admin/organisation/membership_status',array('open'=>true));?>
</div>
<br style="clear:both;" />
	<div id="afm">
		<div id="afm-inner">
			<a href="javascript:void(0);" onclick="$('organisationadd').submit();" class="save_btn"></a>
			<!--<a href="#" onclick="ProjectsPreview($(this));return false;" class="preview_btn"><div>Preview</div></a>-->
			<script type="text/javascript">
			function ProjectsPreview(ele){
			   var form = $('organisationadd'); 
			   ele.down(0).update('Preparing Preview...');
			  	   
			   var prev_action = $('organisationadd').readAttribute('action');
			   $('organisationadd').writeAttribute('action','/admin/organisations/orgpreview/1');
			   form.request({
				   onComplete: function(){ 
					ele.down(0).update('Preview');
					window.open("/admin/organisations/orgpreview/0"); 
				   }
			   });
			   $('organisationadd').writeAttribute('action',prev_action);
			}
			</script>
			<ul id="footer-action">
				<li><a class="" href="#"  onclick="resetConfirm();return false;" title="Reset" >Reset</a></li>
				<li class='close'><a class='close' href="/<?=$this->request->data['Redirect']['redirect'];?>" title="Close">Close</a></li>
				<!-- onclick="closeConfirm(this.href);return false;" -->
			</ul>
		</div>
	</div>
</form>
<script type="text/javascript">
function closeConfirm(href){
	$('organisationmsg').down(1).update('Are you sure you want to close without saving?');
	$('organisationmsg').down('div.cmsg_content_small').update('You may have unsaved changes.');
	$('organisationmsg').down('a.green').writeAttribute('href',href);
	$('organisationmsg').down('a.green').writeAttribute('onclick','');
	showStyleBox('organisationmsg');
}
function resetConfirm(){
	$('organisationmsg').down(1).update('You are about to reset all fields.');
	$('organisationmsg').down('div.cmsg_content_small').update('This will undo any changes you have made to this form. Are you sure you want to reset?');
	$('organisationmsg').down('a.green').writeAttribute('onclick',"$('organisationadd').reset();hideStyleBox('organisationmsg');return false;");
	showStyleBox('organisationmsg');
}


/* Country State Details */
</script>
