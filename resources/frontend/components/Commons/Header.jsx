import React from 'react';

export default function Header(options) {
  return (
    <>
      <div id="sticky-header" className="lavewell_nav_manu style-2">
        <div className="container-fluid">
          <div className="row d-flex align-items-center">
            <div className="col-lg-2">
              <div className="logo cursor-scale">
                <a className="logo_img" href="index.html" title="lavewell">
                  <img src="/theme/images/logo-b.png" alt="logo" />
                </a>
                <a className="main_sticky" href="index.html" title="lavewell">
                  <img src="theme/images/logo.png" alt="astute" />
                </a>
              </div>
            </div>
            <div className="col-lg-8">
              <nav className="lavewell_menu">
                <ul className="nav_scroll">
                  <li>
                    <a className="cursor-scale" href="#">
                      Home
                    </a>
                  </li>
                  <li>
                    <a className="cursor-scale" href="#">
                      Learn Caligraphy
                    </a>
                    <ul className="sub-menu">
                      <li>
                        <a href="#">Viet Nam</a>
                      </li>
                      <li>
                        <a href="#">China</a>
                      </li>
                      <li>
                        <a href="#">India</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a className="cursor-scale" href="#">
                      User
                    </a>
                    <ul className="sub-menu">
                      <li>
                        <a href="#">Profile</a>
                      </li>
                      <li>
                        <a href="#">Practice</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a className="cursor-scale" href="#">
                      Network
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
            <div className="col-lg-2">
              {/* <div class="header-btn">
                <a href="#">Login</a>
              </div> */}
            </div>
          </div>
        </div>
      </div>
    </>
  )
}