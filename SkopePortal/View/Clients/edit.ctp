<header>
	<div class="row">
		<div class="large-12 column clearfix">
			<?php
				if ($_USER['type'] != $USER_USER):
					$this->Html->addCrumb('Home', '/clients/');
				endif;

				$txt = 'Add Client';
				if (empty($this->request->params['client_id'])):
					$this->Html->addCrumb($txt, '/clients/add');
				else:
					$txt = 'Edit Client';
					$this->Html->addCrumb($this->request->data['Client']['name'], '/clients/view/'.$this->request->params['client_id']);
					$this->Html->addCrumb($txt, '/clients/edit/'.$this->request->params['client_id']);
				endif;
				echo $this->Html->getCrumbList(array('class' => 'breadcrumbs'));
			?>
		</div>
	</div>
	<div class="row">
		<div class="large-12 column">
			<h2><?php echo $txt; ?></h2>
		</div>
	</div>
</header>
<div class="row">

	<div class="large-6 columns">

		<?php
			echo $this->Form->create('Client', array('type' => 'post', 'enctype' => "multipart/form-data")),
				$this->Form->input('id', array('type' => 'hidden')),
				$this->Form->input('create_time', array('type' => 'hidden', 'value' => @$this->request->data['Client']['created'])),
				$this->Form->input('name', array('data-maxlength' => '15', 'data-output' => 'name-status', 'size' => '20',
					'label' => 'Name (<span>Max: 15, Current: <span id="name-status"></span><span>)'));

			if (isset($this->request->data['Client']['logo_file']))
				echo $this->Html->image(@$this->request->data['Client']['logo_file']);

			echo $this->Form->input('logo', array('type' => 'file')),
				$this->Form->end(array('class' => 'button button-success', 'after' => '<div class="loading-icon"></div>'));
		?>

	</div>

</div>
