import { useState } from '@wordpress/element';
import Pagination from '@mui/material/Pagination';
import Stack from '@mui/material/Stack';
import {upDateQueryParams, onUrlChange} from '../../utilities/updateQueryParams'

const totalPages = document.getElementById('app')?.getAttribute('data-pages') || 1;

export default function App() {

    const [pageState, setPageState] = useState(1);
    onUrlChange((newUrl) => {
        const params = new URL(newUrl).searchParams;
        const page = params.get('page') || 1;
        setPageState(Number(page));
    })
    
    return( 
        <Stack spacing={2} sx={{ padding: '20px 0' }} >
            <Pagination 
                count={totalPages} 
                colorvariant="outlined" 
                shape="rounded" 
                onChange={(event, value) => {
                    upDateQueryParams('page', value);
                }}
                page={pageState}	
            />
        </Stack>
    );  
}
    