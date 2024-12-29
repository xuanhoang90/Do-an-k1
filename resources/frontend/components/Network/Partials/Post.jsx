import React, { useEffect, useState } from "react";
import { Link } from 'react-router-dom';
import { postData } from "../../../utils/api";
import PostComment from "./PostComment";

export default function Post({post, updateLikePost}) {
  const [showComment, setShowComment] = useState(false)

  const handleShowComment = () => {
    setShowComment(!showComment)
  }

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

                    <div className="row">
                        <div className="col-lg-12">
                          <button type="button" className={ post.is_liked ? 'btn btn-default' : 'btn btn-info' } onClick={() => handleLike(post) }><i className="fa-solid fa-thumbs-up" /> LIKE ({post.like_count})</button>
                          <button type="button" className="btn btn-primary mx-3" onClick={handleShowComment}><i className="fa-solid fa-comments" /> Comments ({post.comment_count})</button>
                        </div>
                    </div>

                    {
                      showComment && (
                        <PostComment post={post} />
                      )
                    }

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