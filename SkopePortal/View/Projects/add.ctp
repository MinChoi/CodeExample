<header>
	<h3>Client: <?php echo $client['Client']['name']; ?></h3>
</header>

<?php
	echo $this->Form->create(),
		$this->Form->input('name', array('label'=>'Project name')),
		$this->Form->input('state', array('options' => Project::getStates())),
		$this->Form->end(array('class' => 'button'));
?>

<a href="/clients/view/<?php echo $client['Client']['id']; ?>">Back</a>
