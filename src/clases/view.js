
// view.js
import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './app/App';
import { HashRouter } from 'react-router-dom';

const container = document.getElementById('root');
const root = ReactDOM.createRoot(container);

root.render(
	<HashRouter>
		<App />
	</HashRouter>
);

