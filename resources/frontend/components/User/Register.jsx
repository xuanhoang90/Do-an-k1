import React, { useEffect, useState } from "react";
import Header from "../commons/Header";
import Footer from "../Commons/Footer";
import { useDispatch, useSelector } from 'react-redux';
import { register, login } from '../../features/auth/authSlice';
import { Link, useNavigate } from 'react-router-dom';

export default function Register () {
  const [email, setEmail] = useState('');
  const [name, setName] = useState('');
  const [password, setPassword] = useState('');
  const [passwordConfirmation, setPasswordConfirmation] = useState('');
  const dispatch = useDispatch();
  const navigate = useNavigate();
  const { token, loading, error } = useSelector((state) => state.auth);
  const [errors, setErrors] = useState({})

  const handleSubmit = async (e) => {
    e.preventDefault();
    let data = await dispatch(register({ name, email, password, passwordConfirmation }));

    if (data.payload.errors) {
      setErrors(data.payload.errors);
    } else {
      setErrors({});
    }

    if (data.payload.success) {
      await dispatch(login({email, password}))
      closeModal()
    }
  };

  useEffect(() => {
    if (token) {
      navigate('/'); // Redirect to home page after login
    }
  }, [token, navigate]);

  return (
    <>
      <Header />

      <div className="container mt-5 profile-page">
          <div className="row">
              {/* Sidebar */}
            <div className="col-md-4">
                <div className="widget-sidber">
                      <div className="widget-sidber-content">
                          <h4>User management</h4>
                      </div>
                      <div className="widget-category">
                          <ul>
                          <li>
                            <Link to="/user/login">
                              Login
                              <i className="bi bi-arrow-right" />
                              </Link>
                          </li>
                          <li className="active">
                              <Link to="/user/register">
                              Register
                              <i className="bi bi-arrow-right" />
                              </Link>
                          </li>
                          </ul>
                      </div>
                  </div>

              </div>
              {/* Main Content */}
              <div className="col-md-8">
              <div className="widget-sidber">
              <form onSubmit={handleSubmit}>
              <div className="mb-3">
                        <label htmlFor="register-name" className="form-label">
                          Full Name
                        </label>
                        <input
                          type="text"
                          name="name"
                          className="form-control"
                          id="register-name"
                          placeholder="Enter full name"
                          onChange={(e) => setName(e.target.value)}
                        />

                        {
                          errors.name && <div className="alert alert-danger">{errors.name}</div>
                        }
                      </div>
                      <div className="mb-3">
                        <label htmlFor="register-email" className="form-label">
                          Email address
                        </label>
                        <input
                          type="email"
                          name="email"
                          className="form-control"
                          id="register-email"
                          placeholder="Enter email"
                          onChange={(e) => setEmail(e.target.value)}
                        />

                        {
                          errors.email && <div className="alert alert-danger">{errors.email}</div>
                        }
                      </div>
                      <div className="mb-3">
                        <label htmlFor="register-password" className="form-label">
                          Password
                        </label>
                        <input
                          type="password"
                          name="password"
                          className="form-control"
                          id="register-password"
                          placeholder="Enter password"
                          onChange={(e) => setPassword(e.target.value)}
                        />

                        {
                          errors.password && <div className="alert alert-danger">{errors.password}</div>
                        }
                      </div>
                      <div className="mb-3">
                        <label htmlFor="register-password-confirm" className="form-label">
                          Confirm Password
                        </label>
                        <input
                          type="password"
                          name="password_confirmation"
                          className="form-control"
                          id="register-password-confirm"
                          placeholder="Confirm password"
                          onChange={(e) => setPasswordConfirmation(e.target.value)}
                        />

                        {
                          errors.password_confirmation && <div className="alert alert-danger">{errors.password_confirmation}</div>
                        }
                      </div>
                      <div className="submit-button">
                        <button type="submit">Register</button>
                      </div>
                    </form>
              </div>
              </div>
          </div>
        </div>

      <Footer />
    </>
  )
}