$(document).ready(function(){

	menu_toggle();
	function menu_toggle() {
		var menu_container = $('.navigation-container');
		var menu_toggler = $('.main-header .menu-toggle');

		menu_toggler.click(function(){
			menu_container.toggleClass('toggled');
		})
	}
	

})

$(window).on('load', function(){

	fixed_header();
	function fixed_header(){
		var header = $('.fixed-header .main-header');
		var header_height = header.height();
		var content = $('body');

		content.css('margin-top',header_height);
	}

	header_containers_same_height();
	function header_containers_same_height(){
		var container = $('.header-container > div');
		var highest;
		var first = 1;

		container.each(function(){
			if (first == 1) {
				highest = $(this).height();
				first = 0;
			} else {
				if (highest < $(this).height()){
					highest = $(this).height();
				}
			}
		})
		
		container.each(function(){
			$(this).height(highest);
		})

	}

})
