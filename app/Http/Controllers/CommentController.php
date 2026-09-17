<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'body' => 'required|min:3',
            'user_id' => 'required|exists:users,id',
        ]);

        Comment::create([
            'body' => $request->body,
            'user_id' => $request->user_id,
            'commentable_id' => $postId,
            'commentable_type' => Post::class,
        ]);

        return redirect()->route('posts.show', $postId);
    }
}
