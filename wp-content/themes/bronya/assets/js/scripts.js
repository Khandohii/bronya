$(function(){
	// Gallery
	if ($('.gallery').length) {
		var mainSlier = new Swiper('.gallery', {
			spaceBetween: 40,
			slidesPerView: 'auto',
			watchSlidesProgress: true,
			loop: true,
			speed: 750,
			autoplay: {
				delay: 5000,
				disableOnInteraction: false,
			},
			breakpoints: {
				'320': {
					spaceBetween: 15,
					centeredSlides: true,
				},
				'480': {
					spaceBetween: 15,
					centeredSlides: true,
				},
				'768': {
					spaceBetween: 24,
					centeredSlides: false,
				},
				'1025': {
					spaceBetween: 24,
					centeredSlides: false,
				}
			},
		})
	}


	$(document).on('click', '.swiper-slide-duplicate a.fancy_slider', function(e) {
		e.preventDefault()

		let thisSlideIndex = $(this).closest('.swiper-slide-duplicate').data('swiper-slide-index')

		$(this).closest('.swiper-wrapper').find('.swiper-slide:not(.swiper-slide-duplicate)[data-swiper-slide-index="' + thisSlideIndex + '"] a').trigger('click')
	});
})

$(window).load(function(){
	if( $(window).scrollTop() > 0 ) {
		$('header').addClass('fixed')
	} else{
		$('header').removeClass('fixed')
	}


	$(window).scroll(function(){
		if( $(window).scrollTop() > 0 ) {
			$('header').addClass('fixed')
		} else{
			$('header').removeClass('fixed')
		}
	})
})