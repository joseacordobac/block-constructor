const adapterBody = (queryParams) =>{

	const exclude = ["search", "order", "metakey", "page", "limit", "orderby", "post_type"];
	const {taxonomies} = {
		taxonomies: Object.fromEntries(
			Object.entries(queryParams).filter(([key]) => !exclude.includes(key))
		)
	}

	return {
		"search" : queryParams.search,
		taxonomies,
		"post_type": queryParams.post_type,
		"page": queryParams.page || 1,
		"limit":12,
		"orderby": queryParams.orderby || 'meta_value',
		"order":queryParams.order,
		"meta_key": queryParams.metakey
	}
}

export default adapterBody
