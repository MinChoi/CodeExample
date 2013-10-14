<td>
<?
	$categoryclass = ClassRegistry::init('Category');
	$categories = $categoryclass->getCatlist(3);
	echo $this->Form->input('Media.category_id',array('label'=>false,'empty'=>'View all categories','type'=>'select','options'=>$categories,'selected'=>$this->Session->read('FMedia.category_id')));
?>
</td>