import React from 'react';

export default function Footer(options) {
  return (
    <div className="footer-area style-2 footer-bg">
      <div className="container">
        <div className="row ">
          <div className="col-lg-5 col-md-5">
            <div className="footer-single-item">
              <div className="footer-content">
                <div className="footer-title">
                  <h1>Learn calligraphy</h1>
                </div>
              </div>
            </div>
          </div>
          <div className="col-lg-2 col-md-2">
            <div className="footer-logo">
              <a href="index.html">
                {" "}
                <img width={200} src="/logo.png" alt="logo" />
              </a>
            </div>
          </div>
          <div className="col-lg-5 col-md-5">
            <div className="footer-single-item2">
              <div className="footer-content">
                <div className="footer-title">
                  <h1>Social network</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  )
}