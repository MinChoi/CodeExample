<div clsss="page-title">TASMANIAN PACKAGES PAGE</div>
<div id="packages">
<img src="/themes/default/images/img_packages.jpg" class="image"/>
<?php
	foreach($packages as $package){
?>
<table border="0" cellpadding="0" cellspacing="0">

	<thead>
    	<td class="title head"><?php echo $package['Package']['title'];?></td>
        <td width='12%' class="head">Total</td>
        <td width='17%' class="head">Hawks Direct*</td>
        <td width='23%' class="head"></td>
        <td width='10%' class="head"></td>
    </thead>
<?php
		$package['PackagePricing'] = Set::sort($package['PackagePricing'], '{n}.id', 'asc');
		//var_dump($package['PackagePricing']);
		foreach($package['PackagePricing'] as $p_pricing){
?>		<tr>
	    	<td class="data title"><?php echo $p_pricing['name']?></td>
	        <td class="data">$<?php echo number_format ($p_pricing['price'], 2); ?></td>
	        <td class="data">$<?php echo number_format ($p_pricing['price']*0.1, 2); ?></td>
	        <td class="data"><a href="#" class="view_package">View Package Details</a></td>
	        <td class="data"><a href="<?php echo ((strtoupper(substr($p_pricing['url'], 0, 4))=='HTTP')?$p_pricing['url']:'http://'.$p_pricing['url']); ?>" target="_blank" class="btn_buy_now">Buy Now</a></td>
	    </tr>
<?php			
		}
?>
</table>
<div class="details">
    <div class="inner_col">
    	<?php echo $package['Package']['content'];?>
         <a href="#" class="btn_close">Close</a>
     </div>
     <br class="clear">
</div>

<p class="bottom_msg">*HawksDirect option divided by 10 months</p>
<?php		
	}
?>

</div>
