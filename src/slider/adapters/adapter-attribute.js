export const adapterAttributeSliderInput = ( attribute ) => {

	const data = {
		loop: attribute?.loop,
		slidesPerView: attribute?.slidesPerView,
		spaceBetween: attribute?.spaceBetween,
		speed: attribute?.speed,
		animation: attribute?.effect,
		arrows: attribute?.arrows,
		autoplay: attribute?.autoplay,
		pagination: attribute?.pagination,
		autoplaySpeed: attribute?.autoplaySpeed,
		Hasthumbs: attribute?.Hasthumbs,
	}

	if(attribute?.breakpoints?.[780]?.slidesPerView){
		data.slidesPerView = attribute?.breakpoints?.[780]?.slidesPerView
		data.slidesPerViewMobile = attribute?.slidesPerView
	}

	return data;
}

export const adapterAttributeSliderUpdate = ( attribute, sliderId ) => {

	const data = {
		loop: attribute.loop,
		slidesPerView: attribute.slidesPerView,
		spaceBetween: attribute.spaceBetween,
		speed: attribute.speed,
		effect: attribute.animation,
		arrows: attribute.arrows,
		autoplay: attribute.autoplay,
		Hasthumbs: attribute.Hasthumbs,
	};

	if( attribute.slidesPerViewMobile){
		data.slidesPerView = attribute.slidesPerViewMobile
		data.breakpoints ={
			780: {
				slidesPerView: attribute.slidesPerView
			}
		}
	}

	if( attribute.pagination ) {
		data.pagination = {
			el: '.swiper-pagination',
			clickable: true,
			type: 'bullets',
		}
	}


	if( attribute.arrows ) {
		data.navigation = {
			nextEl: '.next-slider-'+sliderId,
			prevEl: '.prev-slider-'+sliderId,
		}
	}

	if( attribute.autoplay ) {
		data.autoplay = {
			delay: attribute.autoplaySpeed,
			disableOnInteraction: true,
		}
	}

	if( attribute.Hasthumbs ) {
		data.thumbs = {
			swiper: {
				el: '.swiper-thumbs',
			}
		}
	}

	return data;
}


