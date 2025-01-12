import React from "react";
import { Link } from "react-router-dom";

export default function Section2() {
  return (
    <>
      <div className="service-section">
        <div className="container">
          <div className="row">
            <div className="col-lg-12">
              <div className="section-title text-center cursor-scale">
                <div className="section-sub-title">
                  <h5>OUR PROGRAM</h5>
                </div>
                <div className="section-main-title cursor-scale">
                  <h3>East Asian Calligraphy</h3>
                </div>
              </div>
            </div>
          </div>
          <div className="row">
            <div className="col-lg-4 col-md-6">
              <div className="service-single-box">
                <div className="service-thumb">
                  <img src="theme/images/caligraphy/5.jpg" alt="thumb" />
                </div>
                <div className="service-content cursor-scale">
                  <h1 className="service-title">
                    <Link to={'/blog/vi'}>Vietnamese Calligraphy</Link>
                  </h1>
                </div>
              </div>
            </div>
            <div className="col-lg-4 col-md-6">
              <div className="service-single-box">
                <div className="service-thumb">
                  <img src="theme/images/caligraphy/7.jpg" alt="thumb" />
                </div>
                <div className="service-content cursor-scale">
                  <h1 className="service-title">
                    <Link to={'/blog/zh'}>Chinese Calligraphy</Link>
                  </h1>
                </div>
              </div>
            </div>
            <div className="col-lg-4 col-md-6">
              <div className="service-single-box">
                <div className="service-thumb">
                  <img src="theme/images/caligraphy/5.jpg" alt="thumb" />
                </div>
                <div className="service-content cursor-scale">
                  <h1 className="service-title">
                    <Link to={'/blog/gu'}>Indian Calligraphy</Link>
                  </h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </>
  )
}