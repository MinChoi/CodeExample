<?
	$this->StyleBox->ConfirmMessageStart('nonmembermsg','');
	$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
?>
<script type="text/javascript">
document.observe("dom:loaded", function(){
	var ndropdowns = $$('a.ndropdown');
	ndropdowns.each(function(e){
		e.observe('click', function(event){
			var a_ele = Event.element(event);
			if($('rbox-content-'+a_ele.id).visible()){
				a_ele.removeClassName('dropdown_down');
				a_ele.addClassName('dropdown_up');
			}else{
				a_ele.addClassName('dropdown_down');
				a_ele.removeClassName('dropdown_up');
			}
			Effect.toggle('rbox-content-'+a_ele.id,'slide', { duration: 0.33});							
		 });
	});
	
	var editval = new Array();

	var editlinks = $$('a.iedit');
	editlinks.each(function(e){
		e.observe('click', function(event){
			var unique_id = Event.element(event).id.gsub('_edit', '');
			editval[unique_id] = getTxtValue(unique_id);
			$(unique_id+'_from').hide();
			$(unique_id+'_from_i').show();
		});
	});
	
	function getTxtValue(unique_id){
		if($(unique_id+'_txt').tagName.toLowerCase()=='input' || $(unique_id+'_txt').tagName.toLowerCase()=='select'){
			return $(unique_id+'_txt').value;
		}
		else if(tinyMCE.get(unique_id+'_txt').getContent().trim().length>0){
			return tinyMCE.get(unique_id+'_txt').getContent();
		}
	}
	
	var apply_cancels = $$('a.icancel,a.iapply');
	apply_cancels.each(function(e){
		e.observe('click', function(event){
			var unique_id =  Event.element(event).id.gsub('_apply', '').gsub('_cancel', '');
			if(Event.element(event).hasClassName('iapply')){
				if($(unique_id+'_txt').tagName.toLowerCase()=='input' || $(unique_id+'_txt').tagName.toLowerCase()=='select'){
					if($(unique_id+'_txt').tagName.toLowerCase()=='select')
						$(unique_id+'_label').update(getSelectedOptionHTML($(unique_id+'_txt')));
					else
						$(unique_id+'_label').update($(unique_id+'_txt').value);
				}
				else if(tinyMCE.get(unique_id+'_txt').getContent().trim().length>0){
					$(unique_id+'_label').update(tinyMCE.get(unique_id+'_txt').getContent());
				}
			}else{
				if($(unique_id+'_txt').tagName.toLowerCase()=='input' || $(unique_id+'_txt').tagName.toLowerCase()=='select'){
					$(unique_id+'_txt').value = editval[unique_id] ;
				}
				else if(tinyMCE.get(unique_id+'_txt').getContent().trim().length>0){
					$(unique_id+'_txt').update(editval[unique_id]);
				}
			}
			$(unique_id+'_from').show();
			$(unique_id+'_from_i').hide();
		});
	});
	
	
});
</script>
<?= $this->Form->create(null,array('url'=>'/admin/members/nonmemberadd','id'=>'nonmemberadd','ENCTYPE'=>'multipart/form-data','method'=>'post'));?>
<?=$this->Form->input('Redirect.redirect',array('type'=>'hidden'));?>
<?=$this->Form->input('Member.organisation_id',array('type'=>'hidden','value'=>0));?>
<div class="frm-l" style="padding:0px;">
	<h3><address>Add Non Member</address></h3>
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
								$uniqueid = 'i_firstname';
							?>
							<div id="member_name_div" style="display:block" class="inline_form">
								<h3>Given Name</h3>
								<div id="<?=$uniqueid;?>_from">
									<span id="<?=$uniqueid;?>_label" class="label"><?=isset($this->request->data['Member']['gname'])?$this->request->data['Member']['gname']:'Enter Given Name';?></span>
									<a href="#" class="iedit" onclick="return false;"  id="<?=$uniqueid;?>_edit">Edit</a>
								</div>
								<div id="<?=$uniqueid;?>_from_i" style="display:none;">
									<?=$this->Form->input('Member.gname',array('id'=>$uniqueid.'_txt','label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Given Name','default'=>'Enter Given Name'));?>
									<a href="#" class="iapply" onclick="return false;" id="<?=$uniqueid;?>_apply" >Apply</a>&nbsp;|&nbsp;<a href="#" class="icancel" onclick="return false;" id="<?=$uniqueid;?>_cancel">Cancel</a>
								</div>
							</div>	
						</td>
						<td>	
							<?
								$uniqueid = 'i_lastname';
							?>
							<div id="member_name_div" style="display:block" class="inline_form">
								<h3>Last Name</h3>
								<div id="<?=$uniqueid;?>_from">
									<span id="<?=$uniqueid;?>_label" class="label"><?=isset($this->request->data['Member']['lname'])?$this->request->data['Member']['lname']:'Enter Last Name';?></span>
									<a href="#" class="iedit" onclick="return false;"  id="<?=$uniqueid;?>_edit">Edit</a>
								</div>
								<div id="<?=$uniqueid;?>_from_i" style="display:none;">
									<?=$this->Form->input('Member.lname',array('id'=>$uniqueid.'_txt','label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Last Name','default'=>'Enter Last Name'));?>
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
						<td colspan="2">
							<?
								$uniqueid = 'i_orgname';
							?>
							<div id="member_name_div" style="display:block" class="inline_form">
								<h3>Organisation Name</h3>
								<div id="<?=$uniqueid;?>_from">
									<span id="<?=$uniqueid;?>_label" class="label"><?=isset($this->request->data['Member']['organisation_name'])?$this->request->data['Member']['organisation_name']:'Enter Organisation Name';?></span>
									<a href="#" class="iedit" onclick="return false;"  id="<?=$uniqueid;?>_edit">Edit</a>
								</div>
								<div id="<?=$uniqueid;?>_from_i" style="display:none;">
									<?=$this->Form->input('Member.organisation_name',array('id'=>$uniqueid.'_txt','label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Organisation Name','default'=>'Enter Organisation Name'));?>
									<a href="#" class="iapply" onclick="return false;" id="<?=$uniqueid;?>_apply" >Apply</a>&nbsp;|&nbsp;<a href="#" class="icancel" onclick="return false;" id="<?=$uniqueid;?>_cancel">Cancel</a>
								</div>
							</div>						
						</td>
					</tr>
					<tr>
						<!--<td>
							<?
							/*
								$uniqueid = 'i_organisation';
							?>
							<div id="member_name_div" style="display:block" class="inline_form">
								<h3>Member Organisation</h3>
								<div id="<?=$uniqueid;?>_from">
									<span id="<?=$uniqueid;?>_label" class="label"><?=isset($this->request->data['Member']) && intval($this->request->data['Member']['organisation_id'])>0?$organisations[$this->request->data['Member']['organisation_id']]:'Enter Organisation Name';?></span>
									<a href="#" class="iedit" onclick="return false;"  id="<?=$uniqueid;?>_edit">Edit</a>
									<? 
									if(isset($this->request->data['Member']) && intval($this->request->data['Member']['verified_by'])>0){
									?>
									<div id="verifier" style="color:#898181;margin-top:10px;">
										<b><?=$this->request->data['Verifier']['fullname'];?></b> has verified that this member is an employee at this organisaton
									</div>
									<? 
									}
									?>
								</div>
								<div id="<?=$uniqueid;?>_from_i" style="display:none;">
									<?=$this->Form->input('Member.organisation_id',array('id'=>$uniqueid.'_txt','label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Organisation Name','default'=>'Enter Organisation Name'));?>
									<a href="#" class="iapply" onclick="return false;" id="<?=$uniqueid;?>_apply" >Apply</a>&nbsp;|&nbsp;<a href="#" class="icancel" onclick="return false;" id="<?=$uniqueid;?>_cancel">Cancel</a>
									<br />
									<?= $this->Form->input('Member.verified',array('value'=>'1','type'=>'checkbox','label'=>false,'after'=>'<label for="MemberVerified" style="float:none;width:250px;">is an employee of this member organisation</label>'));?>
									</div>
								</div>
							</div>	
							*/
							?>
						</td>-->
						<td>	
							<?
								$uniqueid = 'i_position';
							?>
							<div id="member_name_div" style="display:block" class="inline_form">
								<h3>Position</h3>
								<div id="<?=$uniqueid;?>_from">
									<span id="<?=$uniqueid;?>_label" class="label"><?=isset($this->request->data['Member']['position'])?$this->request->data['Member']['position']:'Enter Position Name';?></span>
									<a href="#" class="iedit" onclick="return false;"  id="<?=$uniqueid;?>_edit">Edit</a>
								</div>
								<div id="<?=$uniqueid;?>_from_i" style="display:none;">
									<?=$this->Form->input('Member.position',array('id'=>$uniqueid.'_txt','label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Position Name','default'=>'Enter Position Name'));?>
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
			<a href="#" id="d3" class="ndropdown " onclick="return false;"></a>
			<div id="rbox-content-d3" style="display:block;">
				<table>
					<tr>
						<td>
							<?
								$uniqueid = 'i_email';
							?>
							<div id="member_name_div" style="display:block" class="inline_form">
								<h3>Email Address</h3>
								<div id="<?=$uniqueid;?>_from">
									<span id="<?=$uniqueid;?>_label" class="label"><?=isset($this->request->data['Member']['email'])?$this->request->data['Member']['email']:'Enter Email Address';?></span>
									<a href="#" class="iedit" onclick="return false;"  id="<?=$uniqueid;?>_edit">Edit</a>
								</div>
								<div id="<?=$uniqueid;?>_from_i" style="display:none;">
									<?=$this->Form->input('Member.email',array('id'=>$uniqueid.'_txt','label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Email Address','default'=>'Enter Email Address'));?>
									<a href="#" class="iapply" onclick="return false;" id="<?=$uniqueid;?>_apply" >Apply</a>&nbsp;|&nbsp;<a href="#" class="icancel" onclick="return false;" id="<?=$uniqueid;?>_cancel">Cancel</a>
								</div>
							</div>	
						</td>
						<td>	
							<?
								$uniqueid = 'i_phone';
							?>
							<div id="member_name_div" style="display:block" class="inline_form">
								<h3>Phone</h3>
								<div id="<?=$uniqueid;?>_from">
									<span id="<?=$uniqueid;?>_label" class="label"><?=isset($this->request->data['Member']['phonenumber'])?$this->request->data['Member']['phonenumber']:'Enter Phone Number';?></span>
									<a href="#" class="iedit" onclick="return false;"  id="<?=$uniqueid;?>_edit">Edit</a>
								</div>
								<div id="<?=$uniqueid;?>_from_i" style="display:none;">
									<?=$this->Form->input('Member.phonenumber',array('id'=>$uniqueid.'_txt','label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Phone Number','default'=>'Enter Phone Number'));?>
									<a href="#" class="iapply" onclick="return false;" id="<?=$uniqueid;?>_apply" >Apply</a>&nbsp;|&nbsp;<a href="#" class="icancel" onclick="return false;" id="<?=$uniqueid;?>_cancel">Cancel</a>
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
	<?=$this->element('/admin/member/membership_status',array('open'=>true));?>
	<?//=$this->element('/admin/member/latest_activities',array('open'=>true));?>
	<?//=$this->element('/admin/member/administrator_notes',array('open'=>true));?>
