import React, { useEffect, useState } from "react";
import Footer from "../Commons/Footer";
import Header from "../Commons/Header";
import { Link } from "react-router-dom";
import useFetch from "../../hooks/useFetch";
import { useDispatch, useSelector } from 'react-redux';
import { updateProfile, logout } from '../../features/auth/authSlice';

export default function PracticeHistory(options) {
    const dispatch = useDispatch();

    const handleLogout = () => {
        dispatch(logout());
    };

    const userData = useFetch('user/user-info')
    const practiceHistories = useFetch('user/practice-histories')

    return (
        <>
            <Header />

            <div className="container mt-5 profile-page">
                <div className="row">
                    {/* Sidebar */}
                    <div className="col-md-4">
                        <div className="widget-sidber">
                            <div className="widget-sidber-content">
                                <h4>{ userData?.name }</h4>
                            </div>
                            <div className="widget-category">
                                <ul>
                                <li>
                                    <Link to={'/user/profile'}>
                                        Your profile
                                        <i className="bi bi-arrow-right" />
                                    </Link>
                                </li>
                                <li className="active">
                                    <Link to={'/user/practice-history'}>
                                        Practice history
                                        <i className="bi bi-arrow-right" />
                                    </Link>
                                </li>
                                <li>
                                    <a onClick={handleLogout}>
                                        Logout
                                        <i className="bi bi-arrow-right" />
                                    </a>
                                </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    {/* Main Content */}
                    <div className="col-md-8">

                        <div className="widget-sidber">
                            <div className="widget-sidber-content">
                                <h4>Practice history</h4>
                            </div>
                            <div className="widget-category">

                            <div className="row mb-3">
                                <div className="col-md-3">Time</div>
                                <div className="col-md-6">Your result</div>
                                <div className="col-md-3">Action</div>
                            </div>

                            {
                                practiceHistories?.length > 0 ? 
                                practiceHistories.map(history => (
                                    <div key={history.id} className="row mb-3">
                                        <div className="col-md-3">{ history.created_at.split('T')[0] } : { history.created_at.split('T')[1].split('.')[0] }</div>
                                        <div className="col-md-6">
                                            Lesson: { history.lesson.title }
                                            <img style={{'display': 'block', 'width': '100%'}} src={history.image} />
                                        </div>
                                        <div className="col-md-3">
                                            <div className="submit-button">
                                                <Link className="button" to={'/lesson/' + history.lesson.slug}>View lesson</Link>
                                            </div>
                                            {/* <div className="submit-button mt-3">
                                                <Link className="button" to={'/lesson/' + history.lesson.slug}>View lesson</Link>
                                            </div> */}
                                        </div>
                                    </div>
                                )) : 
                                <p>No practice history found.</p>
                            }
                            
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <Footer />
        </>
    )
}
