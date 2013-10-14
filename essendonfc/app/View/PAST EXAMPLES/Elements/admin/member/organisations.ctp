<?
$org_obj = ClassRegistry::init('Organisation');
$organisations = $org_obj->find('list',array('order'=>'name'));
echo $this->Form->input('Member.organisation_id',array('label'=>false,'empty'=>'view all organisations','options'=>$organisations,'selected'=>$this->Session->read('MemMember.organisation_id')));
?>