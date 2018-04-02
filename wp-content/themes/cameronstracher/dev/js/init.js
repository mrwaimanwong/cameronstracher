jQuery(document).ready(function($) {

	// Responsive Menu



	( function( window, $, undefined ) {
	'use strict';


	$( '.site-header nav' ).before( '<button class="menu-toggle" role="button" aria-pressed="false"><i id="bars" class="fa fa-bars"></i><i id="times" class="fa fa-times hide"></i></button>' ); // Add toggles to menus

	// Show/hide the navigation
	$( '.menu-toggle' ).on( 'click', function() {

		var $this = $( this );

		var $times = $('.menu-toggle #times');
		var $bars = $('.menu-toggle #bars');

			$times.toggleClass( 'hide' );
			$bars.toggleClass( 'hide' );

		// if (!$( this ).hasClass('fa fa-bars')){
    //   $this.find('svg').removeClass();
    //   $this.find('svg').addClass('fa fa-times');
    // } else {
    //   $this.find('svg').removeClass();
    //   $this.find('svg').addClass('fa fa-bars');
    // }
		$this.attr( 'aria-pressed', function( index, value ) {
			return 'false' === value ? 'true' : 'false';
			});

			$this.toggleClass( 'activated' );
			$this.next( '.site-header nav' ).slideToggle( 'fast' );

			});


	})( this, jQuery );


	(hideMenu = function () {

		$obj = $( '.site-header nav' );
		$btn = $('.menu-toggle');
		var $times = $('.menu-toggle #times');
		var $bars = $('.menu-toggle #bars');

		if($(window).width() < 601 ) // This should match break point in the CSS
		{
			$obj.hide();
			$btn.show();
			$times.addClass( 'hide' );
			$bars.removeClass( 'hide' );
		}

		else

		{
			$obj.show();
			$btn.hide();
		}

	})(); // Run instantly

	$(window).resize(hideMenu);

	$('.ww-card').flip();

	// When the user clicks on the button, scroll to the top of the document
$('#scroll-top-btn').on('click',function(e){
	e.preventDefault();//this will prevent the link trying to navigate to another page
  // document.body.scrollTop = 0; // For Chrome, Safari and Opera
  // document.documentElement.scrollTop = 0; // For IE and Firefox
	$('html, body').animate({
          scrollTop: 0
        }, 1000);
});

$('.genesis-nav-menu .menu-item-has-children > a').append(' <i class="fa fa-angle-down"></i>');

$(".site-header .header-vendors img").mouseover(function(e){
	$(this).addClass("current");
$(".site-header .header-vendors img").not(".current").addClass('notit');
});

$(".site-header .header-vendors img").mouseout(function(e){
	$(this).removeClass("current");
	$(".site-header .header-vendors img").removeClass('notit');
});


$(".footer-vendors img").mouseover(function(e){
	$(this).addClass("current");
$(".footer-vendors img").not(".current").addClass('notit');
});

$(".footer-vendors img").mouseout(function(e){
	$(this).removeClass("current");
	$(".footer-vendors img").removeClass('notit');
});

$(".footer-social a").mouseover(function(e){
	$(this).addClass("current");
$(".footer-social a").not(".current").addClass('notit');
});

$(".footer-social a").mouseout(function(e){
	$(this).removeClass("current");
	$(".footer-social a").removeClass('notit');
});







// $(".home .site-header .books a img").css("width", "80%");

$(".home .site-header .books a img").mouseover(function(e){
	// e.preventDefault();
	// alert(e.name + "It could be me that's changing...");
	$(this).addClass("current");
	// $(this).animate({width: "100%"}, 1000, "linear");
	// $(this).animateCss('pulse');

	// $(".home .site-header .books a img").not('.pulse').animateCss('fadeOut');
// 	$(".home .site-header .books a img").not(".current").animate({opacity: '.5'}, 200, "linear")
$(".home .site-header .books a img").not(".current").addClass('notit');
});

$(".home .site-header .books a img").mouseout(function(e){
	// e.preventDefault();
	// alert(e.name + "It could be me that's changing...");
	// $(this).addClass('animated zoomIn');
	// $(this).animate({width: "200px"}, 300, "linear");
	$(this).removeClass("current");
	// $(".home .site-header .books a img").animate({opacity: '1'}, 200, "linear")
	$(".home .site-header .books a img").removeClass('notit');
});


//Use animateCss to remove the animation immediately
// $.fn.extend({
// animateCss: function(animationName) {
// 	var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
// 	this.addClass('animated ' + animationName).one(animationEnd, function() {
// 		$(this).removeClass('animated ' + animationName);
// 	});
// 	return this;
// }
// });

});
