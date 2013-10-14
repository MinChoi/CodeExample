<?php
	echo $this->Form->create('File', array('type' => 'GET', 'action' => 'search')),
		$this->Form->input('q', array(
			'placeholder' => 'Search files',
			'label' => false,
			'value' => @$this->request->query['q'],
			'after' => '<input class="search-submit" type="submit" value="">'
		)),
		$this->Form->end();
?>
