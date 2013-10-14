<td>
<?
	$media_types = array(
						'2'=>'Audio File',
						'1'=>'Video File'
					);
	echo $this->Form->input('Media.media_type_id',array('label'=>false,'empty'=>'None','options'=>$media_types,'selected'=>$this->Session->read('FMedia.media_type_id')));
?>
</td>