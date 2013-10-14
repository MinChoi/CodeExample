<?php $this->append('meta'); ?>
    <!-- Facebook Meta start -->
    <meta property="og:title" content="<?= $package['Package']['title'] ?>" /><!-- Get Title of page -->
    <meta property="og:type" content="product" />
    <meta property="og:url" content="<?= Router::url('', true) ?>" /><!-- Get url of page -->
    <meta property="og:image" content="<?= !empty($package['PackageCategory']['file_attach']) ? Router::url($package['PackageCategory']['file_attach'], true) : 'http://surfacedigital.com.au/themes/default/images/fb_icon.jpg'; ?>" /><!-- Get image of page - backend editable -->
    <meta property="og:site_name" content="<?= $clubName ?>" />
    <meta property="og:description" content="<?= strip_tags($package['Package']['content']) ?>" /><!-- Get Description of page - backend editable -->
    <meta property="fb:admins" content="<?= $fb_admin ?>" /><!-- Get admin of fb page - backend editable -->
    <!-- Facebook Meta end -->

    <!-- Google+ Meta start -->
    <meta itemprop="name" content="<?= $package['Package']['title'] ?>"><!-- Get Title of page -->
    <meta itemprop="description" content="<?= strip_tags($package['Package']['content']) ?>"><!-- Get image of page - backend editable -->
    <meta itemprop="image" content="<?= !empty($package['PackageCategory']['file_attach']) ? $package['PackageCategory']['file_attach'] : 'http://surfacedigital.com.au/themes/default/images/fb_icon.jpg'; ?>"><!-- Get image of page - backend editable -->
    <!-- Google+ Meta end -->   
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
	if ($package['Package']['image']) 
		echo $this->Html->image('/thumb/80x80/crop'.$package['Package']['image']); 
?>
<h2><?= $package['Package']['title'] ?></h2>
<div>
	<div><?= $package['Package']['content'] ?></div>
	<?php if ($package['Package']['ticketing_url']) { ?>
		<div>	
			<?= $this->Html->link('Buy Now', $package['Package']['ticketing_url']); ?>
		</div>
	<?php } ?>
	<table>
		<tr>
			<th></th>
			<th>Per Month</th>
			<th>Total</th>
			<th></th>
		</tr>
		<?php foreach ($package['PackagePricing'] as $pricing) { ?>
			<tr>
				<td><?= $pricing['name'] ?></td>
				<td><?= $pricing['per_month'] ?></td>
				<td><?= $pricing['total'] ?></td>
				<?php if ($pricing['url']) { ?>
					<td><a href="<?= $pricing['url'] ?>" target="_blank" onclick="_gaq && _gaq.push(['_trackPageview', '<?= $this->here ?>/BUY/<?= addslashes($pricing['name']) ?>'])">Buy</a></td>
				<?php } ?>
			</tr>
		<?php } ?>
	</table>
	
	<?php if (!empty($related_packages)) { ?>
		<h3>Other packages in <?= $package['PackageCategory']['title'] ?> category</h3>
		<ul>
			<?php foreach ($related_packages as $package) { ?>
				<li><?= $package['Package']['title'] ?> <?= $this->Html->link('More...', array('controller' => 'packages', 'action' => 'view', $package['Package']['id'])) ?></li>
			<?php } ?>
		</ul>
	<?php } ?>
                
                <div class="facebook">
                    <!-- data-href php url of page -->
                    <div class="fb-like" data-href="http://www.surfacedigital.com" data-send="false" data-width="450" data-show-faces="false"></div>
                </div>
                
                <div class="twitter">
                    <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
                
                <div class="google-plus">
                    <div class="g-plusone" data-annotation="inline" data-width="300"></div>
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