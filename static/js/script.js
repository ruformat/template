// DOM ready event
$(function(){

	// run scripts in .page block
	$('.page:first').run();

});


// Run scripts in selected jQuery block
$.fn.run = function(){

	var $root = this;

	// example:
	// $root.find('.some-block').animate({ opacity: 0.5 }, 500);

};