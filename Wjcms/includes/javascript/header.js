$(document).ready(function(){

	

})

$(window).on('load', function(){

	function fixed_header(){
		var header = $('.fixed-header .main-header');
		var header_height = header.height();
		var content = $('body');

		content.css('margin-top',header_height);
	}
	fixed_header();

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
	header_containers_same_height();

})
