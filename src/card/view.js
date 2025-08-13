
// view.js
import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './app/App';

const container = document.getElementById('cards');
const root = ReactDOM.createRoot(container);

root.render(<App/>);
