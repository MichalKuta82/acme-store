(function(){
	'use strict';

	ACMESTORE.homeslider.initCarousel = function() {

		$('.hero-slider').slick({

			slideToShow: 1,
			autoplay: true,
			arrows: false,
			dots: false,
			fade: true,
			autoplayHover: true,
			slideToScroll: 1
		});
	};

})();