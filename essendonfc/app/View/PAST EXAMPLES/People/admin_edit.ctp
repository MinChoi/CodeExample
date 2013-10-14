<?
$this->StyleBox->ConfirmMessageStart('pagesmsg','');
$this->StyleBox->ConfirmMessageEnd('','Yes','Cancel');
// debug($this->request->data);
?>
<?/*= $this->Form->create('Page',array('id'=>'pageadd'));?>
<?=$this->Form->input('Page.meta_id',array('type'=>'hidden'));?>
<?=$this->Form->input('Page.page_id',array('type'=>'hidden'));?>
<?=$this->Form->input('Page.sitemap_id',array('type'=>'hidden'));?>
<?=$this->Form->input('Page.islink',array('type'=>'hidden'));?>
<?=$this->Form->input('Page.link',array('type'=>'hidden'));?>
<?=$this->Form->input('Redirect.redirect',array('type'=>'hidden'));*/?>

<?= $this->CmsForm->create('Person', array('id'=>'pageadd', 'class'=>'mainForm white')) ?>

	<?= $this->CmsForm->hidden('id') ?>

	<!-- Left side of form -->
	<div class="frm-l">
	
		<h1>Staff Member Details</h1>
	
		<?= $this->element('admin/notices') ?>
	
		<? //-------- Beginning of form fields here --------- ?>
		<?= $this->CmsForm->textbox('First name', 'firstName') ?>
		<?= $this->CmsForm->textbox('Last name', 'lastName') ?>
		<?= $this->CmsForm->textbox('Initials', 'initials') ?>
		<?= $this->CmsForm->textbox('Extension', 'extension') ?>
		<?= $this->CmsForm->textbox('Mobile number', 'mobile') ?>
		<?= $this->CmsForm->textbox('Email address', 'email') ?>
		<?= $this->CmsForm->textbox('Password', 'password') ?>
		<?= $this->CmsForm->selectBox('Position type', 'positionType', array(
			'Consultant' => 'Consultant', 
			'Partner' => 'Partner',
			'Special Counsel' => 'Special Counsel',
			'Senior Associate' => 'Senior Associate',
			'Lawyer' => 'Lawyer',
			'Law Clerk' => 'Law Clerk',
			'Non-Legal' => 'Non-Legal',
		)) ?>
		<?= $this->CmsForm->textbox('Position', 'position') ?>
		<?= $this->CmsForm->selectAndManage('Team', 'team_id', $teams, 'Team') ?>
		<?= $this->CmsForm->textbox('PA to Lawyer / PA Name', 'pa') ?>
		<?= $this->CmsForm->image('Photo', 'image') ?>
		<?= $this->CmsForm->textbox('LinkedIn profile link', 'linkedIn') ?>
		<?= $this->CmsForm->textbox('Skype name', 'skype') ?>
		
		<?= $this->CmsForm->multiChooser('Practice Areas', $practiceAreas, @$this->request->data['PracticeArea']) ?>
		
		<?= $this->CmsForm->textareaOld('Short description', 'shortDesc') ?>
		<?= $this->CmsForm->wysiwyg('Full profile detail', 'fullProfile') ?>

	
	
	
</div>

<!-- Right side of form -->
<div class="frm-r">
	<?
		echo $this->element('/admin/modules/page_visibility', array('open'=>true));
		// echo $this->element('/admin/modules/page_access',array('open'=>true));
		echo $this->element('/admin/modules/tags', array('open'=>false));
		// echo $this->element('/admin/modules/seo',array('open'=>false));
		echo $this->element('/admin/modules/widgets',array('open'=>false));
	?>
</div>


<!-- Bottom button bar -->
<br style="clear:both;" />
	<div id="afm">
		<div id="afm-inner">
			<a href="#" onclick="$$('.mainForm')[0].submit();return false;" class="save_btn"></a>
			<a href="#" onclick="PagePreview($(this));return false;" class="preview_btn"><div>Preview</div></a>
			<? //Last saved at: <?= date("j F, Y, g:i a",strtotime($this->request->data['Page']['modified']));  ?>
			<script type="text/javascript">
			
				function PagePreview(ele){
				   /* var form = $('pageadd'); 
				   ele.down(0).update('Preparing Preview...');
				   $('pagecontent').update(tinyMCE.get('pagecontent').getContent());
				   
				   var prev_action = $('pageadd').readAttribute('action');
				   $('pageadd').writeAttribute('action','/admin/pages/preview/1');
				   form.request({
					   onComplete: function(){ 
						ele.down(0).update('Preview');
						window.open("/admin/pages/preview/0"); 
					   }
				   });
				   $('pageadd').writeAttribute('action',prev_action); */
				   
				   var form = $('pageadd'); 
					ele.down(0).update().insert('Preparing Preview...');
					try{
						$('pagecontent').value = tinyMCE.get('pagecontent').getContent();
					}catch(err){
						$('pagecontent').update(tinyMCE.get('pagecontent').getContent());
					}

					var prev_action = $('pageadd').readAttribute('action');
					$('pageadd').action = '/admin/pages/preview/1';
					form.request({
						onComplete: function(){ 
							ele.down(0).update().insert('Preview');
							window.open("/admin/pages/preview/0"); 
						}
					});
					$('pageadd').action = prev_action;
				   
				}
			</script>
			<? //} ?>
			
			
			<ul id="footer-action">
				<li><a class="" href="#"  onclick="resetConfirm();return false;" title="Reset" >Reset</a></li>
				<li class='close'><a class='close' onclick="" href="/admin/people" title="Close" >Close</a></li> <!-- closeConfirm(this.href);return false;-->
			</ul>
		</div>
	</div>
</form>
<script type="text/javascript">
function closeConfirm(href){
	$('pagesmsg').down(1).update('Are you sure you want to close without saving?');
	$('pagesmsg').down('div.cmsg_content_small').update('You may have unsaved changes.');
	$('pagesmsg').down('a.green').writeAttribute('href',href);
	$('pagesmsg').down('a.green').writeAttribute('onclick','');
	showStyleBox('pagesmsg');
}
function resetConfirm(){
	$('pagesmsg').down(1).update('You are about to reset all fields.');
	$('pagesmsg').down('div.cmsg_content_small').update('This will undo any changes you have made to this form. Are you sure you want to reset?');
	$('pagesmsg').down('a.green').writeAttribute('onclick',"$('pageadd').reset();hideStyleBox('pagesmsg');return false;");
	showStyleBox('pagesmsg');
}
</script>
