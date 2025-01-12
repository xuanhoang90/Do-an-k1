import React, { useEffect, useState } from "react";
import Header from "../Commons/Header";
import Footer from "../Commons/Footer";
import { useDispatch, useSelector } from 'react-redux';
import { login } from '../../features/auth/authSlice';
import { Link, useNavigate } from 'react-router-dom';
import ReCAPTCHA from 'react-google-recaptcha';// Import thư viện reCAPTCHA

export default function Login () {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [recaptchaValue, setRecaptchaValue] = useState(null);// Lưu giá trị reCAPTCHA
  const dispatch = useDispatch();
  const navigate = useNavigate();
  const { token, loading, error } = useSelector((state) => state.auth);

 // Xử lý thay đổi khi reCAPTCHA được hoàn thành
  const handleRecaptchaChange = (value) => {
    setRecaptchaValue(value);
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    // Kiểm tra xem người dùng đã hoàn thành reCAPTCHA chưa
    if (!recaptchaValue) {
      alert("Please complete the reCAPTCHA");
      return;
    }
    dispatch(login({ email, password,  recaptcha: recaptchaValue}));
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
                          <li className="active">
                            <Link to="/user/login">
                              Login
                              <i className="bi bi-arrow-right" />
                              </Link>
                          </li>
                          <li>
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
                        <label htmlFor="login-email" className="form-label">
                          Email address
                        </label>
                        <input
                          type="email"
                          name="email"
                          className="form-control"
                          id="login-email"
                          placeholder="Enter email"
                          onChange={(e) => setEmail(e.target.value)}
                        />
                      </div>
                      <div className="mb-3">
                        <label htmlFor="login-password" className="form-label">
                          Password
                        </label>
                        <input
                          type="password"
                          name="password"
                          className="form-control"
                          id="login-password"
                          placeholder="Enter password"
                          onChange={(e) => setPassword(e.target.value)}
                        />
                      </div>
                      <div className="mb-3">
                        <ReCAPTCHA
                          sitekey="6LdUlbQqAAAAAESvjQmSI3JOp07d6pvnNN_bECpf"  // Thay bằng Site Key của bạn
                          onChange={handleRecaptchaChange}
                        />
                      </div>
                      <div className="submit-button">
                        <button type="submit">Login</button>
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