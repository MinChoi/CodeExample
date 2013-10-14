
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="clearfix">
		<div class="row">
			<div class="large-12 column page-title">
				<?php //echo do_shortcode('[google-map-v3 width="100%" height="287" zoom="12" maptype="roadmap" mapalign="center" directionhint="false" language="default" poweredby="false" maptypecontrol="true" pancontrol="true" zoomcontrol="true" scalecontrol="true" streetviewcontrol="true" scrollwheelcontrol="false" draggable="true" tiltfourtyfive="false" addmarkermashupbubble="false" addmarkermashupbubble="false" addmarkerlist="Unit 17/8 Victoria Ave Castle Hill{}1-default.png{}Skope Group" bubbleautopan="true" showbike="false" showtraffic="false" showpanoramio="false"]'); ?>
				<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com.au/maps?sll=-33.73096375369022,150.9796546748615&amp;sspn=0.019326266756332557,0.033194905785136515&amp;t=m&amp;q=17%2F8+Victoria+Ave,+Castle+Hill+NSW+2154&amp;dg=opt&amp;ie=UTF8&amp;hq=&amp;hnear=17%2F8+Victoria+Ave,+Castle+Hill+New+South+Wales+2154&amp;ll=-33.721984,150.983133&amp;spn=0.024986,0.036478&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
		</div>
	</header>
	
	<section class="contact-detail">
		<div class="row clearfix">
			<div class="large-3 column">
				<?php echo $back; ?>
			</div>
			<div class="large-6 column left">
				<h3>Contact</h3>
				<?php the_content(); ?>
			</div>
			<div class="large-3 column">
				<h4>Visit us</h4>
				<p>Unit 17/8 Victoria Avenue<br>Castle Hill NSW 2154</p>
				<h4>Contact us</h4>
				<p>P 02 8677 5425<br>
				E <a class="contact-mail" href="mailto:info@skopegroup.com.au">info@skopegroup.com.au</a>
				</p>
				<h4>Write to us</h4>
				<p>PO Box 5071<br>Old Toongabbie NSW 2146</p>
			</div>

		</div>
	</section>

	<footer></footer>

</article>
