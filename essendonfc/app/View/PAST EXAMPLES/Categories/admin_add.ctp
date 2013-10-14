<div class="categories form">
<?
echo $ajax->form(array('type' => 'post',
    'options' => array(
        'model'=>'Category',
        'update'=>'MB_content',
        'url' => array(
            'controller' => 'categories',
            'action' => 'add',
			'admin' => true
        ),
		'indicator' => 'loadingDiv',
		'complete'=>'Modalbox.resizeToContent();'
    )
));
?>
	<fieldset>
 		<legend><?= __('Add Category');?></legend>
	<?
		echo $this->Form->input('name');
	?>
	</fieldset>
<?= $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li>
		<? 
			echo $ajax->link('List Categories',array( 'controller' => 'categories', 'action' => 'index', 'admin'=>true ),array( 'update' => 'MB_content','complete'=>'Modalbox.resizeToContent();'));
		?>
		</li>
	</ul>
</div>
