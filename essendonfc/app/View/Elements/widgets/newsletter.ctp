<h3>Newsletter</h3>
<?= $this->CmsForm->create('', array('id' => 'newsletterForm')) ?>
<p>Sign up to receive the latest information by email.</p>
<?= $this->CmsForm->input('Newsletter.email') ?>
<?= $this->Html->link('Subscribe', '#', array('id' => 'newsletterSubmit')) ?>
<?= $this->CmsForm->end() ?>

<?php $this->append('scriptsBottom'); ?>
$('#newsletterSubmit').click(function(e) {
	e.preventDefault();
	$('#newsletterForm').submit();
});
<?php $this->end(); ?>