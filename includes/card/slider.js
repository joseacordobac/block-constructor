window.addEventListener('DOMContentLoaded', function() {
	const swiperContainer = document.querySelectorAll('.swiper-container');

	swiperContainer.forEach(container => {
		const swiperOptions = JSON.parse(container.getAttribute('data-swiper'));
		const swiper = new Swiper(container, swiperOptions);
	});


})
