<header>
	<h3>Projects</h3>
	<a href="/clients/add" class="button button-success">Add new</a>
</header>

<?php foreach ($clients as $client): ?>
	<div class='client'>
		<a href="/clients/view/<?php echo $client['Client']['id']; ?>"><?php echo $client['Client']['name']; ?></a>
	</div>
<?php endforeach; ?>
