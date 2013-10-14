<div class="widgets form">
<?= $this->Form->create('Widget');?>
	<fieldset>
 		<legend><?= __('Add Widget');?></legend>
	<?
		echo $this->Form->input('name');
		echo $this->Form->input('path');
		echo $this->Form->input('Event');
		echo $this->Form->input('News');
		echo $this->Form->input('Page');
	?>
	</fieldset>
<?= $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('List Widgets'), array('action' => 'index'));?></li>
		<li><?= $html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?= $html->link(__('List News'), array('controller' => 'news', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New News'), array('controller' => 'news', 'action' => 'add')); ?> </li>
		<li><?= $html->link(__('List Pages'), array('controller' => 'pages', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Page'), array('controller' => 'pages', 'action' => 'add')); ?> </li>
	</ul>
</div>
