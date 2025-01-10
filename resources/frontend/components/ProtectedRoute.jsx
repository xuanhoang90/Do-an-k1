import React, { useEffect, useState } from "react";
import { Navigate } from 'react-router-dom';
import { useSelector } from 'react-redux';

const ProtectedRoute = ({ children }) => {
  const { token } = useSelector((state) => state.auth);

  if (!token) {
    return <Navigate to="/user/login" />;
  }

  return children;
};

export default ProtectedRoute;
