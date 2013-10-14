<?php
	if (!empty($projects)) :
		foreach ($projects as $id=>$val) :
			echo $this->Form->input('project_'.$id, array(
				'div' => array('class' => 'checkbox input project-ids'),
				'name' => 'data[Project][]',
				'type' => 'checkbox',
				'value' => $id,
				'label' => $val
			));
		endforeach;
	else :
		echo '<p>No projects are found</p>';
	endif;
?>