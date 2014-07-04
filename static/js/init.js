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

	var $root = this,
		$window = $(window);

	$root.find('.autocomplete').each(function(){
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
				  //placeholder: $value_input.attr('placeholder'),
				  style: 'width:'+$value_input.width()+'px;left:'+$value_input.position().left+'px'
			}),
			url = $value_input.data('url'),
			val = $data_input.val(),
			suggs = [];
			
		$data_input.insertAfter($value_input);
		$bg_input.insertAfter($data_input);
		$bg_input.removeClass('autocomplete');
		$bg_input.addClass('autocomplete_bg');
		$value_input.attr('name', $value_input.attr('name') + '_val');
		$value_input.val($value_input.data('val'));
		//$value_input.removeAttr('placeholder');
		
		$value_input.keypress(function(event){
			if(event.which == 13) return false;
		});
		
		$value_input.autocomplete({
			serviceUrl: url,
			paramName: 'search',
			autoSelectFirst: true,
			deferRequestBy: '700',
			containerClass: 'autocomplete-suggestions',
			appendTo: $value_input.parent(),
			noCache: true,
			onSearchComplete: function(query, suggestions){
				var $list = $value_input.parent().find('.autocomplete-suggestions').css({'left':$value_input.position().left+'px'}).children();
				suggs = suggestions;
				if(suggestions.length){
					$bg_input.val(suggestions[0].value);
					$data_input.val(suggestions[0].data);
					$value_input.val(suggestions[0].value.substr(0, query.length));
				}
				else{
					$bg_input.val('');
					$data_input.val('');
				}
			},
			onActivate: function(item){
				$bg_input.val(suggs[item].value);
				$data_input.val(suggs[item].data);
			},
			onSelect: function(suggestion){
				if(suggestion.data != val)
				{
					$bg_input.val(suggestion.value);
					$data_input.val(suggestion.data);
					submitForm();
				}
			}
		});
	});
	
};