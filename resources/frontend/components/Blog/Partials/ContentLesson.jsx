import React, { useEffect, useState } from "react";
import { Link, useParams } from 'react-router-dom';
import useFetch from "../../../hooks/useFetch";
import { getData } from "../../../utils/api";

export default function ContentLesson() {
  const { slug } = useParams()
  const [lesson, setLesson] = useState('')
  const [isShowPracticeArea, setIsShowPracticeArea] = useState(false)

  useEffect(() => {
    (async () => {
      const res = await getData(`get-lesson/${slug}`)
      setLesson(res)
    })()
  }, [slug])

  const handleShowPracticeArea = () => {
    setIsShowPracticeArea(!isShowPracticeArea)
  }

  return (
    <>
      <div className="blog-details-area">
        <div className="container">
          <div className="row">
            <div className="col-lg-12">
              <div className="section-title text-center cursor-scale">
                <div className="section-sub-title">
                  <h5>POST NEWS</h5>
                </div>
                <div className="section-main-title cursor-scale">
                  <h1>{ lesson?.title }</h1>
                </div>
              </div>
            </div>
          </div>
          <div className="row">

          <div className="col-lg-4">
              <div className="row">
                <div className="col-lg-12">
                  <div className="widget-sidber">
                    <div className="widget_search">
                      <form action="#" method="get">
                        <input
                          type="text"
                          name="s"
                          defaultValue=""
                          placeholder="Search Here"
                          title="Search for:"
                        />
                        <button type="submit" className="icons">
                          <i className="fa fa-search" />
                        </button>
                      </form>
                    </div>
                  </div>
                  
                  <div className="widget-sidber">
                    <div className="widget-sidber-content">
                      <h4>Latest Posts</h4>
                    </div>
                    <div className="sidber-widget-recent-post">
                      <div className="recent-widget-thumb">
                        <img src="theme/images/inner/recent-post.png" alt="" />
                      </div>
                      <div className="recent-widget-content">
                        <a href="blog-details.html">
                          Top crypto exchange influencers
                        </a>
                        <p> feb, 26 2024</p>
                      </div>
                    </div>
                    <div className="sidber-widget-recent-post">
                      <div className="recent-widget-thumb">
                        <img src="theme/images/inner/recent-post2.png" alt="" />
                      </div>
                      <div className="recent-widget-content">
                        <a href="blog-details.html">
                          Necessity may give us best virtual court
                        </a>
                        <p> June, 15 2024</p>
                      </div>
                    </div>
                    <div className="sidber-widget-recent-post">
                      <div className="recent-widget-thumb">
                        <img src="theme/images/inner/recent-post3.png" alt="" />
                      </div>
                      <div className="recent-widget-content">
                        <a href="blog-details.html">
                          You should know about business plan
                        </a>
                        <p> april, 10 2024</p>
                      </div>
                    </div>
                  </div>
                  <div className="widget-sidber">
                    <div className="widget-sidber-content">
                      <h4>Tags</h4>
                    </div>
                    <div className="widget-catefories-tags">
                      <a href="#">Consulting</a>
                      <a href="#">Agency</a>
                      <a href="#">Business</a>
                      <a href="#">Digital</a>
                      <a href="#">Experience</a>
                      <a href="#">Technology</a>
                    </div>
                  </div>
                  <div className="sidebar__single sidebar__comments">
                    <h3 className="sidebar__title">Recent Comments</h3>
                    <ul className="sidebar__comments-list list-unstyled">
                      <li>
                        <div className="sidebar__comments-icon">
                          {" "}
                          <i className="fas fa-comments" />
                        </div>
                        <div className="sidebar__comments-text-box">
                          <p>
                            A wordpress commenter on <br />
                            launch new mobile app{" "}
                          </p>
                        </div>
                      </li>
                      <li>
                        <div className="sidebar__comments-icon">
                          {" "}
                          <i className="fas fa-comments" />{" "}
                        </div>
                        <div className="sidebar__comments-text-box">
                          <p>
                            {" "}
                            <span>John Doe</span> on template:
                          </p>
                          <h5>comments</h5>
                        </div>
                      </li>
                      <li>
                        <div className="sidebar__comments-icon">
                          {" "}
                          <i className="fas fa-comments" />{" "}
                        </div>
                        <div className="sidebar__comments-text-box">
                          <p>
                            A wordpress commenter on <br />
                            launch new mobile app{" "}
                          </p>
                        </div>
                      </li>
                      <li>
                        <div className="sidebar__comments-icon">
                          {" "}
                          <i className="fas fa-comments" />{" "}
                        </div>
                        <div className="sidebar__comments-text-box">
                          <p>
                            {" "}
                            <span>John Doe</span> on template:
                          </p>
                          <h5>comments</h5>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div className="col-lg-8">
              <div className="row">
                <div className="col-lg-12">
                  <div className="blog-details-thumb">
                  <img src={ lesson?.thumbnail } alt="thumb" />
                  </div>
                  <div className="blog-details-content">
                    <div className="meta-blog">
                      <span className="mate-text">
                        <i className="fa-solid fa-user" />
                        By admin
                      </span>
                      <span className="mate-comment">
                        <i className="fa-solid fa-comments" />
                        02 Comments
                      </span>
                    </div>
                    <h4 className="blog-details-title">{ lesson?.title }</h4>

                    <div dangerouslySetInnerHTML={{ __html: lesson?.content }} />
                  </div>
                  <div className="blog-details-socila-box">
                    <div className="row align-items-center">
                      <div className="col-lg-6 col-md-6">
                        <div className="blog-details-category">
                          <span>
                            <a className="active-class" style={{'cursor': 'pointer'}} onClick={handleShowPracticeArea}>
                              Let practice now!
                            </a>
                          </span>
                        </div>
                      </div>
                      <div className="col-lg-6 col-md-6">
                        <div className="blog-details-social-icon">
                          <ul>
                            <li>
                              <a href="#">
                                <i className="fab fa-facebook-f" />
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <i className="fa-brands fa-x-twitter" />
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <i className="fab fa-linkedin-in" />
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <i className="fab fa-pinterest-p" />
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>

                  {
                    isShowPracticeArea && (
                      <div className="practice-area" style={{'width': '100%', 'height': '500px', 'background': 'white'}}>
                        <div className="practice-area-title">
                          <h3>Practice Area</h3>
                        </div>
                      </div>
                    )
                  }

                  <div className="single-comment-area">
                    <div className="row">
                      <div className="col-lg-12">
                        <div className="blog-details-comment-title">
                          <h4>‘2’ Comments</h4>
                        </div>
                        <div className="blog-details-comment">
                          <div className="blog-details-comment-reply">
                            <a href="#">Reply</a>
                          </div>
                          <div className="blog-details-comment-thumb">
                            <img src="theme/images/inner/details-img.png" alt="" />
                          </div>
                          <div className="blog-details-comment-content">
                            <h2>Mariya Muskan</h2>
                            <span>22 August, 2024</span>
                            <p>
                              I must explain to you how all this mistaken idea of denouncing
                              pleasure and praising pain was born and I will give you a
                              complete account of the system
                            </p>
                          </div>
                        </div>
                        <div className="blog-details-comment style-two">
                          <div className="blog-details-comment-reply">
                            <a href="#">Reply</a>
                          </div>
                          <div className="blog-details-comment-thumb">
                            <img src="theme/images/inner/details-img2.png" alt="img" />
                          </div>
                          <div className="blog-details-comment-content">
                            <h2>Mursalin</h2>
                            <span>22 August, 2024</span>
                            <p>
                              I must explain to you how all this mistaken idea of denouncing
                              pleasure and praising pain was born and I will give you a
                              complete account of the system
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div className="blog-details-contact">
                      <div className="blog-details-contact-title">
                        <h4>Leave A Comments</h4>
                      </div>
                      <form action="#">
                        <div className="row">
                          <div className="col-lg-6">
                            <div className="contact-input-box">
                              <input
                                type="text"
                                name="Name"
                                placeholder="Full Name*"
                                required=""
                              />
                            </div>
                          </div>
                          <div className="col-lg-6">
                            <div className="contact-input-box">
                              <input
                                type="text"
                                name="Email"
                                placeholder="Email Address*"
                                required=""
                              />
                            </div>
                          </div>
                          <div className="col-lg-12">
                            <div className="contact-input-box">
                              <input
                                type="text"
                                name="Web Site"
                                placeholder="Your Website*"
                                required=""
                              />
                            </div>
                          </div>
                          <div className="col-lg-12">
                            <div className="contact-input-box">
                              <textarea
                                name="Message"
                                id="Meassage"
                                placeholder="Write Comments..."
                                defaultValue={""}
                              />
                            </div>
                          </div>
                          <div className="col-lg-12">
                            <div className="input-check-box">
                              <input type="checkbox" />
                              <span>
                                Save your email info in the browser for next comments.
                              </span>
                            </div>
                          </div>
                          <div className="col-lg-12">
                            <div className="blog-details-submi-button">
                              <button type="submit">Post Comments</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
        </div>
      </div>

      <div className="call-to-action-area">
        <div className="container">
          <div className="row call-bg align-items-center">
            <div className="col-lg-9 col-md-8">
              <div className="call-action-content">
                <h5 className="call-action-title">FORM FILL-UP</h5>
                <h1 className="call-sub-title">Login to practice</h1>
              </div>
            </div>
            <div className="col-lg-3 col-md-4">
              <div className="call-action-btn">
                <a href="#">Getting started!</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </>
  )
}