</div>
<br style="clear:both;" />
	<div id="afm">
		<div id="afm-inner">
			<a href="#" onclick="$('nonmemberadd').submit();return false;" class="save_btn"></a>
			<!--<a href="#" onclick="ProjectsPreview($(this));return false;" class="preview_btn"><div>Preview</div></a>-->
			<script type="text/javascript">
			function ProjectsPreview(ele){
			   var form = $('nonmemberadd'); 
			   ele.down(0).update('Preparing Preview...');
			  	   
			   var prev_action = $('nonmemberadd').readAttribute('action');
			   $('nonmemberadd').writeAttribute('action','/admin/members/nonpreview/1');
			   form.request({
				   onComplete: function(){ 
					ele.down(0).update('Preview');
					window.open("/admin/members/nonpreview/0"); 
				   }
			   });
			   $('nonmemberadd').writeAttribute('action',prev_action);
			}
			</script>
			<ul id="footer-action">
				<li><a class="" href="#"  onclick="resetConfirm();return false;" title="Reset" >Reset</a></li>
				<li class='close'><a class='close' href="/<?=$this->request->data['Redirect']['redirect'];?>" title="Close" >Close</a></li>
				<!-- onclick="closeConfirm(this.href);return false;" -->
			</ul>
		</div>
	</div>
</form>
<script type="text/javascript">
function closeConfirm(href){
	$('nonmembermsg').down(1).update('Are you sure you want to close without saving?');
	$('nonmembermsg').down('div.cmsg_content_small').update('You may have unsaved changes.');
	$('nonmembermsg').down('a.green').writeAttribute('href',href);
	$('nonmembermsg').down('a.green').writeAttribute('onclick','');
	showStyleBox('nonmembermsg');
}
function resetConfirm(){
	$('nonmembermsg').down(1).update('You are about to reset all fields.');
	$('nonmembermsg').down('div.cmsg_content_small').update('This will undo any changes you have made to this form. Are you sure you want to reset?');
	$('nonmembermsg').down('a.green').writeAttribute('onclick',"$('nonmemberadd').reset();hideStyleBox('nonmembermsg');return false;");
	showStyleBox('nonmembermsg');
}
</script>