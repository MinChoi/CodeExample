<? 
$this->set('masthead_content', '
	<div class="image">
		<div id="slideshow">
			<img src="/themes/default/images/main_box_2.jpg" alt="" width="960" height="300"/>
			<img src="/themes/default/images/main_box_3.jpg" alt="" width="960" height="300"/>
			<img src="/themes/default/images/main_box_4.jpg" alt="" width="960" height="300"/>
		</div>
		<div class="leftText">Welcome to Madgwicks</div>
	</div>
')

// someone();
?>
		
	
		<div class="homepageCol first">
			<h2>The Latest</h2>
			<table class="tabList">
				<tr>
					<td><a href="#" class="active"><span>News</span></a></td>
					<td><a href="#"><span>Alerts</span></a></td>
					<td class="last"><a href="#"><span>Events</span></a></td>
				</tr>
			</table>
			
			<?/*// News section, shown by default ?>
			<div class="news">
				<? 
				foreach ($news as $n) { // Loop through the news 
					echo $this->element('frontend/news_item_summary', array('item' => $n['News']));
				}
				?>
			</div>
			
			<?// Alerts section, shown when tab is clicked ?>
			<div class="alerts" style="display:none">
				<? 
				foreach ($alerts as $a) { // Loop through the news 
					echo $this->element('frontend/news_item_summary', array('item' => $a['News']));
				}
				?>
			</div>
			
			<?// Events section, shown when tab is clicked ?>
			<div class="events" style="display:none">
				<? 
				foreach ($events as $e) { 
					$e = $e['Event']; 
					$url = url($e, 'Event'); 
					?>
					
					<div class="newsItem">
						<? if($e['image']) { ?>
							<div class="image"><img src="<?= $e['image'] ?>" alt="<?= $e['title'] ?>"/></div>
						<? } else { ?>
							<div class="image"><img src="/themes/default/images/placeholder.jpg" alt=""/></div>
						<? } ?>
						<div class="text">
							<div class="title"><a href="<?= $url ?>"><?= $e['title'] ?></a></div>
							<div class="date"><?= human_date($e['start_date']) ?><?= $e['end_date'] ? ' - ' . human_date($e['end_date']) : '' ?></div>
							<div class="shortDesc"><?= nl2br($e['short_desc']) ?></div>
							<a href="<?= $url ?>" class="blueButton arrow"><span>More</span></a>
						</div>
						<br clear="all">
					</div>
					
				<? } if (!count($events)) { // if no more future events ?>
					<li>Check back soon for upcoming events.</li>
				<? } ?>
			</div>
			<?*/?>
			
			
		</div>
		
		<?// Center column "Focus On" ?>
		<div class="homepageCol">
			<h2><?= $home['focus_on_title'] ?></h2>
			<div class="tab"><span><?= $home['focus_on_subtitle'] ?></span></div>
			<div class="image"><a href="#"><img src="<?= $home['focus_on_image'] ?>" alt=""/></a></div>
			<div class="text">
				<?= html_entity_decode($home['focus_on_text']) ?>
				<?//<a href="#" class="blueButton arrow"><span>Areas of Practice</span></a>?>
			</div>
		</div>
		<div class="homepageCol last">
			<h2><?= $home['presentation_title'] ?></h2>
			<div class="tab"><span><?= $home['presentation_subtitle'] ?></span></div>
			<div class="image"><a href="#"><img src="<?= $home['presentation_image'] ?>" alt=""/></a></div>
			<div class="text">
				<?= html_entity_decode($home['presentation_text']) ?>
				<?//<a href="#" class="blueButton arrow"><span>View Presentation</span></a>?>
			</div>
		</div>
		
		
		<script type="text/javascript">
			// Simple Tab Plugin: "Simple Chooser"
			// by Simon East, Surface Digital 2011
			// Use it on a series of links to show the respective element, hiding all others
			// Link index 0 shows item 0, index 1 shows item 1, etc.
			// Version 3.0
			// eg. $(5itemsAsLinks).simpleChooser(another5itemsToShowHide);
			$.fn.simpleChooser = function(itemsToShowHide){
				var links = this;
				return this.click(function(e){
					links.removeClass('active');
					$(this).addClass('active');						
					// Show new div & hide all others
					var divToShow = itemsToShowHide.eq(links.index(this)).show()	//.fadeIn(300);
					itemsToShowHide.not(divToShow).hide();
					e.preventDefault();
				});	
			};
			
			//---- jQuery plugin to cycle chunks of content using next/prev buttons ------
			// (these should have the classes "next" and "prev")
			$.fn.clickCycle = function(contentSelector) {
				// this.parent().
				this.each(function(){
					var parent = $(this),
						items = parent.find(contentSelector);
					
					if (items.length < 2) return;		// don't do anthing if there's less than 2 items (cycle is unnecessary)
					
					function clickFunction(event) {
						event.preventDefault();
						var currentItem = items.filter(':visible'),
							currentIndex = items.index(currentItem);
						newIndex = currentIndex + event.data;
						if (newIndex >= items.length) newIndex = 0;				// loop back to zero if at end
						else if (newIndex == -1) newIndex = items.length - 1;	// loop back to end if at zero
						items.eq(newIndex).show();	// loop around
						currentItem.hide();
					}
					
					var	prevButton = $('<a href="#" class="prev">&lt;</a>').on('click', -1, clickFunction),
						nextButton = $('<a href="#" class="next">&gt;</a>').on('click', 1, clickFunction);
					
					parent
						.append( $('<div class="nextPrev"></div>').append(prevButton).append(nextButton) )
						.find(contentSelector).not(':eq(0)').hide();

				});
				return this;
			} // end of plugin --------

			
			$(document).ready(function(){
				$('#slideshow').cycle();
				$('.news, .alerts, .events').clickCycle('.newsItem');
				$('.tabList a').simpleChooser(
					$('.homepageCol').eq(0).find('.news,.alerts,.events')
				);
			});	
		</script>