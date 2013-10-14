<?
	$status_options = array(
						'-1'=>'Status',
						'0'=>'Pending',
						'1'=>'Active',
						'2'=>'Expired'
					);
	echo $this->Form->input('Organisation.status',array('label'=>false,'options'=>$status_options,'selected'=>$this->Session->read('Organisation.status')));
?>