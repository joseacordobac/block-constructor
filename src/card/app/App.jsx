import useFetch from '../../hook/Usefetch'
import API from '../../services/env'
import { LinearProgress } from '@mui/material';
import ChevronRightIcon from '@mui/icons-material/ChevronRight';

import './app.css';

const allCourses = API().API_TAX+'?tax=cursos';
const progressCalculation = (total, classesFinished = 0) => {
	const progress = (classesFinished / total) * 100;
	return progress
}

export default function App() {

	const { data, loading, error } = useFetch(`${allCourses}`);
	console.log(data)
	if (loading) return <div><LinearProgress /></div>;
	if (error) return <div>Error: {error}</div>;

	return (
		<div className="cards-courses">
			<div className="cards-list">
				{data?.map((item) => (
					<a href={`/clase/#/${item.slug}`} className="cards-list__body" key={item.id}>
						<div className="cards__title">
							<h2 className='cards__title-text'>{item?.name}</h2>
							<ChevronRightIcon />
						</div>
						<div className="cards-list__img">
							<img
								className="cards__img"
								src={
								(item?.curso_img) ?
								item?.curso_img :
								'https://www.shutterstock.com/image-vector/default-ui-image-placeholder-wireframes-600nw-1037719192.jpg'
							}
								alt={item?.title} />
						</div>
						<div className="cards-list__title">
							<h3 className='cards__teacher-name'>{
							item?.teacher ? item?.teacher : 'Greys Marquez'
							}
							</h3>
							<LinearProgress
								variant="determinate"
								value={progressCalculation(item.clases_count, item.completed)}
								sx={{
									height: 8,
									borderRadius: 50,
									'& .MuiLinearProgress-bar': {
										borderRadius: 50,
									}

								}}
							/>
							<div className="card-list__description">
								<p className='cards-list__description'>{item.completed} de {item?.clases_count} clases completadas</p>
							</div>
						</div>
					</a>
				))}
			</div>
		</div>
	);
}
