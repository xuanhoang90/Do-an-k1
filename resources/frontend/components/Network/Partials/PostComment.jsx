import React, { useEffect, useState } from "react";
import { getData } from "../../../utils/api";
import PostCommentForm from "./PostCommentForm";
export default function PostComment({post}) {
    const [comments, setComments] = useState([])

    const handleUpdateComment = (comment) => {
        if (comment.parent_id == 0) {
            setComments(prevState => [...prevState, comment])
        } else {
            setComments(prevState => prevState.map(item => {
                if (item.id === comment.parent_id) {
                    item.sub_comments = [...item.sub_comments, comment]
                }
                return item;
            }))
        }
    }

    useEffect(() => {
        // Initialize Pusher
        const pusher = new Pusher('1e0c9cef4c2faceaef9d', {
          cluster: 'ap1',
        });
    
        const channel = pusher.subscribe(`comment-channel-${post.id}`);
        channel.bind('new-comment', (data) => {
          handleUpdateComment(data.comment)
        });
    
        return () => {
          channel.unbind_all();
          channel.unsubscribe();
        };
    }, []);

    useEffect(() => {
        (async () => {
            const data = await getData(`user/get-post-comments?social_post_id=${post.id}`)
            setComments(data);
        })()
    }, [post])

    return (
        <>
            <div className="single-comment-area">
                <div className="row">
                    <div className="col-lg-12">
                        <div className="blog-details-comment-title">
                            <h4>{post.comment_count} Comments</h4>
                        </div>

                        {
                            comments && comments.map(comment => {
                                return (
                                    <div key={comment.id}>
                                        <div className="blog-details-comment">
                                            <div className="blog-details-comment-thumb">
                                                <img className="useAvatar" src={'/storage/'+ comment.student_avatar} alt="" />
                                            </div>
                                            <div className="blog-details-comment-content">
                                                <h2>{comment.student_name}</h2>
                                                <span>{comment.created_at}</span>
                                                <p>{comment.content}</p>
                                            </div>

                                            {
                                                comment.sub_comments && comment.sub_comments.map(sub => {
                                                    return (
                                                        <div key={sub.id}>
                                                            <div className="blog-details-comment style-two">
                                                                <div className="blog-details-comment-thumb">
                                                                    <img className="useAvatar" src={'/storage/'+ sub.student_avatar} alt="img" />
                                                                </div>
                                                                <div className="blog-details-comment-content">
                                                                    <h2>{sub.student_name}</h2>
                                                                    <span>{sub.created_at}</span>
                                                                    <p>{sub.content}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    )
                                                })
                                            }

                                            <div className="blog-details-comment style-two">
                                                <PostCommentForm postId={post.id} parentId={comment.id} />
                                            </div>
                                        </div>
                                    </div>
                                )
                            })
                        }

                        <div className="col-lg-12">
                            <PostCommentForm postId={post.id} parentId={0} />
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}