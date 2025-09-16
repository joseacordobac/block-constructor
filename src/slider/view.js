window.addEventListener('load', function () {
	const swiperContainers = document.querySelectorAll('.swiper-container');

	const swipers = {};
	const thumbsIds = [];

	swiperContainers.forEach(container => {
		const id = container.getAttribute('id');
		const swiperOptions = JSON.parse(container.getAttribute('data-swiper'));
		console.log(swiperOptions)

		if (!swiperOptions?.Hasthumbs) {
			swipers[id] = new Swiper(container, swiperOptions);
			thumbsIds.push(swipers[id]);
		}
	});

	swiperContainers.forEach(container => {
		const id = container.getAttribute('id');
		const swiperOptions = JSON.parse(container.getAttribute('data-swiper'));

		if (swiperOptions.Hasthumbs) {
			swiperOptions.thumbs = {
				swiper: thumbsIds[0]
			};
			swipers[id] = new Swiper(container, swiperOptions);
		}
	});
});