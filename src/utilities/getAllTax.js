const adapterAllTax = (data) =>{

	const adaptedTax = Object.entries(data).map((tax) => {
		return {
			value: tax[1].slug,
			label: tax[1].name
		}
	})
	return adaptedTax
}

const getAllTax = async () => {
  const response = await fetch('/wp-json/wp/v2/taxonomies');
  const data = await response.json();
	const taxAdapted = adapterAllTax(data)
  return taxAdapted;
};

export default getAllTax;


