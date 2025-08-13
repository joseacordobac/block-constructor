const adapterCPT = (data) =>{

	const adaptedTax = Object.entries(data).map((item) => {
		return {
			value: item[1].slug,
			label: item[1].name
		}
	})
	return adaptedTax
}

const getAllCPT = async () => {
  const response = await fetch('/wp-json/wp/v2/types');
  const data = await response.json();
	const CPTAdapted = adapterCPT(data)
  return CPTAdapted;
};

export default getAllCPT;


