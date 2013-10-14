<div class="categories form">
<?
echo $ajax->form(array('type' => 'post',
    'options' => array(
        'model'=>'Category',
        'update'=>'MB_content',
        'url' => array(
            'controller' => 'categories',
            'action' => 'edit',
			'admin' => true
        ),
		'indicator' => 'loadingDiv',
		'complete'=>'Modalbox.resizeToContent();'
    )
));
?>
	<fieldset>
 		<legend><?= __('Edit Category');?></legend>
	<?
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?= $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li>
			<? 
				echo $ajax->link('Delete Category','/admin/categories/delete/'.$this->Form->value('Category.id'),array( 'update' => 'MB_content','complete'=>'Modalbox.resizeToContent();'), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Category.id')));
			?>
		</li>
		<li>
			<? 
			echo $ajax->link('List Categories',array( 'controller' => 'categories', 'action' => 'index', 'admin'=>true ),array( 'update' => 'MB_content','complete'=>'Modalbox.resizeToContent();'));
			?>
		</li>
	</ul>
</div>
