<?
$orderlist = array(
						''=>'None',
						'az'=>'A-Z',
						'za'=>'Z-A',
						'last_login'=>'Last Login'
);

$org_obj = ClassRegistry::init('Mentor');
$organisations = $org_obj->find('list',array('order'=>'last_name'));
echo $this->Form->input('Mentor.sortby',array('label'=>false,'empty'=>'None','options'=>$orderlist,'selected'=>$this->Session->read('Mentor.sortby')));?>