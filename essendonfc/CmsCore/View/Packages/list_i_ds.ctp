<!DOCTYPE html>
<html>
<head>
	<title>Package IDs</title>
	
	<?= $this->fetch('css') ?>
	<?= $this->Minify->css('/CORE/bootstrap/docs/assets/css/bootstrap.css') ?>
	
	<?//= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js') // Use Google CDN for jQuery ?>
	<?= $this->fetch('script') // default scripts block ?>
</head>
<body>
		
	<div class="container">
		<h1>List of Packages and their IDs</h1>
	
		<table class="table table-hover" style="width: auto">
			<tr>
				<th>Package</th>
				<th>ID</th>
				<th>Category</th>
			</tr>
			<? foreach ($packages as $p) { ?> 
				<tr>
					<td><?= $p['Package']['title'] ?></td>
					<td><?= $p['Package']['id'] ?></td>
					<td><?= $p['PackageCategory']['title'] ?></td>
				</tr>
			<? } ?> 
		</table>
	</div>
	
	<?= $this->fetch('scriptBottom') // extra block for after-page-load JS ?>	
</body>
</html>
