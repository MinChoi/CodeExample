<?
class MentorQualification extends AppModel {
	var $name = 'MentorQualification';
	
	var $actsAs = array('Acl' => array('type' => 'requester'));
 
	function parentNode() {
		return null;
	}

	
	//The Associations below have been created with all possible keys, those that are not needed can be removed


	
	
	function get_attribs_for_mentor($id, $type = 'Skill')
	{
		
		$r = $this->query("Select A.attrib_name, MA.id, MA.rating , MA.mentor_id , A.attrib_type from mentor_attribs MA left join attribs A on MA.attrib_id = A.id where A.attrib_type = '".$type."' AND MA.mentor_id  = ".$id);
		
		return $r;
		
	}


}
?>