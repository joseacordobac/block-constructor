import useFetch from '../../../../hook/Usefetch'
import API from '../../../../services/env'
import './headcourse.css'

const allCourses = API().API_TAX;


const HeadCourse = ({ termSlug}) => {
	const { data, loading, error } = useFetch(`${allCourses}?slug-tax=${termSlug}`);
	if (loading) return <div>Loading...</div>
	if (error) return <div>Error: {error}</div>

	const { name, clases_count, teacher, description } = data[0];

	return (
		<div className="course-hero">
			<div className="course-hero__info">
				<h1 className="course-hero__title">{name}</h1>
				<div className="course-hero__info-content">
					<p className="course-hero__subtitle">{clases_count} lecciones</p>
					<p className="course-hero__subtitle">{teacher}</p>
				</div>
				<p className="course-hero__description">{description}</p>
			</div>
			<div className="course-hero__video-thumbnail">

			</div>
	</div>
	)
}

export default HeadCourse
