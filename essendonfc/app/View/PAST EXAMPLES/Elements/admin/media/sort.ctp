<td>
<?
	$sortlist = array(
						'title ASC'=>'A-Z',
						'title DESC'=>'Z-A',
						'created DESC'=>'Created Date',
						'modified DESC'=>'Modified Date'
					);
	echo $this->Form->input('Media.sortby',array('label'=>false,'empty'=>'None','options'=>$sortlist,'selected'=>$this->Session->read('FMedia.sortby')));
?>
</td>