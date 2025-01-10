import React, { useEffect, useState } from "react";
import { getData } from "../utils/api";
import { useDispatch, useSelector } from 'react-redux';

export default function useFetch (endpoint) {
  const [data, setData] = useState()

  const execRequest = () => {
    getData(endpoint).then((res) => {
      setData(res)
    })
  }

  useEffect(() => {
    execRequest()
  }, [endpoint])

  return data
}
