<?
	$sortlist = array(
						'0'=>'Member Tier',
						'1'=>'1-299',
						'2'=>'300-599',
						'3'=>'600-1199',
						'4'=>'1200-2999',
						'5'=>'More than 3000'
						
					);
	echo $this->Form->input('Organisation.member_tier_id',array('label'=>false,'options'=>$sortlist,'selected'=>$this->Session->read('Organisation.member_tier_id')));
?>
