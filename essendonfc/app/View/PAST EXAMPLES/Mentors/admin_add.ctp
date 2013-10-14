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
<?= $this->Form->create(null,array('id'=>'individualadd','ENCTYPE'=>'multipart/form-data','url'=>'/admin/mentors/add/','method'=>'post'));?>
<?= $this->Form->input('Redirect.redirect',array('type'=>'hidden'));?>
<?= $this->Form->hidden('UserLogin.user_type',array('value'=>'Mentor'));?>
<div class="frm-l">
	<h3>Add Mentor </h3>
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
      <td width="83%"><?= $this->Form->input('UserLogin.user_name',array('label'=>false,  'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter First Name'));?></td>
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

</div>





	



	
</div>
<br/><br/>
<div class="frm-r">
	<?

		echo $this->element('/admin/modules/mentor_visibility',array('open'=>true));	


	?>

</div>
<br style="clear:both;" />
	<div id="afm">
		<div id="afm-inner">
			<a href="#" onclick="$('individualadd').submit();return false;" class="save_btn"></a>
			<div id='ajax-save'>
				<img src="<?= $theme_admin?>/images/ajaxLoader.gif"> Saving..
				</div>

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
<?=$this->element('/admin/member/administrator_notes_forms');?>

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