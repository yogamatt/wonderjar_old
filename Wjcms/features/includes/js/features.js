$(document).ready(function(){
	
	featureShow();

	function featureShow(){
		var feature = $('.feature-section');
		var bottomRow = $('.bottom-row');

		feature.click(function(){
			$(this).toggleClass('show-feature');
		})

	}

})