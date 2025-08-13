import { Route, Routes } from 'react-router-dom';
import Courses from './pages/course/course'
import Clase from './components/clase/Clase'

export default function App(){

	return (
		<div>
			<Routes>
				<Route path="/:term" element={<Courses />}>
					<Route path=":slug" element={<Clase />} />
				</Route>
			</Routes>
		</div>
	);
};
