<h1>PACKAGES</h1>

<!--
<div>
<?php foreach($package_categories as $package_category){ ?>
	<div>
		<a href="<?=url($package_category)?>"><?php echo $package_category['PackageCategory']['title']; ?></a>
		<ul>
			<?php foreach ($package_category['Package'] as $package) { ?>
				<li><?= $package['title'] ?> <?= $this->Html->link('More...', array('controller' => 'packages', 'action' => 'view', $package['id'])) ?></li>
			<?php } ?>
		</ul>
	</div>
<?php } ?>
</div>
-->


<div class="accordion">
    <?php foreach($package_categories as $package_category){ ?>
    <h3><a href="<?=url($package_category)?>"><?php echo $package_category['PackageCategory']['title']; ?></a></h3>
    <div>
        <ul>
        <?php foreach ($package_category['Package'] as $package) { ?>
	<li><?= $package['title'] ?> <?= $this->Html->link('More...', array('controller' => 'packages', 'action' => 'view', $package['id'])) ?></li>
	<?php } ?>
        </ul>
    </div>   
    <?php } ?>
</div>







<script>
$(".accordion").accordion();
</script>

</style>
</style>
