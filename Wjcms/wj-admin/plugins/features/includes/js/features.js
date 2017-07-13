$(document).ready(function(){

	fc_showContent();

	function fc_showContent(){
		var list = $('.features-list');
		var firstPosition = list.find('li.feature-item').eq(0).offset().left;
		var listWidth = list.width();
		var blurbLink = list.find('.item-blurb a');
		var allItems = list.find('li.feature-item');
		
		blurbLink.click(function(){
			var featureItem = $(this).closest('li.feature-item');
			var leftPosition = featureItem.offset().left;
			var newPosition = firstPosition - leftPosition;

			// remove show-content
			allItems.removeClass('show-content');

			// add show-content & content width
			featureItem.toggleClass('show-content');
			featureItem.find('.item-content').css({'width': listWidth, 'margin-left': newPosition});
		
		})

	}

})


$(window).on('load', function(){
	
	fc_sameHeight();

	function fc_sameHeight(){

		var feature = $('.item-blurb');
		var tallest = -1;

		feature.each(function(){

			if ($(this).outerHeight() > tallest) {
				tallest = $(this).outerHeight();
			}

		})

		feature.css('height', tallest);

	}

})