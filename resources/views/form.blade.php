<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forms</title>
    <link rel="stylesheet" href="{{ asset("assets/styles/index.scss") }}">
    <style>
      #loader {
        transition: all 0.3s ease-in-out;
        opacity: 1;
        visibility: visible;
        position: fixed;
        height: 100vh;
        width: 100%;
        background: #fff;
        z-index: 90000;
      }

      #loader.fadeOut {
        opacity: 0;
        visibility: hidden;
      }



      .spinner {
        width: 40px;
        height: 40px;
        position: absolute;
        top: calc(50% - 20px);
        left: calc(50% - 20px);
        background-color: #333;
        border-radius: 100%;
        -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
        animation: sk-scaleout 1.0s infinite ease-in-out;
      }

      @-webkit-keyframes sk-scaleout {
        0% { -webkit-transform: scale(0) }
        100% {
          -webkit-transform: scale(1.0);
          opacity: 0;
        }
      }

      @keyframes sk-scaleout {
        0% {
          -webkit-transform: scale(0);
          transform: scale(0);
        } 100% {
          -webkit-transform: scale(1.0);
          transform: scale(1.0);
          opacity: 0;
        }
      }
    </style>

    @vite(['resources/assets/styles/index.scss', 'resources/assets/scripts/index.js'])
  </head>
  <body class="app">
    <!-- @TOC -->
    <!-- =================================================== -->
    <!--
      + @Page Loader
      + @App Content
          - #Left Sidebar
              > $Sidebar Header
              > $Sidebar Menu

          - #Main
              > $Topbar
              > $App Screen Content
    -->

    <!-- @Page Loader -->
    <!-- =================================================== -->
    <div id='loader'>
      <div class="spinner"></div>
    </div>

    <script>
      window.addEventListener('load', function load() {
        const loader = document.getElementById('loader');
        setTimeout(function() {
          loader.classList.add('fadeOut');
        }, 300);
      });
    </script>

    <!-- @App Content -->
    <!-- =================================================== -->
    <div>
      <!-- #Left Sidebar ==================== -->
      <div class="sidebar">
        <div class="sidebar-inner">
          <!-- ### $Sidebar Header ### -->
          <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
              <div class="peer peer-greed">
                <a class="sidebar-link td-n" href="index.html">
                  <div class="peers ai-c fxw-nw">
                    <div class="peer">
                      <div class="logo">
                        <img src="assets/static/images/logo.png" alt="">
                      </div>
                    </div>
                    <div class="peer peer-greed">
                      <h5 class="lh-1 mB-0 logo-text">Adminator</h5>
                    </div>
                  </div>
                </a>
              </div>
              <div class="peer">
                <div class="mobile-toggle sidebar-toggle">
                  <a href="" class="td-n">
                    <i class="ti-arrow-circle-left"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- ### $Sidebar Menu ### -->
          <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item mT-30 actived">
              <a class="sidebar-link" href="index.html">
                <span class="icon-holder">
                  <i class="c-blue-500 ti-home"></i>
                </span>
                <span class="title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="email.html">
                <span class="icon-holder">
                  <i class="c-brown-500 ti-email"></i>
                </span>
                <span class="title">Email</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="compose.html">
                <span class="icon-holder">
                  <i class="c-blue-500 ti-share"></i>
                </span>
                <span class="title">Compose</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="calendar.html">
                <span class="icon-holder">
                  <i class="c-deep-orange-500 ti-calendar"></i>
                </span>
                <span class="title">Calendar</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="chat.html">
                <span class="icon-holder">
                  <i class="c-deep-purple-500 ti-comment-alt"></i>
                </span>
                <span class="title">Chat</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="charts.html">
                <span class="icon-holder">
                  <i class="c-indigo-500 ti-bar-chart"></i>
                </span>
                <span class="title">Charts</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="forms.html">
                <span class="icon-holder">
                  <i class="c-light-blue-500 ti-pencil"></i>
                </span>
                <span class="title">Forms</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="sidebar-link" href="ui.html">
                <span class="icon-holder">
                    <i class="c-pink-500 ti-palette"></i>
                  </span>
                <span class="title">UI Elements</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="c-orange-500 ti-layout-list-thumb"></i>
                </span>
                <span class="title">Tables</span>
                <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class='sidebar-link' href="basic-table.html">Basic Table</a>
                </li>
                <li>
                  <a class='sidebar-link' href="datatable.html">Data Table</a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                    <i class="c-purple-500 ti-map"></i>
                  </span>
                <span class="title">Maps</span>
                <span class="arrow">
                    <i class="ti-angle-right"></i>
                  </span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="google-maps.html">Google Map</a>
                </li>
                <li>
                  <a href="vector-maps.html">Vector Map</a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                    <i class="c-red-500 ti-files"></i>
                  </span>
                <span class="title">Pages</span>
                <span class="arrow">
                    <i class="ti-angle-right"></i>
                  </span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class='sidebar-link' href="blank.html">Blank</a>
                </li>                 
                <li>
                  <a class='sidebar-link' href="404.html">404</a>
                </li>
                <li>
                  <a class='sidebar-link' href="500.html">500</a>
                </li>
                <li>
                  <a class='sidebar-link' href="signin.html">Sign In</a>
                </li>
                <li>
                  <a class='sidebar-link' href="signup.html">Sign Up</a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="c-teal-500 ti-view-list-alt"></i>
                </span>
                <span class="title">Multiple Levels</span>
                <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li class="nav-item dropdown">
                  <a href="javascript:void(0);">
                    <span>Menu Item</span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a href="javascript:void(0);">
                    <span>Menu Item</span>
                    <span class="arrow">
                      <i class="ti-angle-right"></i>
                    </span>
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="javascript:void(0);">Menu Item</a>
                    </li>
                    <li>
                      <a href="javascript:void(0);">Menu Item</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>

      <!-- #Main ============================ -->
      <div class="page-container">
        <!-- ### $Topbar ### -->
        @include('partials.header')

        <!-- ### $App Screen Content ### -->
        <main class='main-content bgc-grey-100'>
          <div id='mainContent'>
            <div class="row gap-20 masonry pos-r">
              <div class="masonry-sizer col-md-6"></div>
              <div class="masonry-item col-md-6">
                <div class="bgc-white p-20 bd">
                  <h6 class="c-grey-900">Basic Form</h6>
                  <div class="mT-30">
                    <form>
                      <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="text-muted">We'll never share your email with anyone else.</small>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <div class="checkbox checkbox-circle checkbox-info peers ai-c mB-15">
                        <input type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer">
                        <label for="inputCall1" class="form-label peers peer-greed js-sb ai-c">
                          <span class="peer peer-greed">Call John for Dinner</span>
                        </label>
                      </div>
                      <button type="submit" class="btn btn-primary btn-color">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="masonry-item col-md-6">
                <div class="bgc-white p-20 bd">
                  <h6 class="c-grey-900">Complex Form Layout</h6>
                  <div class="mT-30">
                    <form>
                      <div class="row">
                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="inputEmail4">Email</label>
                          <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                        </div>
                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="inputPassword4">Password</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                        </div>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="inputAddress2">Address 2</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                      </div>
                      <div class="row">
                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="inputCity">City</label>
                          <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="mb-3 col-md-4">
                          <label class="form-label" for="inputState">State</label>
                          <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <div class="mb-3 col-md-2">
                          <label class="form-label" for="inputZip">Zip</label>
                          <input type="text" class="form-control" id="inputZip">
                        </div>
                      </div>
                      <div class="row">
                        <div class="mb-3 col-md-6">
                          <label class="form-label fw-500">Birthdate</label>
                          <div class="timepicker-input input-icon mb-3">
                            <div class="input-group">
                              <div class="input-group-text bgc-white bd bdwR-0">
                                <i class="ti-calendar"></i>
                              </div>
                              <input type="text" class="form-control bdc-grey-200 start-date" placeholder="Datepicker" data-provide="datepicker">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="mb-3">
                        <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                          <input type="checkbox" id="inputCall2" name="inputCheckboxesCall" class="peer">
                          <label for="inputCall2" class="form-label peers peer-greed js-sb ai-c">
                            <span class="peer peer-greed">Call John for Dinner</span>
                          </label>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary btn-color">Sign in</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="masonry-item col-md-6">
                <div class="bgc-white p-20 bd">
                  <h6 class="c-grey-900">Horizontal Form</h6>
                  <div class="mT-30">
                    <form>
                      <div class="mb-3 row">
                        <label for="inputEmail3" class="form-label col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="inputPassword3" class="form-label col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                      </div>
                      <fieldset class="mb-3">
                        <div class="row">
                          <legend class="col-form-legend col-sm-2">Radios</legend>
                          <div class="col-sm-10">
                            <div class="form-check">
                              <label class="form-label form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                Option one is this and that&mdash;be sure to include why it's great
                              </label>
                            </div>
                            <div class="form-check">
                              <label class="form-label form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                Option two can be something else and selecting it will deselect option one
                              </label>
                            </div>
                            <div class="form-check disabled">
                              <label class="form-label form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                                Option three is disabled
                              </label>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                      <div class="mb-3 row">
                        <div class="col-sm-2">Checkbox</div>
                        <div class="col-sm-10">
                          <div class="form-check">
                            <label class="form-label form-check-label">
                              <input class="form-check-input" type="checkbox"> Check me out
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary btn-color">Sign in</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="masonry-item col-md-6">
                <div class="bgc-white p-20 bd">
                  <h6 class="c-grey-900">Disabled Forms</h6>
                  <div class="mT-30">
                    <form>
                      <fieldset disabled>
                        <div class="mb-3">
                          <label class="form-label" for="disabledTextInput">Disabled input</label>
                          <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="disabledSelect">Disabled select menu</label>
                          <select id="disabledSelect" class="form-control">
                            <option>Disabled select</option>
                          </select>
                        </div>
                        <div class="form-check">
                          <label class="form-label" class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Can't check this
                          </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-color">Submit</button>
                      </fieldset>
                    </form>
                  </div>
                </div>
              </div>
              <div class="masonry-item col-md-6">
                <div class="bgc-white p-20 bd">
                  <h6 class="c-grey-900">Validation</h6>
                  <div class="mT-30">
                    <form class="container" id="needs-validation" novalidate>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label class="form-label" for="validationCustom01">First name</label>
                          <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label class="form-label" for="validationCustom02">Last name</label>
                          <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label class="form-label" for="validationCustom03">City</label>
                          <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
                          <div class="invalid-feedback">
                            Please provide a valid city.
                          </div>
                        </div>
                        <div class="col-md-3 mb-3">
                          <label class="form-label" for="validationCustom04">State</label>
                          <input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
                          <div class="invalid-feedback">
                            Please provide a valid state.
                          </div>
                        </div>
                        <div class="col-md-3 mb-3">
                          <label class="form-label" for="validationCustom05">Zip</label>
                          <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
                          <div class="invalid-feedback">
                            Please provide a valid zip.
                          </div>
                        </div>
                      </div>
                      <button class="btn btn-primary btn-color" type="submit">Submit form</button>
                    </form>
                    <script>
                      // Example starter JavaScript for disabling form submissions if there are invalid fields
                      (function() {
                        'use strict';

                        window.addEventListener('load', function() {
                          var form = document.getElementById('needs-validation');
                          form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                              event.preventDefault();
                              event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                          }, false);
                        }, false);
                      })();
                    </script>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>

        <!-- ### $App Screen Footer ### -->
        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
          <span>Copyright © 2024 Designed by <a href="https://colorlib.com" target="_blank" rel="nofollow noopener noreferrer" title="Colorlib">Colorlib</a>. All rights reserved.</span>
        </footer>
      </div>
    </div>
  </body>
</html>
