import React, { useEffect, useState } from "react";
import Header from "../Commons/Header";
import Footer from "../Commons/Footer";
import Post from "./Partials/Post";
import useFetch from "../../hooks/useFetch";
import Pusher from 'pusher-js';
import { getData } from "../../utils/api";

export default function Network(options) {
  const [socialPost, setSocialPost] = useState([])

  const handleUpdatePost = (post) => {
    setSocialPost(prevState => [post, ...prevState])
  }

  useEffect(() => {
    // Initialize Pusher
    const pusher = new Pusher('1e0c9cef4c2faceaef9d', {
      cluster: 'ap1',
    });

    const channel = pusher.subscribe('social-channel');
    channel.bind('new-post', (data) => {
      handleUpdatePost(data.post)
    });

    return () => {
      channel.unbind_all();
      channel.unsubscribe();
    };
  }, []);

  useEffect(() => {
    (async () => {
      let data = await getData('user/social-post')
      setSocialPost(data)
    })()
  }, []);

  const updateLikePost = (post) => {
    const updatedPost = {...post, is_liked: !post.is_liked, like_count: post.is_liked ? (post.like_count - 1) : (post.like_count + 1)}
    setSocialPost(prevState => prevState.map(p => p.id === post.id ? updatedPost : p))
  }

  return (
    <>
      <Header />

      {
        socialPost && socialPost.map(post => {
          return <Post key={post.id} post={post} updateLikePost={updateLikePost} />
        })
      }

      <Footer />
    </>
  )
}