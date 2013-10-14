<div class="pages form">
<?= $this->Form->create('Page');?>
	<fieldset>
 		<legend><?= __('Edit Page');?></legend>
	<?
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('content');
		echo $this->Form->input('page_id');
		echo $this->Form->input('published');
		echo $this->Form->input('meta_id');
		echo $this->Form->input('menu_name');
		echo $this->Form->input('template_id');
		echo $this->Form->input('showatmenu');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?= $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Delete'), array('action' => 'delete', $this->Form->value('Page.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Page.id'))); ?></li>
		<li><?= $html->link(__('List Pages'), array('action' => 'index'));?></li>
	</ul>
</div>
