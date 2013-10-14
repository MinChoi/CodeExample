<?php
	$this->extend('/Common/admin_edit'); 
	$this->assign('title', 'Homepage Content &amp; Settings'); 
?>

<?= $this->element('admin/notices') ?>


<?= $this->CmsForm->textbox('Youtube Video Link', 'Homepage.video_url'); ?>
<?= $this->CmsForm->wysiwyg('Member News', 'Homepage.MemberNews'); ?>
<? // Beginning of form fields here ?>		
<?= $this->CmsForm->textbox('Second column title', 'homepage.focus_on_title') ?>
<?= $this->CmsForm->textbox('Second column subtitle', 'homepage.focus_on_subtitle') ?>
<?= $this->CmsForm->kcFinderImage('Second column image', 'homepage.focus_on_image') ?>
<?= $this->CmsForm->wysiwyg('Second column text <span>(an "Areas of Practice" link will appear underneath)</span>', 'homepage.focus_on_text') ?>

<?= $this->CmsForm->textbox('Third column title', 'homepage.presentation_title') ?>
<?= $this->CmsForm->textbox('Third column subtitle', 'homepage.presentation_subtitle') ?>
<?= $this->CmsForm->kcFinderImage('Third column image', 'homepage.presentation_image') ?>
<?= $this->CmsForm->kcFinderFile('Third column video <span>(optional)</span>', 'homepage.presentation_video') ?>
<?= $this->CmsForm->wysiwyg('Third column text <span>(a "View Presentation" link will appear underneath)</span>', 'homepage.presentation_text') ?>