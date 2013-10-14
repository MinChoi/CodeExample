<td colspan="4" class="user-clients-projects">
<?php
	foreach ($all_clients as $client) :
		$projects = '';
		if (!empty($client['Project'])):
			foreach ($client['Project'] as $p) :
				$projects.= $this->Form->input('project_'.$p['id'], array(
					'div' => array('class' => 'checkbox input project-ids'),
					'name' => 'data[Project][]',
					'type' => 'checkbox',
					'value' => $p['id'],
					'label' => $p['name'],
					'checked' => in_array($p['id'], $user_projects['Project']),
				));
			endforeach;
		else:
			$projects = '<p>No projects for the client</p>';
		endif;
				
		echo $this->Form->input('client_'.$client['Client']['id'], array(
			'div' => array('class' => 'checkbox input client-ids'),
			'name' => 'data[Client][]',
			'type' => 'checkbox',
			'value' => $client['Client']['id'],
			'checked' => @in_array($client['Client']['id'], $user_projects['Client']),
			'client-id' => $client['Client']['id'],
			'label' => $client['Client']['name'],
			'after' => '<div '.(@in_array($client['Client']['id'], $user_projects['Client'])?'':' style="display:none"').' class="project-ids projects-client-'.$client['Client']['id'].'">'
				. $projects . '</div>'
		));
	endforeach;
?>
</td>
<td><a href="javascript:void(0)" class="button button-success save-projects-change" user-id="<?php echo $user_projects['User']['id']; ?>">Save changes</a>
<div class="save-projects-icon"></div>
</td>
