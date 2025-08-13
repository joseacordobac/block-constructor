import { useState } from 'react';
import './BtnCompleted.css';
import postComplete from './postCompleted';

export default function BtnCompleted({ idClase, statusCompleted }) {
	const [isCompleted, setIsCompleted] = useState(statusCompleted);
	const [loading, setLoading] = useState(false);

	const handleToggleCompleted = async () => {
		if (loading) return;

		const newStatus = !isCompleted;
		setIsCompleted(newStatus);
		setLoading(true);
		try {
			await postComplete(idClase, newStatus);
		} catch (error) {
			console.error('Error updating completion status', error);
			setIsCompleted(!newStatus); // Revert status on failure
		} finally {
			setLoading(false);
		}
	};

	return (
		<button
			className={`btn-completed ${isCompleted ? 'is_completed' : ''}`}
			onClick={handleToggleCompleted}
			disabled={loading}
		>
			<p className="btn-completed__text">
				{isCompleted ? 'Lección Completada' : 'Marcar como completada'}
			</p>
		</button>
	);
}
