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

$.fn.cart = function(){

	$('.autocomplete').each(function(){
		var $value_input = $(this),
			$data_input = $("<input/>", {
				  type: "hidden",
				  name: $value_input.attr('name'),
				  value: $value_input.val()
			}),
			$bg_input = $("<input/>", {
				  type: "text",
				  tabindex: "-1",
				  readonly: "readonly",
				  value: $value_input.data('val'),
				  autocomplete: "off",
				  class: $value_input.attr('class'),
				  size: $value_input.attr('size'),
				  style: 'width:'+$value_input.css('width')+';position:absolute;'
			}),
			url = $value_input.data('url');
		
		$data_input.insertAfter($value_input);
		$bg_input.insertAfter($data_input);
		$value_input.attr('name', $value_input.attr('name') + '_val');
		$value_input.val($value_input.data('val'));
		
		$value_input.autocomplete({
			serviceUrl: url,
			paramName: 'search',
			autoSelectFirst: true,
			deferRequestBy: '700',
			containerClass: 'autocomplete-suggestions',
			appendTo: $value_input.parent(),
			noCache: true,
			onSearchComplete: function(query, suggestions){
				var $list = $value_input.parent().find('.autocomplete-suggestions').children();
				$list.each(function(){
					var $suggestion = $(this),
						suggestion_key = $suggestion.data('index');
						
					$suggestion.mouseover(function(){
						$bg_input.val(suggestions[suggestion_key].value);
						$data_input.val(suggestions[suggestion_key].data);
					});
				});
				
				if(suggestions.length){
					$bg_input.val(suggestions[0].value);
					$data_input.val(suggestions[0].data);
				}
				else{
					$bg_input.val('');
					$data_input.val('');
				}
			},
			onSelect: function(suggestion){
				$bg_input.val(suggestion.value);
				$data_input.val(suggestion.data);
			}
		});
	});
	
};