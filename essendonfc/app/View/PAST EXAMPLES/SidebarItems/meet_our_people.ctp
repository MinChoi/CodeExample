	<div class="sidebarBox meetPeople">
		<h4>Meet our people</h4>
		<a href="<?= url($person) ?>"><img src="<?= $person['Person']['image'] ?>" alt=""/></a>
		<div class="name">
			<a href="<?= url($person) ?>"><?= $person['Person']['firstName'] ?> <?= $person['Person']['lastName'] ?></a>
		</div>
		<div class="position"><?= $person['Person']['position'] ?></div>
		<!--<div class="team"><?= $person['Team']['name'] ?></div>-->
	</div>
