<?php
$arr_packages = array(
					'Reserved Seat'=>array(
						array(	'id'=>'p01',
								'name'=>'High Mark',
								'url'=>'/packages/view/43'
						),										
						array(	'id'=>'p02',
								'name'=>'Silver',
								'url'=>'/packages/view/111'
						),										
						array(	'id'=>'p03',
								'name'=>'Bronze Premium',
								'url'=>'/packages/view/112'
						),										
						array(	'id'=>'p04',
								'name'=>'Bronze Basic',
								'url'=> '/packages/view/113'
						)),
					'Flexi Access' => array(
						array(	'id'=>'p05',
							'name'=>'Flexi 11 Game',
							'url'=>"/packages/view/116"
						),						
						array(	'id'=>'p06',
							'name'=>'Flexi 3 Game',
							'url'=>"/packages/view/117"
						)),
					'National' => array(
						array(	'id'=>'p07',
							'name'=>'National 3 Game',
							'url'=>"/packages/view/118"
						)),
					'Non Access' => array(
						array(	'id'=>'p08',
							'name'=>'Beyond the Boundary Premium',
							'url'=>"/packages/view/120"
						),
						array(	'id'=>'p10',
							'name'=>'Beyond the Boundary Basic',
							'url'=>"/packages/view/121"
						)),
					'Junior' => array(
						array(	'id'=>'p11',
							'name'=>'Squadron',
							'url'=>"/packages/view/122"
						),
						array(	'id'=>'p12',
							'name'=>'Skeeta Fleet',
							'url'=>"/packages/view/123"
						),
						array(	'id'=>'p13',
							'name'=>'Baby Bomber',
							'url'=>"/packages/view/124"
						)),										
					'Cheersquad' => array(
						array(	'id'=>'p14',
							'name'=>'Cheersquad',
							'url'=>"/packages/view/125"
						),										
						array(	'id'=>'p15',
							'name'=>'Pet Membership',
							'url'=>"/packages/view/126"
						))				
					);
					
$arr_items = array(
					"i01"=>"Grand Final access - guaranteed opportunity to purchase a Grand Final ticket when Essendon is participating",
					"i02"=>"Access to Grand Final member ticket ballot when Essendon is participating ",
					"i03"=>"Priority access to finals tickets in weeks 1-3 when Essendon is participating",
					"i04"=>"Best seats we have - ground and mid levels wing",
					"i05"=>"Standard seats - top level or behind the goals",
					"i06"=>"Flexible access - choose 3 Essendon home games that suit you (excludes ANZAC Day)",
					"i07"=>"Flexible seating - freedom to sit where you want, with who you want",
					"i08"=>"ANZAC Day - access to member presale and prices",
					"i09"=>"ANZAC Day - guaranteed entry and reserved seat",
					"i10"=>"Reserved seat for one Essendon game played in your home state (WA, NSW, or SA)",
					"i11"=>"Close to the action - sit behind the goals plus your chance to hold the team banner on game day",
					"i12"=>"Exclusive access to a members only function room at both Etihad Stadium and MCG",
					"i13"=>"Invitation to exclusive member only inner sanctum event",
					"i14"=>"Member discount for junior clinic during the school holidays",
					"i15"=>"Member pack including 2013 member scarf",
					"i16"=>"Junior member pack including mini Sherrin football, drawstring bag, 2013 scarf and sticker pack",
					"i17"=>"Skeeta embroidered beanie and scarf set",
					"i18"=>"Skeeta embroidered hooded baby blanket",
					"i19"=>"2013 Pet Bomber fence sign",
					"i20"=>"Personalised birthday card "
					);					
?>
<script>
//Items for each package
var items = {
				'p01':'#i01, #i03, #i04, #i09, #i12, #i13, #i15',
				'p02':'#i01, #i03, #i04, #i09, #i12, #i15',
				'p03':'#i02, #i03, #i05, #i09, #i15', 
				'p04':'#i02, #i03, #i05, #i08, #i15',
				'p05':'#i02, #i03, #i07, #i08, #i15',
				'p06':'#i02, #i03, #i06, #i15',
				'p07':'#i02, #i03, #i10, #i15',
				'p08':'#i02, #i03, #i15',
				'p10':'#i03',
				'p11':'#i03, #i08, #i14, #i15, #i16, #i20',
				'p12':'#i17, #i20',
				'p13':'#i18',
				'p14':'#i11',
				'p15':'#i19'
			};
</script>

<script type="text/javascript" src="/CORE/afl/js/compare-packages.js"></script>

	<div class="span12">
		<h1>Compare Packages</h1>
	</div>
	
	<div class="span3">
	
		<h5>Hover over a Package to reveal its benefits</h5>
	 
		<? foreach ($arr_packages as $category => $packages) { ?>
			<h2><?= $category ?></h2>
			<ul>
			<? foreach ($packages as $p) { ?>
				<li class="cls_package" id="<?= $p['id'] ?>">
					<a href="<?= $p['url'] ?>" class="compare_view">View</a>
					<span class="divider">|</span>
					<span class="packageName"><?= $p['name'] ?></span>
				</li>
			<? } ?>
			</ul>
		<? } ?>
		
	</div>
	
	<div class="span8">
	
	    <h5>Hover over a package or benefit to see which packages contain that benefit</h5>
	    <ul>
			<?php
			foreach($arr_items as $id=>$i){
				echo '<li class="cls_item" id="'.$id.'">'.$i.'</li>';
			}
			?>
		</ul>
	
	</div>