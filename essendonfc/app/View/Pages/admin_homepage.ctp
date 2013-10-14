<?php
	$this->extend('/Common/admin_edit'); 
	$this->assign('title', 'Homepage Content &amp; Settings'); 
?>

<?= $this->element('admin/notices') ?>


<?= $this->CmsForm->textbox('Youtube Video Link', 'Homepage.video_url'); ?>
<?= $this->CmsForm->wysiwyg('Member News', 'Homepage.MemberNews'); ?>
<? // Beginning of form fields here ?>		
