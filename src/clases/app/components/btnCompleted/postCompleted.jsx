import API from '../../../../services/env';

function getCookiePOST(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
}

const completedCourse = API().API_COMPLETED
const postComplete = async(idClase, isCompleted) =>{

	const token = getCookiePOST('wp_id');

	await fetch(completedCourse, {
		method: 'PUT',
		headers: {
			'Content-Type': 'application/json',
			'Accept': 'application/json',
			'Authorization': `Bearer ${token}`
		},
		body: JSON.stringify({
			class_id: idClase,
			status: isCompleted ? 1 : 0
		})
	})
	.then(response => response.json())
	.then(data => {
		return data
	})
}

export default postComplete
