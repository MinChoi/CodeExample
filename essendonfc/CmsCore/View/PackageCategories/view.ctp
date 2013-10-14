	<p>Package Category</p>
	Title: <?=$category['PackageCategory']['title'] ?><br>
<?php
	foreach($packages as $pkg){
		echo 'Package Title: '.$pkg['Package']['title'].'<br>';
		echo 'Package Content: '.$pkg['Package']['content'].'<br>';
		echo 'Package pricings<br>';
		foreach($pkg['PackagePricing'] as $pkg_p) {
			echo 'Price: '.$pkg_p['name'].' / '.$pkg_p['price'].' / '.$pkg_p['url'].'<br>';
		}
		echo '---------------------------------------------------<br>';
	}
?>
<a href='/2013-packages'>Back to list</a>
