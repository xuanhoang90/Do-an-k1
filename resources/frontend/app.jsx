import React from "react";
import ReactDOM from "react-dom/client";
import { BrowserRouter as Router, Route, Routes, Navigate, BrowserRouter } from "react-router-dom";
import Home from "./components/Home/Home";
import Category from "./components/Blog/Category";
import Lesson from "./components/Blog/Lesson";
import Profile from "./components/User/Profile";
import Login from "./components/User/Login";
import Network from "./components/Network/Network";
import { Provider } from 'react-redux';
import { store } from './app/store';
import ProtectedRoute from './components/ProtectedRoute';
import Loading from "./components/Commons/Loading";
import AppContext from "./utils/AppContext";
import Register from "./components/User/Register";
import PracticeHistory from "./components/User/PracticeHistory";

function Blog() {
    return <h1>Blog Page</h1>;
}

function App() {
    return (
        <Provider store={store}>

        <BrowserRouter>
        <AppContext>

            <Loading />

                <Routes>
                    <Route path="/" element={<Home />} />
                    <Route path="/blog/:language" element={<Category />} />
                    <Route path="/blog/:language/:category" element={<Category />} />
                    <Route path="/blog/:language/:category/:level" element={<Category />} />
                    <Route path="/lesson/:slug" element={<Lesson />} />
                    <Route path="/user/login" element={<Login />} />
                    <Route path="/user/register" element={<Register />} />

                    <Route path="/user/profile" element={
                        <ProtectedRoute>
                            <Profile />
                        </ProtectedRoute>
                    } />

                    <Route path="/user/practice-history" element={
                        <ProtectedRoute>
                            <PracticeHistory />
                        </ProtectedRoute>
                    } />

                    <Route path="/network" element={
                        <ProtectedRoute>
                            <Network />
                        </ProtectedRoute>
                    } />

                    <Route path="*" element={<Navigate to="/user/login" />} />
                </Routes>

            </AppContext>
        </BrowserRouter>
            
        </Provider>
    );
}

ReactDOM.createRoot(document.getElementById("app")).render(<App />);
