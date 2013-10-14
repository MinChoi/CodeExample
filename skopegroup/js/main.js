;(function($) {
    "use strict";
	
	var $navigation = $('.navigation');
	if ($navigation.length) {

		var $menu = $navigation.find('.menu-container');
		var $toggle = $('.navigation-toggle');

		$toggle.on('click', function() {
			if ($menu.is(':visible')) {
				$menu.removeClass('navigation-open');
				$toggle.removeClass('toggle-open');
			} else {
				$menu.addClass('navigation-open');
				$toggle.addClass('toggle-open');
			}
		});
	}	
	
	// If page is our-work, add class to related menu item
	var $is_our_work = $('.our-work-archive, .single-our-work');
	if ($is_our_work.length) {
		$('.menu-item-18').addClass('current-menu-item');
	}
	
}(jQuery));

$.fn.cycle.defaults.autoSelector = '.slideshow';

// Archive single page
$(".slide-main-pic").hover(function() {					
	$(".prop-pic-prev").stop().fadeIn('fast');
}, function() {
	$(".prop-pic-prev").stop().fadeOut('fast');
});

// Archive landing page
$(".our-work-tile").on('mouseenter', function() {
	var $this = $(this);

	$(".our-work-tile .tile").each(function(){
		var $ele = $(this);
		if ($this.attr('contain-img') === $ele.attr('contain-img')) {
			$(this).addClass("fadeOut");
			$(this).removeClass("fadeIn");
		} else {
			$(this).addClass("fadeIn");
			$(this).removeClass("fadeOut");
		}
	});
	setHover();
});
$(".our-work-tile").on('mouseleave', function() {
	$(".our-work-tile .tile").each(function(){
		$(this).addClass("fadeOut");
		$(this).removeClass("fadeIn");
	});
	setHover();
});

// Homepage
$(".scope-img").on('mouseenter', function() {
	//$(this).children('.tile-hover').fadeIn('fast');
	//$(this).children('.fill').animate( {margin: '90%'}, 150, function(){});
	
});
$(".scope-img").on('mouseleave', function() {

});

    

function setHover() {
	$(".fadeIn").each(function(){
		$(this).stop(true, true).fadeIn('fast');						
	});
	$(".fadeOut").each(function(){
		$(this).delay(100).fadeOut('fast');						
	});
}

$(".sidebar a").hover(function() {					
	$(this).parent().addClass('hover');
}, function() {
	$(this).parent().removeClass('hover');
});
