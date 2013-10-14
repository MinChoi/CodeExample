<?
	$sortlist = array(
						''=>'None',
						'az'=>'A-Z',
						'za'=>'Z-A',
						//'pending'=>'Pending',
						//'expired'=>'Expired',
						//'active'=>'Active'
					);
	echo $this->Form->input('Organisation.sortby',array('label'=>false,'options'=>$sortlist,'selected'=>$this->Session->read('Organisation.sortby')));
?>
