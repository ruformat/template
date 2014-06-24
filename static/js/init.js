// DOM ready event
$(function(){

	// init scripts in .page block
	$('.page:first').ini();

});


// Init scripts in selected jQuery block
$.fn.ini = function(){

	var $root = this,
		$window = $(window);

	/* validate */
	$('form').validate();
	
	/* slider */
	$('.slider').scrollable({circular: true,vertical: false, mousewheel: false}).navigator('.slider_bullets').autoscroll({ autoplay: true, interval: 4000, autopause: false });
	
	/* scroll bar */
	$('.scroll_bar').jScrollPane();
};