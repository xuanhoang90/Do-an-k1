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
                  <h1>Mariya Muskan</h1>
                </div>
                <div className="footer-info text-right">
                  <p>
                    <i className="fa-solid fa-phone-flip" />
                    +880 123 (4567) 890
                  </p>
                  <span>
                    <i className="fa-regular fa-envelope-open" />
                    example@gmail.com
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div className="col-lg-2 col-md-2">
            <div className="footer-logo">
              <a href="index.html">
                {" "}
                <img src="theme/images/home-1/logo-b.png" alt="logo" />
              </a>
            </div>
          </div>
          <div className="col-lg-5 col-md-5">
            <div className="footer-single-item2">
              <div className="footer-content">
                <div className="footer-title">
                  <h1>Munim Mursalin</h1>
                </div>
                <div className="footer-info">
                  <p>
                    <i className="fa-solid fa-phone-flip" />
                    +880 123 (4567) 890
                  </p>
                  <span>
                    <i className="fa-regular fa-envelope-open" />
                    example@gmail.com
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        {/* <div class="footer-shape">
        <img src="assets/images/home-1/footer-shape.png" alt="shape">
        </div>
        <div class="footer-shape2">
          <img src="assets/images/home-1/footer-shape2.png" alt="shape2">
            </div> */}
      </div>
    </div>
  )
}