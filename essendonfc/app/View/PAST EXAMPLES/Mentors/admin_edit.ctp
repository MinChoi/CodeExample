<?= $this->element('admin/header_js')?>
<script type="text/javascript"><!--
jQuery(function()
{

	jQuery("#tabs").tabs();

	mentor_get_skill();
	mentor_get_ind();
	mentor_get_qul();


});


--></script>
<?= $this->Form->create(null,array('id'=>'individualadd','ENCTYPE'=>'multipart/form-data','url'=>'/admin/mentors/edit/'.$this->data['Mentor']['id'],'method'=>'post'));?>
<?= $this->Form->input('Redirect.redirect',array('type'=>'hidden'));?>
<?= $this->Form->input('Mentor.id',array('type'=>'hidden'));?>
<?= $this->Form->input('UserLogin.id',array('type'=>'hidden'));?>
<div class="frm-l">
	<h3>View/Edit Mentor <b><?= $this->request->data['Mentor']['first_name']. ' ' . $this->request->data['Mentor']['last_name']?> </b></h3>
	<br/>
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





<? //debug($this->data)?>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Basics Details</a></li>
		<li><a href="#tabs-2">Skills & Experience</a></li>
        <li><a href="#tabs-3">Bookings</a></li>
		
	</ul>
	<div id="tabs-1">
    
    <div class="rbox"><div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<div id="rbox-content-d1" style="display:block;">
	<table width="790" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td width="17%"><h3>First name</h3></td>
      <td width="83%"><?= $this->Form->input('Mentor.first_name',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter First Name'));?></td>
    </tr>
    <tr>
      <td><h3>Last name</h3></td>
      <td><?= $this->Form->input('Mentor.last_name',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Last Name'));?></td>
    </tr>
    <tr>
      <td><h3>Address</h3></td>
      <td><?= $this->Form->input('Mentor.address',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Address'));?></td>
    </tr>
    <tr>
      <td><h3>Suburb</h3></td>
      <td><?= $this->Form->input('Mentor.suburb',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Suburb'));?></td>
    </tr>
    <tr>
      <td><h3>Post code</h3></td>
      <td><?= $this->Form->input('Mentor.post_code',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Post Code'));?></td>
    </tr>
  </table>
			</div>	
		</div>
	</div>
    
    	
	<div class="rbox-btm"><div></div></div>
	
	
	<br />
	
	
		<div class="rbox"><div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<div id="rbox-content-d2" style="display:block;">
	<table width="790" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td width="17%"><h3>User name</h3></td>
      <td width="83%"><?= $this->Form->input('UserLogin.user_name',array('label'=>false, 'readonly'=>true, 'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter First Name'));?></td>
    </tr>
    <tr>
      <td><h3>Password</h3></td>
      <td><?= $this->Form->input('UserLogin.user_pass',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Last Name'));?></td>
    </tr>

  </table>
			</div>	
		</div>
	</div>
	<div class="rbox-btm"><div></div></div>
    <!-- end 1 -->
    
    </div>
	<div id="tabs-2">
	

<div class="rbox"><div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<div style="display:block;" id="rbox-content-d2">

<table width="100%" border="0" cellspacing="5" cellpadding="0">
			  <tr>
			    <td colspan="3"><strong>Professional Qualifications</strong></td>
		      </tr>
			  <tr>
			    <td width="9%"> 
			    <select name="qul-rating" class="qul-def-rating"> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					
				</select>  
</td>
			    <td width="86%"><input name="qul-desc" type="text" id="qul-desc" size="70"></td>
			    <td width="5%"><a href="javascript:;" id="add-qul"><img src="<?= $theme_admin?>/images/add.png" alt="Add Qualification" border='0' /></a></td>
		      </tr>
			  <tr>
			    <td colspan="3">
				    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="mentor-Qul-list">
	
				    
				    </table>
			    </td>
		      </tr>
			  </table>
			</div>	
		</div>
	</div>
<div class="rbox-btm"><div></div></div>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="50%"  valign='top'>
        
        <div class="rbox"><div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<div style="display:block;" id="rbox-content-d2">

			<table width="100%" border="0" cellspacing="5" cellpadding="0">
			  <tr>
			    <td><strong>Skills</strong></td>
		      </tr>
			  <tr>
			    <td>
			    <select id="skill-cats" name="skill-cats">
					<?=($skill_cats)?>
			    </select>
			    <select id="skill-child" name="skill-child">
					
			    </select>
			    
			    </td>
			    <td class='icon-add-skill'> <a href="javascript:;" id="add-skill"><img src="<?= $theme_admin?>/images/add.png" alt="Add Skill" border='0' /></a></td>
		      </tr>
			  <tr>
			    <td colspan=2>
						<table width="100%" border="0" cellspacing="0" cellpadding="0" id="mentor-Skill-list">
				
				</table>
		
			    </td>
		      </tr>
			  <tr>
			    <td colspan=2>&nbsp;</td>
		      </tr>
			  </table>
			</div>	
		</div>
	</div>
	<div class="rbox-btm"><div></div></div>
        
        </td>
        <td width="50%"  valign='top'>
        
        <div class="rbox"><div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<div style="display:block;" id="rbox-content-d2">

<table width="100%" border="0" cellspacing="5" cellpadding="0">
			  <tr>
			    <td><strong>Industries</strong></td>
		      </tr>
			  <tr>
			    <td>
			    <select id="skill-inds" name="skill-inds">
					<?=($ind_cats)?>
			    </select>
			    
			    </td>
			    <td class='icon-add-ind'align='right' > <a href="javascript:;" id="add-ind" ><img src="<?= $theme_admin?>/images/add.png" alt="Add Industry" border='0' /></a></td>
		      </tr>
			  <tr>
			    <td colspan=2>
						<table width="100%" border="0" cellspacing="0" cellpadding="0" id="mentor-Ind-list">
				
				</table>
		
			    </td>
		      </tr>
			  <tr>
			    <td colspan=2>&nbsp;</td>
		      </tr>
			  </table>
			  
			</div>	
		</div>
	</div>
        <div class="rbox-btm"><div></div></div>
        </td>
  </tr>
</table>

	
	<!-- end 2 -->
	</div>
    <div id="tabs-3">3</div>

</div>





	



	
</div>
<br/><br/>
<div class="frm-r">
	<?

		echo $this->element('/admin/modules/mentor_visibility',array('open'=>true));	
		echo $this->element('/admin/mentor/administrator_notes',array('open'=>true));


	?>

</div>
<br style="clear:both;" />
	<div id="afm">
		<div id="afm-inner">
			<a href="#" onclick="$('individualadd').submit();return false;" class="save_btn"></a>
			<div id='ajax-save'>
				<img src="<?= $theme_admin?>/images/ajaxLoader.gif"> Saving..
				</div>
			<? //if(intval($this->data['Page']['islink'])==0){ ?>
			Last saved at: <?= date("j F, Y, g:i a",strtotime($this->data['Mentor']['modified_at']));  ?>
		
			<? //} ?>
			<ul id="footer-action">
				<li><a class="" href="#"  onclick="resetConfirm();return false;" title="Reset" >Reset</a></li>
				<? //if($this->data['Redirect']['redirect']=='admin-sitemap'){ ?>
				<? //}else{ ?>
					<li class='close'><a class='close' onclick="" href="/<?=$this->data['Redirect']['redirect'];?>" title="Close" >Close</a></li> <!-- closeConfirm(this.href);return false;-->
				<? //} ?>
			</ul>
		</div>
	</div>
</form>
<? //debug($this)?>
<?= $this->element('/admin/mentor/administrator_notes_forms');?>

<script type="text/javascript">
function closeConfirm(href){
	$('individualmsg').down(1).update('Are you sure you want to close without saving?');
	$('individualmsg').down('div.cmsg_content_small').update('You may have unsaved changes.');
	$('individualmsg').down('a.green').writeAttribute('href',href);
	$('individualmsg').down('a.green').writeAttribute('onclick','');
	showStyleBox('individualmsg');
}
function resetConfirm(){
	$('individualmsg').down(1).update('You are about to reset all fields.');
	$('individualmsg').down('div.cmsg_content_small').update('This will undo any changes you have made to this form. Are you sure you want to reset?');
	$('individualmsg').down('a.green').writeAttribute('onclick',"$('individualadd').reset();hideStyleBox('individualmsg');return false;");
	showStyleBox('individualmsg');
}
</script>