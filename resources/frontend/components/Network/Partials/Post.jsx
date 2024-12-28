import React, { useEffect, useState } from "react";
import { Link } from 'react-router-dom';
import { postData } from "../../../utils/api";

export default function Post({post, updateLikePost}) {
  const handleLike = (post) => {
    postData('user/like-post', {social_post_id: post.id})
    updateLikePost(post)
  }

  return (
    <>
      <div className="blog-details-area py-3">
        <div className="container">
          <div className="row">
            <div className="col-lg-8 offset-2">
              <div className="row">
                <div className="col-lg-12">
                  <div className="blog-details-thumb">
                  <img src={`/storage/${post?.thumbnail}`} alt="thumb" />
                  </div>
                  <div className="blog-details-content">
                    <div className="meta-blog">
                      <span className="mate-text">
                        <i className="fa-solid fa-user" />
                        By {post?.student_name}
                      </span>
                      <span className="mate-comment">
                        <i className="fa-solid fa-clock" />
                        {post?.created_at}
                      </span>
                    </div>
                    <h4 className="blog-details-title">{ post.title }</h4>

                    <p>{ post.content }</p>
                  
                  
                  
                    {/* <div className="single-comment-area">
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

                            <div className="col-lg-12">
                              <div className="contact-input-box">
                                <textarea
                                  name="Message"
                                  id="Meassage"
                                  placeholder="Write Comments..."
                                  defaultValue={""}
                                  rows={2}
                                />
                                <div className="blog-details-submi-button">
                                  <button type="submit" className="mt-0">Post Comments</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div className="col-lg-12">
                          <div className="contact-input-box">
                            <textarea
                              name="Message"
                              id="Meassage"
                              placeholder="Write Comments..."
                              defaultValue={""}
                              rows={2}
                            />
                            <div className="blog-details-submi-button">
                              <button type="submit" className="mt-0">Post Comments</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> */}
                  
                    <div className="row">
                        <div className="col-lg-12">
                          <button type="button" className={ post.is_liked ? 'btn btn-default' : 'btn btn-info' } onClick={() => handleLike(post) }><i className="fa-solid fa-thumbs-up" /> LIKE</button>
                          <button type="button" className="btn btn-primary mx-3"><i className="fa-solid fa-comments" /> Comments</button>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </>
  )
}