import React, { useEffect, useState } from "react";
import { postData } from "../../../utils/api";
import { Filter } from "bad-words";

export default function PostCommentForm({ postId, parentId }) {
    const [content, setContent] = useState("");
    const vietnameseBadWords = ["lồn", "lol", "cặc", "địt", "đỉ", "cằc", "đụ"];
    const filter = new Filter();
    filter.addWords(...vietnameseBadWords);
    // console.log(filter.list);

    const handlePostComment = () => {
        // Kiểm tra nội dung bình luận có chứa từ thô tục không
        if (filter.isProfane(content)) {
            alert("Your comment contains inappropriate language.");
        } else {
            postData("user/post-comment", {
                social_post_id: postId,
                parent_id: parentId,
                content: content,
            });
            setContent("");
        }
    };

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
                    <button
                        type="button"
                        className="mt-0"
                        onClick={handlePostComment}
                    >
                        Post Comments
                    </button>
                </div>
            </div>
        </>
    );
}
