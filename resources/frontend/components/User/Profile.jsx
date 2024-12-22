import React, { useEffect, useState } from "react";
import Header from "../commons/Header";
import Footer from "../Commons/Footer";
import useFetch from "../../hooks/useFetch";

export default function Profile(props) {
  const [image, setImage] = useState(null);
  const [preview, setPreview] = useState(null);

  const userData = useFetch('user/user-info')
  const nationals = useFetch('get-nationals')
  const levels = useFetch('get-levels')

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
                                <a href="#">
                                Your profile
                                <i className="bi bi-arrow-right" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                Practice history
                                <i className="bi bi-arrow-right" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
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
                            
                            
                        
                        <form>
                        {/* Profile Picture */}
                        <div className="mb-3 text-center">
                          <label htmlFor="profile-picture" className="form-label">
                            Profile Picture
                          </label>
                          <div className="d-flex justify-content-center">
                            <img
                              src={ preview ? preview : userData?.profile?.avatar }
                              alt="Profile Picture"
                              className="img-thumbnail mb-2"
                              style={{ width: 150, height: 150 }}
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
                            value={ userData?.profile?.full_name }
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
                          />
                        </div>
                        {/* Address */}
                        <div className="mb-3">
                          <label htmlFor="user-address" className="form-label">
                            Address
                          </label>
                          <textarea
                            className="form-control"
                            id="user-address"
                            rows={3}
                            placeholder="Enter your address"
                            value={ userData?.profile?.address }
                          />
                        </div>
                        {/* Nationality */}
                        <div className="mb-3">
                          <label htmlFor="user-nationality" className="form-label">
                            Nationality
                          </label>
                          <select className="form-select" id="user-nationality" value={ userData?.profile?.national_id }>
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
                          <select className="form-select" id="user-level" value={ userData?.profile?.level_id }>
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
                          <button type="submit" className="btn btn-success">
                            Save Changes
                          </button>
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
