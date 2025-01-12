import React, { useEffect, useState } from "react";
import { useDispatch, useSelector } from 'react-redux';
import axios from "axios";

const token = localStorage.getItem('token') || ''
const params = {
  headers: {
    Authorization: `Bearer ${token}`
  }
}

export const getData = async (endpoint) => {
  try {
    const { data } = await axios.get(`/api/${endpoint}`, params)
    return data
  } catch (e) {
    console.log(e)
    return
  }
}

export const postData = async (endpoint, postData) => {
  try {
    const { data } = await axios.post(`/api/${endpoint}`, postData, params)
    return data
  } catch (e) {
    console.log(e)
    return
  }
}