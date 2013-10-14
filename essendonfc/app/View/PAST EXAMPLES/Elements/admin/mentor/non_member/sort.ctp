<td>
<?
	$sortlist = array(
						''=>'None',
						'created DESC'=>'Created',
						'modified DESC'=>'Modified',
						'targeted DESC'=>'Target',
						//'voting_rights DESC'=>'Voting rights'
					);
	echo $this->Form->input('Member.sortby',array('label'=>false,'empty'=>'None','options'=>$sortlist,'selected'=>$this->Session->read('Organisation.sortby')));
?>
</td>