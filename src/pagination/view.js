import ReactDOM from 'react-dom/client';
import Pagination from '@mui/material/Pagination';
import Stack from '@mui/material/Stack';
import './editor.scss';

const root = ReactDOM.createRoot(document.getElementById('pagination-block-root'));
root.render(
	<Stack spacing={2} sx={{ padding: '20px 0' }} >
		<Pagination 
			count={3} 
			colorvariant="outlined" 
			shape="rounded" 
			onChange={(event, value) => {
				const pagedEvent = new CustomEvent('paginationChange', { detail: { page: value } });
				document.dispatchEvent(pagedEvent);
			}}
			page={1}	
		/>
	</Stack>
);

