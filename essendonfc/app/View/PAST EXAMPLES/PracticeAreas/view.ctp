<div class="sidebarLeft">

	<?= $this->element('frontend/sidebar_model_list', array('title' => 'Areas of Practice', 'model' => 'PracticeArea')) ?>
	
	<?//----- Show related topics (tags) -----?>
	<?= $this->element('frontend/sidebar_tags') ?>

</div>

<div class="content practiceArea">

	<h1><?= $area['PracticeArea']['name'] ?></h1>

	<? if ($area['PracticeArea']['image']) : ?>
		<div class="image">
			<img src="<?= $area['image'] ?>" alt=""/>
		</div>
	<? endif ?>
	
	<div class="description">
		<?= html_entity_decode($area['PracticeArea']['description']) ?>
	</div>
	
	<?// Display a list of staff members associated with this area ?>
	<? if (count($area['Person'])) : ?>
		<div class="contacts contentBox">
			<h3>Contacts</h3>
			<? foreach ($area['Person'] as $p) : ?>
				<div class="column">
					<div class="name"><a href="<?= url($p, 'Person') ?>"><?= $p['name'] ?></a></div>
					<div class="position"><?= $p['position'] ?></div>
					<div class="phone">+61 3 9242 4<?= $p['extension'] ?></div>
					<div class="email"><a href="mailto:<?= $p['email'] ?>"><?= $p['email'] ?></a></div>
				</div>
			<? endforeach ?>
		</div>
	<? endif ?>
	
	<?// Display a list of news/events associated with this area ?>
	<? if (count($area['Event'])) : ?>
		<div class="latest contentBox">
			<h3>Latest News &amp; Events in <?= $area['PracticeArea']['name'] ?></h3>
			<? foreach ($area['Event'] as $e) : ?>
				<div class="column">
					<div class="name"><a href="#####"><?= $e['title'] ?></a></div>
					<div class="date"><?= human_date($e['start_date']) ?></div>
				</div>
			<? endforeach ?>
		</div>
	<? endif ?>
	
</div>

