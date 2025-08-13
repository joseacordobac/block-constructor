import { onUrlChange } from '../utilities/updateQueryParams';
import ReactDOM from 'react-dom/client';
import App from './app/App';

const container = document.getElementById('app');
let root = null;

function renderApp(newUrl) {
  if (!root) {
    root = ReactDOM.createRoot(container);
  }

	const params = new URL(newUrl).searchParams;
	const queryParams = Object.fromEntries(params.entries());

  root.render(<App  queryParams={queryParams} />);
}

onUrlChange((newUrl) => {
    renderApp(newUrl)
});


