$(window).on('load', function(){
	
	// Padding top
	padding_top();
	function padding_top(){
		var win = $(window).height() * .3;
		var head = $('.main-header').height();
		var first = $('.first-section');
		// var first_off = first.offset({top:win});
		var winfirst = win - head;

		first.css('padding-top', winfirst);
	}

})