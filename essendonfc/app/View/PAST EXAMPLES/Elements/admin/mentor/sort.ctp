<?
	$sortlist = array(
						''=>'None',
						'pending'=>'Pending',
						'expired'=>'Expired',
						'active'=>'Active'
					);
	echo $this->Form->input('Mentor.sortby',array('label'=>false,'empty'=>'None','options'=>$sortlist,'selected'=>$this->Session->read('Mentor.sortby')));
?>
