<?php

namespace App\Http\Controllers\Client;

use App\Models\SocialPost;
use Illuminate\Http\Request;

class SocialPostController
{
    public function getSocialPost(Request $request)
    {
        $socialPost = SocialPost::orderBy('id', 'desc')->with('studentLessonHistory')->get();

        return response()->json($socialPost);
    }
}
