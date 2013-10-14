<div class="sidebarLeft">
	<?= $this->element('frontend/sidebar_people_types') ?>
</div>

<div class="content">
	<? if ($positionType) { ?>
		<h1><?= ucwords($positionType) ?></h1>
	<? } else { ?>
		<h1>Staff Directory</h1>
	<? } ?>
	
	<?//---- Filters ------- ?>
	<form method="POST" class="listFilters">
		<?= $this->CmsForm->input('Filter.PracticeAreas', array('empty' => true, 'label' => 'View by Legal Area')) ?>
		<?= $this->CmsForm->input('Filter.SortBy', array('empty' => true)) ?>
		<script type="text/javascript">
			$(function(){
				$('.listFilters select').on('change', function(){ this.form.submit() })
			})
		</script>
	</form>
	
	<? foreach ($people as $person) { // Loop through the staff members ?>
		<div class="person">
			<? if ($person['Person']['image']) { ?>
				<div class="image">
					<a href="/people/view/<?= $person['Person']['id'] ?>"><img src="<?= $person['Person']['image'] ?>" alt="Madgwicks Staff: <?= $person['Person']['name'] ?>"/></a>
				</div>
			<? } ?>
			<div class="details">
				<a href="/people/view/<?= $person['Person']['id'] ?>" class="name"><?= $person['Person']['name'] ?></a>
				<div class="positionType"><?= $person['Person']['positionType'] ?></div>
				<p class="shortDesc"><?= $person['Person']['shortDesc'] ?></p>
				<a href="/people/view/<?= $person['Person']['id'] ?>" class="blueButton arrow"><span>View profile</span></a>
			</div>
		</div>
	<? } ?>
	
	<? if (count($people) == 0) { // If no staff members are found (perhaps an invalid category?) ?>
		<p>We currently do not have any '<?= $this->params['category'] ?>' profiles available for you to view.</p>
	<? } ?>
</div>

