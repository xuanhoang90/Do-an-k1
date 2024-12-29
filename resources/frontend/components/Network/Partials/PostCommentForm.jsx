import React, { useEffect, useState } from "react";
import { postData } from "../../../utils/api";

export default function PostCommentForm({postId, parentId}) {
    const [content, setContent] = useState('')

    const handlePostComment = () => {
        postData('user/post-comment', {social_post_id: postId, parent_id: parentId, content: content})
        setContent('')
    }

    return (
        <>
            <div className="contact-input-box">
                <textarea
                    name="Message"
                    id="Meassage"
                    placeholder="Write Comments..."
                    value={content}
                    rows={2}
                    onChange={(event) => setContent(event.target.value)}
                />
                <div className="blog-details-submi-button">
                    <button type="button" className="mt-0" onClick={handlePostComment}>Post Comments</button>
                </div>
            </div>
        </>
    )
}