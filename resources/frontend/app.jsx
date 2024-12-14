import React from 'react';
import ReactDOM from 'react-dom/client';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Home from './components/Home/Home';

function Blog() {
    return <h1>Blog Page</h1>;
}

function App() {
    return (
        <Router>
            <Routes>
                <Route path="/" element={<Home />} />
                <Route path="/blog" element={<Blog />} />
            </Routes>
        </Router>
    );
}

ReactDOM.createRoot(document.getElementById('app')).render(<App />);
