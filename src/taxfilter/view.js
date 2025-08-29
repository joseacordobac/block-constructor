
import {upDateQueryParams} from '../utilities/updateQueryParams'

const getTaxFilter = (blockTaxfilter) => {

	blockTaxfilter.forEach(item => {
     const getInputs = item.querySelectorAll('.block-taxfilter__input');

		 getInputs.forEach(input => {

			 input.addEventListener('change', () => {
				const getAllChecked = item.querySelectorAll('.block-taxfilter__input:checked');
				const inputValue = [];

				if(getAllChecked.length > 0){
					getAllChecked.forEach(checked => {
						inputValue.push(checked.value);
					})
				}

				upDateQueryParams(input.name, inputValue);
			 })
		 })
	})
}


const filtersActions = () => {
	const menuFilters = document.querySelector('.js-start-filter');
	if(menuFilters){
		menuFilters.addEventListener('click', () => {
			const getTaxfilter = document.querySelector('.mobile-float');
			if(getTaxfilter){
				getTaxfilter.classList.toggle('mobile-float--active');
			}
		});
	}

	const closeFilters = document.querySelector('.js-close-filter');
	if(closeFilters){
		closeFilters.addEventListener('click', () => {
			const getTaxfilter = document.querySelector('.mobile-float');
			if(getTaxfilter){
				getTaxfilter.classList.remove('mobile-float--active');

				let urlObj = new URL(window.location.href);
				urlObj.search = '';
				window.history.pushState({}, '', urlObj.href);

				const getAllChecked = document.querySelectorAll('.block-taxfilter__input:checked');
				if(getAllChecked.length > 0){
					getAllChecked.forEach(checked => {
						checked.checked = false;
					})
				}
			}
		});
	}

	const applyFilters = document.querySelector('.js-apply-filter');
	if(applyFilters){
		applyFilters.addEventListener('click', () => {
			const getTaxfilter = document.querySelector('.mobile-float');
			if(getTaxfilter){
				getTaxfilter.classList.remove('mobile-float--active');
			}
		});
	}

}

addEventListener('DOMContentLoaded', function() {

	const blockTaxfilter = document.querySelectorAll('.block-taxfilter');
	if(blockTaxfilter){
		getTaxFilter(blockTaxfilter);
	}

	filtersActions()
});




