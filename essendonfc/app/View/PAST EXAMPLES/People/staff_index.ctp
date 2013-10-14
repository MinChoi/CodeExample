<?//= krumo($this->passedArgs) ?>
<? $this->Paginator->options(array('url' => array(
	'staff' => true, 
	'controller' => 'people', 
	'action' => $this->params['category']
))) ?>


<div class="sidebarLeft">
	<?= $this->element('frontend/sidebar_page_submenu', array('page' => 62)) // Staff Directory is menu link with ID 62 ?>
</div>

<div class="content">

	<h1>Staff Directory</h1>
	
	<form method="POST" class="listFilters">
		<?= $this->Form->input('Filters.team_id', array('label' => 'Filter by Team: ', 'empty' => '')) ?>
		<?= $this->Form->input('SortBy', array('empty' => true)) ?>
		<script type="text/javascript">
			$(function(){
				$('.listFilters select').on('change', function(){ this.form.submit() })
			})
		</script>
	</form>
	
	<? foreach ($people as $person) { //debug($person) // Loop through the staff members ?>
		<div class="person">
			<? if ($person['Person']['image']) { ?>
				<div class="image">
					<a href="/staff/people/view/<?= $person['Person']['id'] ?>"><img src="<?= $person['Person']['image'] ?>" alt="Madgwicks Staff: <?= $person['Person']['name'] ?>"/></a>
				</div>
			<? } ?>
			<div class="details">
				<a href="/staff/people/view/<?= $person['Person']['id'] ?>" class="name"><?= $person['Person']['name'] ?></a>
				<div class="position"><?= $person['Person']['position'] ?></div>
				
				<div class="detailItem dept">
					<div class="label">Department:</div>		
					<div><?= $person['Team']['name'] ?></div>
				</div>
				<div class="detailItem ext">
					<div class="label">Extension:</div> 		
					<div><?= $person['Person']['extension'] ?></div>
				</div>
				<div class="detailItem mobile">
					<div class="label">Mobile:</div> 		
					<div><?= $person['Person']['mobile'] ?></div>
				</div>
				<div class="detailItem initials">
					<div class="label">Initials:</div> 	
					<div><?= $person['Person']['initials'] ?></div>
				</div>
				<div class="detailItem pa">
					<div class="label">PA:</div> 				
					<div><?= $person['Person']['pa'] ?></div>
				</div>
				
				<div class="shortDesc"><?= $person['Person']['shortDesc'] ?></div>
				<a href="/people/view/<?= $person['Person']['id'] ?>" class="viewProfileLink">View profile</a>
			</div>
		</div>
	<? } ?>
	
	<? if (count($people) == 0) { // If no staff members are found (perhaps an invalid category?) ?>
		<p>We currently do not have any '<?= $this->params['category'] ?>' profiles available for you to view.</p>
	<? } ?>
	
	<?//= $this->Paginator->counter(); ?>
	<?//= $this->Paginator->prev('« Previous', null, ' ', array('class' => 'disabled')); ?>
	<?//= $this->Paginator->numbers(); ?>
	<?//= $this->Paginator->next('Next »', null, ' ', array('class' => 'disabled')); ?>
	
</div>

<script type="text/javascript">
	$('#department').change(function(){
		location.href = '/staff/people/' + this.value;
	});
</script>