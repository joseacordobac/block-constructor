
import {upDateQueryParams} from '../utilities/updateQueryParams'

const getTaxFilter = (blockTaxfilter) => {

	blockTaxfilter.forEach(item => {
     const getInputs = item.querySelectorAll('.block-taxfilter__input');

		 getInputs.forEach(input => {

			 input.addEventListener('change', () => {
				 const inputValue = input.value;
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




