<?php $this->append('meta'); ?>

    <!-- Facebook Meta start -->
    <meta property="og:title" content="<?= $package['Package']['title'] ?>" /><!-- Get Title of page -->
    <meta property="og:type" content="product" />
    <meta property="og:url" content="<?= Router::url('', true) ?>" /><!-- Get url of page -->
    <meta property="og:image" content="<?= !empty($package['PackageCategory']['file_attach']) ? Router::url($package['PackageCategory']['file_attach'], true) : 'http://surfacedigital.com.au/themes/default/images/fb_icon.jpg'; ?>" /><!-- Get image of page - backend editable -->
    <meta property="og:site_name" content="<?= $clubName ?>" />
    <meta property="og:description" content="<?= strip_tags($package['Package']['short_desc']) ?>" /><!-- Get Description of page - backend editable -->
    <meta property="fb:admins" content="<?= $fb_admin ?>" /><!-- Get admin of fb page - backend editable -->
    <!-- Facebook Meta end -->

    <!-- Google+ Meta start -->
    <meta itemprop="name" content="<?= $package['Package']['title'] ?>"><!-- Get Title of page -->
    <meta itemprop="description" content="<?= strip_tags($package['Package']['short_desc']) ?>"><!-- Get image of page - backend editable -->
    <meta itemprop="image" content="<?= !empty($package['PackageCategory']['file_attach']) ? $package['PackageCategory']['file_attach'] : 'http://surfacedigital.com.au/themes/default/images/fb_icon.jpg'; ?>"><!-- Get image of page - backend editable -->
    <!-- Google+ Meta end -->   
    
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "09b4b210-c3f9-478f-90e6-deb9ca66bc60"}); </script>

<?php $this->end(); ?>






<!-- Facebook init start -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Facebook init end -->
	
<?php
	
	if (!empty($package['Package']['ticketing_url'])) {
		$ticketing_url = $package['Package']['ticketing_url'];
	}
	
?>

<div class="content">

		<h1>2013 Packages</h1>
		
		<div class="infobox">
			<?= isset($ticketing_url) 
				? $this->Html->link('Buy', $ticketing_url, array(
					'class' => 'btn btn-danger', 
					'target' => '_blank',
					'onclick' => "_gaq && _gaq.push(['_trackPageview', '" . $this->here . "/BUY'])"))
				: '' ?>
			
			<?php 
				if ($package['Package']['image']) 
					echo $this->Html->image('/thumb/80x80/crop'.$package['Package']['image']); 
			?>
			<h2><?=$package['Package']['title']?></h2>
			
			<span class='st_facebook_hcount' displayText='Facebook' st_title='<?= $package['Package']['title'] ?>'></span>
			<span class='st_twitter_hcount' displayText='Tweet'></span>&nbsp;&nbsp;&nbsp;
			<span class='st_googleplus_hcount' displayText='Google +'></span>
			<span class='st_email_hcount' displayText='Email' st_title='<?= $package['Package']['title'] ?>'></span>
		
		</div>
		
		
		<div class="package-contents">
		
			<?= $package['Package']['content'] ?>
			
			<table class="pricing" cellpadding="5" cellspacing="0">
				<thead>
				<tr>
					<th></th>
					<th></th>
					<th>Per Month</th>
					<th>Total</th>
					<th></th>
				</tr>
				</thead>
				
				<tbody>
				
				<?php $oldgroup = '';  ?>
				<?php foreach ($package['PackagePricing'] as $pricing) { 
				
					// I am aware of the crude nature of this - but Leah wants it done quickly, 
					// so please don't judge me... - daniel (Oct'12)

					$name = explode(' ', $pricing['name']); 
					
					$words = 0; 
					
					for ($i = 0; $i < count($name); $i ++) {
						if (strtoupper($name[$i]) != $name[$i]) {
							$words = $i; 
							break;
						}
					}
					
					$newgroup = ''; 
					for ($i = 0; $i < $words; $i ++) 
						$newgroup .= $name[$i] . ' '; 
					$newgroup = substr($newgroup, 0, -1); 
					
					if ($newgroup != $oldgroup) {
						$oldgroup = $newgroup; 
						$display = $newgroup; 
					} else $display = ''; 
					
					$pricing['name'] = str_replace($newgroup, '', $pricing['name']); 
					
					if (substr($display, -1) == '-') $display = substr($display, 0, -1); 
					
				?>
					<tr>
						<td class="col0">&nbsp;<?= $display ?></td>
						<td class="col1"><?= $pricing['name'] ?></td>
						<td class="col2"><?= $pricing['per_month'] ?></td>
						<td class="col3"><?= $pricing['total'] ?></td>
						<td class="col4"><?= !empty($pricing['url']) 
							? $this->Html->link('Buy', $pricing['url'], array(
								'class' => 'btn btn-danger-small', 
								'target' => '_blank',
								'onclick' => "_gaq && _gaq.push(['_trackPageview', '" . $this->here . "/Buy/" . addslashes($package['Package']['title']) . '/' . addslashes($pricing['name']) . "'])")) 
							: '' ?></td>
					</tr>
				<?php } ?>
				</tbody>
				
			</table>
			
			<?= isset($ticketing_url) 
				? $this->Html->link('Buy', $ticketing_url, array(
					'class' => 'btn btn-danger', 
					'target' => '_blank',
					'onclick' => "_gaq && _gaq.push(['_trackPageview', '" . $this->here . "/Buy/" . addslashes($package['Package']['title']) . "'])")) 
				: '' ?>

			<?php if (!empty($related_packages)) { ?>
				
				<h2 class="other">Other packages in this category</h2>
				
				<div class="greybox">
				<h3><?= $package['PackageCategory']['title'] ?></h3>
				<ul>
					<?php foreach ($related_packages as $package) { ?>
						<li> <?= $this->Html->link($package['Package']['title'], array('controller' => 'packages', 'action' => 'view', $package['Package']['id'])) ?></li>
					<?php } ?>
				</ul>
				
				</div>
				
			<?php } ?>
			
			<br />
			<a href="/2013-packages" class="btn btn-inverse">Back to packages</a>
			
		</div>
	</div>

<!-- Google+ init start -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<!-- Google+ init end -->
