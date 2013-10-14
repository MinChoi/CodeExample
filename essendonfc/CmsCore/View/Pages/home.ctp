
<p>This is an empty homepage. You might like to configure /app/View/Pages/home.ctp to include:</p>

<ul>
	<li>Static HTML content/images/scripts</li>
	<li>Dynamic content set in admin area (perhaps under the "homepage" tab)</li>
	<li>Lists of dynamic content such as latest news, upcoming events etc.</li>
</ul>

<p>Dynamic content will need to be set inside PagesController->home()</p>

<h2>Example Image Carousel</h2>

	<div id="slides">
		<div class="slides_container">
			<div><img src="http://flickholdr.com/450/150/Melbourne/1"></div>
			<div><img src="http://flickholdr.com/450/150/Melbourne/2"></div>
			<div><img src="http://flickholdr.com/450/150/Melbourne/3"></div>
		</div>
	</div>
	<style type="text/css" media="screen">
		.slides_container, .slides_container div {
			width:350px;
			height:150px;
			display:block;
		}		
	</style>
	<script type="text/javascript">
		// See http://slidesjs.com/ for more instructions
		$(function(){
			$('#slides').slides({
				generateNextPrev: false,
				play: 5000,
				pause: 5000,
				hoverPause: true,
				effect: 'fade',
				fadeSpeed: 500
		   });
		});
	</script>
   
<h2>Example Lightbox</h2>

	<!-- Simply use the class 'lightbox' or 'fancybox' to use it, as long as init script is in layout -->
	<a class="lightbox" href="/themes/default/images/placeholder.jpg">Click this Link</a>
	

<div class="news">
	<h2>Latest News</h2>
	<?= $this->element('frontend/get_new_news') ?>
</div>
