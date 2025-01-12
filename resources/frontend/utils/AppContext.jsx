import React, { createContext, useState, useEffect } from "react";
import { useLocation } from "react-router-dom";


export const Context = createContext()

export default function AppContext({children}) {
  const [loading, setLoading] = useState(true)
  const location = useLocation()

  useEffect(() => {
    setLoading(true)

    setTimeout(() => {
      setLoading(false)
      window.scrollTo(0, 0)
    }, 500)
  }, [location])

  return (
    <Context.Provider
      value={{
        loading,
        setLoading,
      }}
    >
      {children}
    </Context.Provider>
  )
}
