import React, { useEffect, useState } from "react";
import Header from "../Commons/Header";
import Footer from "../Commons/Footer";
import useFetch from "../../hooks/useFetch";
import { useDispatch } from "react-redux";
import { updateProfile, logout } from "../../features/auth/authSlice";
import { Link } from "react-router-dom";

export default function Profile(props) {
    const [image, setImage] = useState(null);
    const [preview, setPreview] = useState(null);
    const [name, setName] = useState("");
    const [phone, setPhone] = useState("");
    const [address, setAddress] = useState("");
    const [nationality, setNationality] = useState("");
    const [level, setLevel] = useState("");
    const [errors, setErrors] = useState({});
    const fileInputRef = React.createRef();

    const userData = useFetch("user/user-info");
    // console.log(userData);

    const nationals = useFetch("get-nationals");
    const levels = useFetch("get-levels");

    const dispatch = useDispatch();

    // Prepopulate form fields with user data
    useEffect(() => {
        if (userData) {
            setName(userData?.name || "");
            setPhone(userData?.profile?.phone_number || "");
            setAddress(userData?.profile?.address || "");
            setNationality(userData?.profile?.national_id || "");
            setLevel(userData?.profile?.level_id || "");
        }
    }, [userData]);

    const handleLogout = () => {
        dispatch(logout());
    };

    const handleImageChange = (e) => {
        const file = e.target.files[0];
        if (file) {
            setImage(file);

            // Generate a preview URL for the selected image
            const reader = new FileReader();
            reader.onloadend = () => {
                setPreview(reader.result);
            };
            reader.readAsDataURL(file);
        }
    };

    const handlePreviewClick = () => {
        fileInputRef.current.click();
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        const payload = {
            image,
            name: name.trim(),
            phone: phone.trim(),
            address: address.trim(),
            nationality: nationality || "",
            level: level || "",
        };

        let data = await dispatch(updateProfile(payload));

        if (data?.payload?.errors) {
            setErrors(data.payload.errors);
        } else {
            setErrors({});
        }

        if (data?.payload?.success) {
            alert("Profile updated successfully!");
        } else {
            alert("Failed to update profile.");
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
                                <h4>{userData?.name || "User"}</h4>
                            </div>
                            <div className="widget-category">
                                <ul>
                                    <li className="active">
                                        <Link to={"/user/profile"}>
                                            Your profile
                                            <i className="bi bi-arrow-right" />
                                        </Link>
                                    </li>
                                    <li>
                                        <Link to={"/user/practice-history"}>
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
                                        <label
                                            htmlFor="profile-picture"
                                            className="form-label"
                                        >
                                            Profile Picture
                                        </label>
                                        <div className="d-flex justify-content-center">
                                            <img
                                                src={
                                                    preview
                                                        ? preview
                                                        : userData?.profile
                                                              ?.avatar
                                                        ? "/avata.png"
                                                        : userData?.profile
                                                              ?.avatar
                                                }
                                                alt="Profile Picture"
                                                className="img-thumbnail mb-2"
                                                style={{
                                                    width: 150,
                                                    height: 150,
                                                    objectFit: "cover",
                                                }}
                                                onClick={handlePreviewClick}
                                            />
                                        </div>
                                        <input
                                            className="form-control"
                                            type="file"
                                            id="profile-picture"
                                            style={{ display: "none" }}
                                            onChange={handleImageChange}
                                            ref={fileInputRef}
                                        />
                                    </div>
                                    {/* Name */}
                                    <div className="mb-3">
                                        <label
                                            htmlFor="user-name"
                                            className="form-label"
                                        >
                                            Full Name
                                        </label>
                                        <input
                                            type="text"
                                            className="form-control"
                                            id="user-name"
                                            placeholder="Enter your full name"
                                            value={name}
                                            onChange={(e) =>
                                                setName(e.target.value)
                                            }
                                        />
                                    </div>
                                    {/* Email */}
                                    <div className="mb-3">
                                        <label
                                            htmlFor="user-email"
                                            className="form-label"
                                        >
                                            Email Address
                                        </label>
                                        <input
                                            type="email"
                                            className="form-control"
                                            id="user-email"
                                            placeholder="Enter your email"
                                            value={userData?.email || ""}
                                            readOnly
                                        />
                                    </div>
                                    {/* Phone Number */}
                                    <div className="mb-3">
                                        <label
                                            htmlFor="user-phone"
                                            className="form-label"
                                        >
                                            Phone Number
                                        </label>
                                        <input
                                            type="tel"
                                            className="form-control"
                                            id="user-phone"
                                            placeholder="Enter your phone number"
                                            value={phone}
                                            onChange={(e) =>
                                                setPhone(e.target.value)
                                            }
                                        />
                                    </div>
                                    {/* Address */}
                                    <div className="mb-3">
                                        <label
                                            htmlFor="user-address"
                                            className="form-label"
                                        >
                                            Address
                                        </label>
                                        <input
                                            type="text"
                                            className="form-control"
                                            id="user-address"
                                            placeholder="Enter your address"
                                            value={address}
                                            onChange={(e) =>
                                                setAddress(e.target.value)
                                            }
                                        />
                                    </div>
                                    {/* Nationality */}
                                    <div className="mb-3">
                                        <label
                                            htmlFor="user-nationality"
                                            className="form-label"
                                        >
                                            Nationality
                                        </label>
                                        <select
                                            className="form-select"
                                            id="user-nationality"
                                            value={nationality}
                                            onChange={(e) =>
                                                setNationality(e.target.value)
                                            }
                                        >
                                            <option value="" disabled>
                                                Select Nationality
                                            </option>
                                            {nationals &&
                                                nationals.map((national) => (
                                                    <option
                                                        key={national.id}
                                                        value={national.id}
                                                    >
                                                        {national.name}
                                                    </option>
                                                ))}
                                        </select>
                                    </div>
                                    {/* Level */}
                                    <div className="mb-3">
                                        <label
                                            htmlFor="user-level"
                                            className="form-label"
                                        >
                                            Level
                                        </label>
                                        <select
                                            className="form-select"
                                            id="user-level"
                                            value={level}
                                            onChange={(e) =>
                                                setLevel(e.target.value)
                                            }
                                        >
                                            <option value="" disabled>
                                                Select Level
                                            </option>
                                            {levels &&
                                                levels.map((level) => (
                                                    <option
                                                        key={level.id}
                                                        value={level.id}
                                                    >
                                                        {level.name}
                                                    </option>
                                                ))}
                                        </select>
                                    </div>
                                    {/* Save Button */}
                                    <div className="text-center">
                                        <div className="submit-button">
                                            <button type="submit">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                    {/* Error Messages */}
                                    {Object.keys(errors).length > 0 && (
                                        <div className="alert alert-danger">
                                            {Object.values(errors).map(
                                                (error, index) => (
                                                    <div key={index}>
                                                        {error}
                                                    </div>
                                                )
                                            )}
                                        </div>
                                    )}
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
