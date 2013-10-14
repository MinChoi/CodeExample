<?php
$arr_packages = array(
					'Premium'=>array(
						array(	'id'=>'p01',
								'name'=>'Legends',
								'url'=>"/packages/premium-members/10"
						),										
						array(	'id'=>'p02',
								'name'=>'Trident',
								'url'=>"/packages/premium-members/10"
						),										
						array(	'id'=>'p03',
								'name'=>'Redlegs',
								'url'=>"/packages/premium-members/10"
						)),
					'Reserved Seats'=>array(
						array(	'id'=>'p04',
								'name'=>'Demon Seats',
								'url'=>"/packages/reserved-seat/18"
						)),
					'Red and Blue'=>array(
						array(	'id'=>'p05',
								'name'=>'Red & Blue',
								'url_ticket' => 'https://oss.ticketmaster.com/aps/melbournefc/EN/buy/browse',
								'url'=>"/packages/premium-members/19"
						),										
						array(	'id'=>'p06',
								'name'=>'Country Interstate 5',
								'url_ticket' => 'https://oss.ticketmaster.com/aps/melbournefc/EN/buy/browse',
								'url'=>"/packages/premium-members/21"
						),										
						array(	'id'=>'p07',
								'name'=>'Adult 3 Game',
								'url_ticket' => 'https://oss.ticketmaster.com/aps/melbournefc/EN/buy/browse',
								'url'=>"/packages/premium-members/19"
						)),
					'MCC member'=>array(
						array(	'id'=>'p08',
								'name'=>'MFC/MCC Premium',
								'url_ticket' => 'https://oss.ticketmaster.com/aps/melbournefc/EN/buy/details/12GHMCC',
								'url'=>"/packages/mcc-members/20"
						)),
					'Juniors'=>array(
						array(	'id'=>'p09',
								'name'=>'Youth',
								'url_ticket' => 'https://oss.ticketmaster.com/aps/melbournefc/EN/buy/details/12GHA',
								'url'=>"/packages/junior/24"
						),										
						array(	'id'=>'p10',
								'name'=>'Youth Demons (3-15)',
								'url_ticket' => 'https://oss.ticketmaster.com/aps/melbournefc/EN/buy/details/12GHA',
								'url'=>"/packages/junior/24"
						),										
						array(	'id'=>'p11',
								'name'=>'Little Devils (0-2)',
								'url_ticket' => 'https://oss.ticketmaster.com/aps/melbournefc/EN/buy/details/12GHA',
								'url'=>"/packages/junior/24"
						)),
					);
$arr_items = array(
					"i01"=>"Guaranteed opportunity to purchase a Grand Final Ticket if Melbourne is participating",
					"i02"=>"Access to two private function rooms with the ability to watch the game behind glass, purchase meals and listen to guest speakers including directors and players plus access to purchase guest passes for friends and family to MCG home games",
					"i03"=>"An invitation for you and a guest to attend the President's Function at a designated home game and a pass to the change rooms at one game",
					"i04"=>"Invitation to a free Premium Members' social function with players and coaches during the season and Team Ins and Outs via SMS each Thursday afternoon",
					"i05"=>"Entry to 11 MFC home games and free Young Demons membership for a nominee of your choice (under 15)",
					"i06"=>"Entry and Premium Reserved seating on Level 2 of the Olympic stand to all home games and general admission entry to all away games at the MCG and Etihad",
					"i07"=>"Entry and Premium Reserved seating on Level 2 of the Olympic stand (Trident only) or Southern Stand to all home games (15 game members also recieve general admission entry to all away games at the MCG and Etihad)",
					"i08"=>"Entry and Prime Reserved Seating to all home MCG games (15 game members also receive general admission entry to all away games at the MCG and Etihad)",
					"i09"=>"General Admission entry into all home games in Melbourne (15 game members also receive general admission entry to all away games at the MCG and Etihad) Subject to Capacity",
					"i10"=>"General Admission entry to all games in Melbourne (both at the MCG and Etihad)",
					"i11"=>"General Admission into any 5 home games",
					"i12"=>"General Admission into any 3 home games",
					"i13"=>"Entry and Reserve seating to 1 game in your home state (if outside of Victoria). Subject to ticket availability and fixture.",
					"i14"=>"Invitation to a junior clinic during the school holidays",
					"i15"=>"Quality merchandise pack including back pack, scarf, flashing horns, stickers and tattoos, plus beanie, drink bottle, and key ring for 11-15 year olds or tackle buddy, face paint and mouse mat for 3-10 year olds.",
					"i16"=>"Mini scarf, mini beanie and bib plus stickers and tattoos",
					"i17"=>"Team selection football field and keyring"
					);					
?>
<script>
//Items for each package
var items = {
				'p01':'#i01, #i02, #i03, #i04, #i06',
				'p02':'#i01, #i02, #i04, #i07',
				'p03':'#i01, #i02, #i07',
				'p04':'#i08',
				'p05':'#i09',
				'p06':'#i11, #i13',
				'p07':'#i12',
				'p08':'#i02, #i04, #i05',
				'p09':'#i10, #i14, #i15',
				'p10':'#i10, #i16',
				'p11':'#i09, #i14, #i17'
			};
</script>
<link rel="stylesheet" href="/CORE/afl/css/compare-packages.css"/>
<script type="text/javascript" src="/CORE/afl/js/compare-packages.js"></script>
<h1>Compare Packages</h1>
<div id="compare_packages">
	<div class="col1">
<?php
	foreach($arr_packages as $c=>$ps){
		echo '<h2>'.$c.'</h2><ul>';
		foreach($ps as $p){
			echo '<li class="cls_package" id="'.$p['id'].'">';
			echo '<a href="'.$p['url'].'" class="compare_view">View</a>';
			if(isset($p['url_ticket']))
				echo '/ <a href="'.$p['url_ticket'].'" target="_blank" class="compare_buy">Join</a>';
			echo '<span>'.$p['name'].'</span>';
		}
		echo '</ul>';		
	}
?>		
    </div>
    <div class="col2">
    <h2>USE THIS PACKAGE COMPARISON SELECTOR TO HELP YOU CHOOSE</h2>
    <ul>
<?php
	foreach($arr_items as $id=>$i){
		echo '<li class="cls_item" id="'.$id.'">'.$i.'</li>';
	}
?>
	</ul>
    </div>
    <br class="clear">
</div>