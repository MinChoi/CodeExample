
<h1>Edit Document Details</h1>

<?= $this->CmsForm->create('Document', array(
	'id' => 'documentAdd',
	'class' => 'mainForm white',
	)) ?>

	<?= $this->CmsForm->hidden('id') ?>
	
	<? if ($routing_prefix == 'staff')
		echo $this->CmsForm->selectBox('Client', 'client_id', $staffClients, null, array('empty' => false));	// provide a select box
	   else
		echo $this->CmsForm->hidden('client_id');	// hidden field only (this should be verified/overwritten in controller for security)
	?>

	<div class="frm-l">

		<?= $this->CmsForm->textbox('Document Title', 'title') ?>
		<?= $this->CmsForm->selectBox('Document Category', 'document_category_id', $categories) ?>
		<?= $this->CmsForm->textareaOld('Document Description (optional)', 'description') ?>
		<?= $this->CmsForm->fileRevisions('Document Versions') ?>
		
		<a href="#" onclick="$('#documentAdd').submit(); return false" class="blueButton" style="margin: 15px 0">
			<span>Save Changes</span>
		</a>
		<a href="<?= $this->Html->url(array('action' => 'index', $this->request->data['Document']['client_id'])) ?>" class="blueButton" style="margin: 15px">
			<span>Cancel &amp; Go Back</span>
		</a>
		
	</div>

<?= $this->CmsForm->end() ?>
