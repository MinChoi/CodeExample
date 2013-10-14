<?
	$sortlist = array(
						''=>'None',
						'pending'=>'Pending',
						'expired'=>'Expired',
						'active'=>'Active'
					);
	echo $this->Form->input('Member.sortby',array('label'=>false,'empty'=>'None','options'=>$sortlist,'selected'=>$this->Session->read('MemMember.sortby')));
?>
