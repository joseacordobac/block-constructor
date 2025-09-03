import './editor.scss';
import { useBlockProps } from '@wordpress/block-editor';
import Pagination from '@mui/material/Pagination';
import Stack from '@mui/material/Stack';


export default function Edit({attributes }) {

    return (
		<div 
		{...useBlockProps({ className:"card-list-head" })} >
			<Stack spacing={2} justifyContent={"center"} alignItems="center">
				<Pagination count={2} variant="outlined" shape="rounded" />
			</Stack>
		</div>
    );
}
