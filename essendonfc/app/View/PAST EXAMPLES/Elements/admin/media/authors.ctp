<td>
<?
	$userclass = ClassRegistry::init('User');
	$users = $userclass->adminlist();
	echo $this->Form->input('Media.created_by',array('label'=>false,'empty'=>'View all authors','options'=>$users,'selected'=>$this->Session->read('FMedia.created_by')));
?>
</td>