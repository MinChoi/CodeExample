<div class="content">

	<h1>Packages</h1>

	<?php foreach($package_categories as $package_category){ ?>
	
		<div class="package">
				
			<a class="btn btn-inverse" onclick="return false" href="#"> + View details</a>

			<?php 
				if ($package_category['PackageCategory']['file_attach']) 
					echo $this->Html->image('/thumb/120x80/crop'.$package_category['PackageCategory']['file_attach']); 
			?>

			<h3><?php echo $package_category['PackageCategory']['title']; ?></h3>
			<p><?php echo $package_category['PackageCategory']['content']; ?></p>

			<ul>
				<?php foreach ($package_category['Package'] as $package) { ?>
				<li><?= $this->Html->link($package['title'], array('controller' => 'packages', 'action' => 'view', $package['id'])) ?></li>
				<?php } ?>
			</ul>
					
			<div class="clearfix"></div>
			   
		</div>
		
	<?php } ?>

</div>

<script type="text/javascript">

	// Document ready
	$(document).ready(function() {
	
		$('div.package ul').hide(); 
		
		$('div.package a.btn').click(function() { 
			var $this = $(this);
			if (!$this.parent().hasClass('active')) {	// show list of packages
				$this.parent().addClass('active');
				$this.siblings('ul').show('slow');
				$this.html(' - Hide details'); 
			} else { 									// hide list of packages
				$this.parent('div').removeClass('active');
				$this.siblings('ul').hide('slow');
				$this.html(' + View details');
			}			
		});
		
	}); 

</script>