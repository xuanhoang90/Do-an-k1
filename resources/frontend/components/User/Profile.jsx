import React, { useEffect, useState } from "react";
import Header from "../Commons/Header";
import Footer from "../Commons/Footer";
import useFetch from "../../hooks/useFetch";
import { useDispatch, useSelector } from 'react-redux';
import { updateProfile, logout } from '../../features/auth/authSlice';
import { Link } from "react-router-dom";

export default function Profile(props) {
  const [image, setImage] = useState(null);
  const [preview, setPreview] = useState(null);
  const [name, setName] = useState(null);
  const [email, setEmail] = useState(null);
  const [phone, setPhone] = useState(null);
  const [address, setAddress] = useState(null);
  const [nationality, setNationality] = useState(null);
  const [level, setLevel] = useState(null);
  const [errors, setErrors] = useState({});

  const userData = useFetch('user/user-info')
  const nationals = useFetch('get-nationals')
  const levels = useFetch('get-levels')

  const dispatch = useDispatch();

  const handleLogout = () => {
      dispatch(logout());
  };

  const handleImageChange = (e) => {
    const file = e.target.files[0]; // Get the selected file
    if (file) {
      setImage(file); // Store the file in the state

      // Generate a preview URL for the selected image
      const reader = new FileReader();
      reader.onloadend = () => {
        setPreview(reader.result); // Set the preview URL once file is read
      };
      reader.readAsDataURL(file); // Convert file to base64 string
    }
  };

  const handlePreviewClick = () => {
    document.getElementById('profile-picture').click();
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    let data = await dispatch(updateProfile({
      image,
      name: name || userData.name,
      phone: phone || userData.profile.phone_number,
      address: address || userData.profile.address,
      nationality: nationality || userData.profile.national_id,
      level: level || userData.profile.level_id
    }));

    if (data.payload.errors) {
      setErrors(data.payload.errors);
    } else {
      setErrors({});
    }

    if (data.payload.success) {
      alert('Success')
    }
  };

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
                            <li className="active">
                                  <Link to={'/user/profile'}>
                                        Your profile
                                        <i className="bi bi-arrow-right" />
                                  </Link>
                            </li>
                            <li>
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
                            <h4>Profile</h4>
                        </div>
                        <div className="widget-category">
                        
                        <form onSubmit={handleSubmit}>
                        {/* Profile Picture */}
                        <div className="mb-3 text-center">
                          <label htmlFor="profile-picture" className="form-label">
                            Profile Picture
                          </label>
                          <div className="d-flex justify-content-center">
                            <img
                              src={ preview ? preview  : '/Profile.png'}
                              alt="Profile Picture"
                              className="img-thumbnail mb-2"
                              style={{ width: 150, height: 150, objectFit: 'cover' }}
                              onClick={handlePreviewClick}
                            />
                          </div>
                          <input
                            className="form-control"
                            type="file"
                            id="profile-picture"
                            style={ {'display': 'none'} }
                            onChange={handleImageChange}
                          />
                        </div>
                        {/* Name */}
                        <div className="mb-3">
                          <label htmlFor="user-name" className="form-label">
                            Full Name
                          </label>
                          <input
                            type="text"
                            className="form-control"
                            id="user-name"
                            placeholder="Enter your full name"
                            value={ userData?.profile?.display_name }
                            onChange={(e) => setName(e.target.value)}
                          />
                        </div>
                        {/* Email */}
                        <div className="mb-3">
                          <label htmlFor="user-email" className="form-label">
                            Email Address
                          </label>
                          <input
                            type="email"
                            className="form-control"
                            id="user-email"
                            placeholder="Enter your email"
                            value={ userData?.email }
                            readOnly
                          />
                        </div>
                        {/* Phone Number */}
                        <div className="mb-3">
                          <label htmlFor="user-phone" className="form-label">
                            Phone Number
                          </label>
                          <input
                            type="tel"
                            className="form-control"
                            id="user-phone"
                            placeholder="Enter your phone number"
                            value={ userData?.profile?.phone_number }
                            onChange={(e) => setPhone(e.target.value)}
                          />
                        </div>
                        {/* Address */}
                        <div className="mb-3">
                          <label htmlFor="user-address" className="form-label">
                            Address
                          </label>

                          <input
                            type="tel"
                            className="form-control"
                            id="user-address"
                            placeholder="Enter your address"
                            value={ userData?.profile?.address }
                            onChange={(e) => setAddress(e.target.value)}
                          />
                        </div>
                        {/* Nationality */}
                        <div className="mb-3">
                          <label htmlFor="user-nationality" className="form-label">
                            Nationality
                          </label>
                          <select className="form-select" id="user-nationality" value={ nationality || userData?.profile?.national_id } onChange={(e) => setNationality(e.target.value)}>
                            {
                              nationals && nationals.map((national) => (
                                <option key={national.id} value={national.id}>
                                  {national.name}
                                </option>
                              ))
                            }
                          </select>
                        </div>
                        {/* Level */}
                        <div className="mb-3">
                          <label htmlFor="user-level" className="form-label">
                            Level
                          </label>
                          <select className="form-select" id="user-level" value={ level || userData?.profile?.level_id } onChange={(e) => setLevel(e.target.value)}>
                            {
                              levels && levels.map((level) => (
                                <option key={level.id} value={level.id}>
                                  {level.name}
                                </option>
                              ))
                            }
                          </select>
                        </div>
                        {/* Save Button */}
                        <div className="text-center">
                          <div className="submit-button">
                            <button type="submit">Update</button>
                          </div>
                        </div>
                      </form>
                        
                  </div>

                </div>
              </div>
            </div>
          </div>


          <Footer />
        </>
    );
}
