import { useState, useEffect } from '@wordpress/element';
import Pagination from '@mui/material/Pagination';
import Stack from '@mui/material/Stack';
import {upDateQueryParams, onUrlChange} from '../../utilities/updateQueryParams'

const totalInit = document.getElementById('app')?.getAttribute('data-pages') || 1;


export default function App() {

    const [totalPages, setTotalPages] = useState(() => {
        const element = document.getElementById('app');
        return Number(element?.getAttribute('data-pages')) || 1; 
    });

    const [pageState, setPageState] = useState(1);

    onUrlChange((newUrl) => {
        const params = new URL(newUrl).searchParams;
        const page = params.get('page') || 1;
        setPageState(Number(page));
        setTotalPages(document.getElementById('app')?.getAttribute('data-pages') || 1)
    })

    useEffect(() => {
        const targetNode = document.getElementById('app');

        if (!targetNode) {
            return;
        }

        const config = { attributes: true, attributeFilter: ['data-pages'] };

        const callback = (mutationsList, observer) => {
            for (const mutation of mutationsList) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'data-pages') {
                    const newValue = Number(mutation.target.getAttribute('data-pages')) || 1;
                    setTotalPages(newValue); 
                }
            }
        };

        const observer = new MutationObserver(callback);
        observer.observe(targetNode, config);

        return () => observer.disconnect();
    }, []);
    
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
    