
const API = ()=> {
	const path = window.location.origin + '/wp-json/my-custom-blocks/v1';

	return {
		APP_URL: path,
		API_CURSOS: path + '/cursos',
		API_TAX: path + '/taxonomies',
		API_COMPLETED: path + '/classStatus',
		API_LIST: path + '/list'
	}
};

export default API;
