export const adapterAtributes = ( attribute ) => {

	const {
		loop,
		slidesPerView,
		spaceBetween,
		speed,
		effect,
		arrows,
		autoplay,
		Hasthumbs,
		centeredSlides,
		pagination,
		autoplaySpeed, 
		breakpoints,
	} = attribute;

	const data = {
		loop,
		spaceBetween,
		speed,
		animation:effect,
		arrows,
		autoplay,
		Hasthumbs,
		centeredSlides,
		pagination,
		autoplaySpeed,
		slidesPerViewDesktop:breakpoints?.[780]?.slidesPerView,
		slidesPerViewMobile:slidesPerView
	}

	return data;
}

export const adapterSetAttributes = (attribute, sliderId) => {
  const {
    loop,
    spaceBetween,
    speed,
    animation: effect,
    arrows,
    autoplay,
    Hasthumbs,
    centeredSlides,
    slidesPerViewMobile,
    slidesPerViewDesktop,
    pagination,
    autoplaySpeed
  } = attribute;

  const data = {
    loop,
    spaceBetween,
    speed,
    effect,
	arrows,
	slidesPerView: slidesPerViewMobile,
	breakpoints: {
		780: {
			slidesPerView:slidesPerViewDesktop
		}
	}
  };

  if (centeredSlides) {
    data.centeredSlides = true;
  }

  if (slidesPerViewMobile) {
    data.slidesPerView = slidesPerViewMobile;
  }

  if (slidesPerViewDesktop) {
    data.breakpoints = {
      780: {
        slidesPerView:slidesPerViewDesktop
      }
    };
  }

  if (pagination) {
    data.pagination = {
      el: '.swiper-pagination',
      clickable: true,
      type: 'bullets',
    };
  }

  if (arrows) {
    data.navigation = {
      nextEl: `.next-slider-${sliderId}`,
      prevEl: `.prev-slider-${sliderId}`,
    };
  }

  if (autoplay) {
    data.autoplay = {
      delay: autoplaySpeed,
      disableOnInteraction: true,
    };
  }

  if (Hasthumbs) {
    data.thumbs = {
      swiper: {
        el: '.swiper-thumbs',
      },
    };
  }

  return data;
};


