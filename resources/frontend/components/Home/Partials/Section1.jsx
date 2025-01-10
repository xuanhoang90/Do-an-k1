import React from "react";
import { Link } from "react-router-dom";

export default function Section1(props) {
  return (
    <>
      <section className="lavewell-banner-area">
        <div className="container">
          <div className="row align-items-center">
            <div className="col-lg-8 offset-lg-2">
              <div className="banner-content">
                <div className="banner-sub-title cursor-scale">
                  <h4>
                    Calligraphy dates back to ancient civilizations
                    <br /> of June 10,2024
                  </h4>
                </div>
                <div className="banner-title cursor-scale">
                  <h1>Western Calligraphy</h1>
                </div>
                <div className="banner-btn">
                  <Link to={'/blog/vi'}>Learn Caligraphy</Link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </>
  )
}