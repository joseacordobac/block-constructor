import VideoPlayer from '../video/video'
import { Link, useParams } from 'react-router-dom'
import API from '../../../../services/env'
import useFetch from '../../../../hook/Usefetch'
import BtnCompleted from '../btnCompleted/BtnCompleted'
import './clase.css'

const clase = API().API_CURSOS+'?slug=';

export default function Clase() {

	const { slug, term } = useParams()
	const { data, loading, error } = useFetch(clase + slug);

	if (loading) return <div>Loading...</div>
	if (error) return <div>Error: {error}</div>

	const { content, fields, title, next_post, previous_post, id, completed} = data[0]

	return (
		<div className="course-info">
			<h1 className='course__title'>{title}</h1>
			<VideoPlayer videoUrl={fields?.video} />
			<div className="course-btn_-navs">
				{next_post?.slug &&
					<Link to={`/${term}/${next_post?.slug}`} className='course-btn__next course-btn--prev'>
						Anterior
					</Link>
				}
				<BtnCompleted idClase={id} statusCompleted={completed} />
				{
					previous_post?.slug && (
						<Link to={`/${term}/${previous_post?.slug}`} className='course-btn__next course-btn--next'>Siguiente</Link>
					)
				}
			</div>
			<div className='course__description' dangerouslySetInnerHTML={{ __html: content }} />
		</div>
	)
}
