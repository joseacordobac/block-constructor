
import {upDateQueryParams} from '../utilities/updateQueryParams'

const sendDataUrl = (data) => {
	data.addEventListener('keyup', () => {
		const inputValue = data.value;
		upDateQueryParams('search', inputValue);
	})
}

const identifySearchType = (blockSearcher) => {

	blockSearcher.forEach(search => {
		const typeDataSearch = search.getAttribute('data-search');

		if(typeDataSearch === 'new-direct'){
		}

		if(typeDataSearch === 'direct'){
			const getInput = search.querySelector('.block-my-search__input');
			sendDataUrl(getInput);
		}

	});
}


addEventListener('DOMContentLoaded', function() {

	const blockSearcher = document.querySelectorAll('.block-my-search');

	if(blockSearcher){
		identifySearchType(blockSearcher);
	}

});




