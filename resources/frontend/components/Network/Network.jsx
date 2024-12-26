import React from "react";
import Header from "../Commons/Header";
import Footer from "../Commons/Footer";
import Post from "./Partials/Post";
import useFetch from "../../hooks/useFetch";

export default function Network(options) {
  const socialPost = useFetch('user/social-post')

  return (
    <>
      <Header />

      {
        socialPost && socialPost.map(post => {
          return <Post key={post._id} post={post} />
        })
      }

      <Footer />
    </>
  )
}