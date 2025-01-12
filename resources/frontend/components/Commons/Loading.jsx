import React, { useContext, useEffect, useState } from "react";
import { Context } from "../../utils/AppContext"

export default function Loading() {
  const { loading } = useContext(Context)

  return (
    <>
      {
        loading && (
          <div id="loading">
            <div id="loading-center">
              <div id="loading-center-absolute">
                <div className="object" id="object_four" />
                <div className="object" id="object_three" />
                <div className="object" id="object_two" />
                <div className="object" id="object_one" />
              </div>
            </div>
          </div>
        )
      }
    </>
  )
}