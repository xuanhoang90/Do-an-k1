import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import { logout } from '../../features/auth/authSlice';
import useFetch from "../../hooks/useFetch";
import { useDispatch, useSelector } from 'react-redux';

export default function Header(options) {
    const dispatch = useDispatch();
    const handleLogout = () => {
        dispatch(logout());
    };

    const { token } = useSelector((state) => state.auth);
    const nationals = useFetch('get-nationals')

    return (
        <>
            <div id="sticky-header" className="lavewell_nav_manu style-2">
                <div className="container-fluid">
                    <div className="row d-flex align-items-center">
                        <div className="col-lg-2">
                            <div className="logo cursor-scale">
                                <Link
                                    to="/"
                                    className="logo_img"
                                    title="lavewell"
                                >
                                    <img
                                        width={200}
                                        src="/logo.png"
                                        alt="logo"
                                    />
                                </Link>
                                <Link
                                    to="/"
                                    className="main_sticky"
                                    title="lavewell"
                                >
                                    <img
                                        width={200}
                                        src="logo.png"
                                        alt="astute"
                                    />
                                </Link>
                            </div>
                        </div>
                        <div className="col-lg-8">
                            <nav className="lavewell_menu">
                                <ul className="nav_scroll">
                                    <li>
                                        <Link to="/" className="cursor-scale">
                                            Home
                                        </Link>
                                    </li>
                                    <li>
                                        <a className="cursor-scale">
                                            Learn Caligraphy
                                        </a>
                                        <ul className="sub-menu">
                                            {
                                                nationals && nationals.map((national) => (
                                                    <li key={national.id}>
                                                        <Link
                                                            to={`/blog/${national.slug}`}
                                                            className="cursor-scale"
                                                        >
                                                            {national.name}
                                                        </Link>
                                                    </li>
                                                ))
                                            }
                                        </ul>
                                    </li>
                                    <li>
                                        <Link
                                            to="/network"
                                            className="cursor-scale"
                                        >
                                            Network
                                        </Link>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div className="col-lg-2">

                            {
                                token && (
                                    <nav className="lavewell_menu">
                                        <ul className="nav_scroll">
                                            <li>
                                                <a className="cursor-scale">
                                                    User
                                                </a>
                                                <ul className="sub-menu">
                                                    <li>
                                                        <Link
                                                            to="/user/profile"
                                                            className="cursor-scale"
                                                        >
                                                            Profile
                                                        </Link>
                                                    </li>
                                                    <li>
                                                        <Link
                                                            to="/user/practice-history"
                                                            className="cursor-scale"
                                                        >
                                                            Practice
                                                        </Link>
                                                    </li>
                                                    <li>
                                                        <a onClick={handleLogout}>Logout</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                )
                            }

                            {
                                !token && (
                                    <div className="header-btn">
                                        <Link to={'/user/login'}>Login</Link>
                                    </div>
                                )
                            }
                            
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
