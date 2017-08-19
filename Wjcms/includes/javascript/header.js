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
})


$(window).on('scroll', function(){

	scrolling_header();
	function scrolling_header(){
		var scroll_top = $(window).scrollTop();
		var header = $('.main-header');
		var header_height = header.height();
		var flag = false;

		if (scroll_top > header_height && !flag){
			header.addClass('scrolling');
			flag = true;
		} else {
			header.removeClass('scrolling');
			flag = false;
		}
	}
})

