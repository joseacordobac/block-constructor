const adapterBody = (queryParams) =>{

	const exclude = ["search"];
	const {taxonomies} = {
		taxonomies: Object.fromEntries(
			Object.entries(queryParams).filter(([key]) => !exclude.includes(key))
		)
	}


	return {
				"search" : queryParams.search,
				taxonomies,
				"post_type": "portafolio",
				"limit":12,
				"orderby":"meta_value_num",
				"order":"ASC",
				"meta_key":"precio"
			}
}

export default adapterBody
