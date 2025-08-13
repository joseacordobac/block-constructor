import Lecciones from '../../components/lecciones/Lecciones'
import LinearProgress from '@mui/material/LinearProgress';
import HeadCourse from '../../components/headcourse/HeadCourse';
import CoursesMenu from '../../components/coursesMenu/CoursesMenu';
import { useParams, Outlet } from 'react-router-dom'
import useFetch from '../../../../hook/Usefetch'
import API from '../../../../services/env'
import './course.css'
import { useState } from 'react';

const listCourses = API().API_CURSOS+'?taxonomy=cursos';

export default function Courses(){
		const { term } = useParams();
		const { data, loading, error } = useFetch(`${listCourses}&term=${term}`);
		const [showMenu, setShowMenu] = useState(false);

		if (loading) return <div><LinearProgress /></div>;
		if (error) return <div>Error: {error}</div>;

		const currentHash = location.hash.replace(/^#/, '');
		const totalSlashes = currentHash.split('/').length - 1;

		const showManuChange = (data) => {
			setShowMenu(data)
		}

		return (
			<div className="course">
				<div className="course-back">
					<a className='course-back__link' href="/cursos">
						<span className='course-back__text'>Volver al inicio</span>
					</a>
					<div className="course-content" onClick={() => {
						setShowMenu(!showMenu)
					}}>
						{totalSlashes !== 1 && <CoursesMenu />}
					</div>
				</div>
				{totalSlashes === 1 && <HeadCourse termSlug={term} />}
				<div
					className={`course-class__contain ${totalSlashes === 1 ? 'course-class__contain--column' : ''}`}
					>
					<Outlet />
					<div className={"course__list " + (showMenu ? 'lecciones--active' : '') + (totalSlashes === 1 ? 'course__list--normal' : '')}>
						<Lecciones list={data} closeMenu={showManuChange} totalSlashes={totalSlashes}/>
					</div>
				</div>
			</div>
		)
}
