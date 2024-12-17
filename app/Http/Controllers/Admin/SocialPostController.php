<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\SocialPost;
use App\Models\Admin\LessonHistory;
use App\Models\Admin\User;


class SocialPostController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $social_post = SocialPost::with('lesson_history','user')->get();
        return view('modules.social.index', [
            'social_post' => $social_post,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:social_posts,id',
            'status' => 'required|in:1,2', // Kiểm tra status là 1 hoặc 2
        ]);
    
        $post = SocialPost::find($validated['id']);
        $post->status = $validated['status']; // Cập nhật status
        $post->save();
    
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
