
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

addEventListener('DOMContentLoaded', function() {

	const blockTaxfilter = document.querySelectorAll('.block-taxfilter');
	if(blockTaxfilter){
		getTaxFilter(blockTaxfilter);
	}

});




