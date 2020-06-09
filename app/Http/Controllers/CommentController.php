<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('allComments');
    }

    public function allComments($id)
    {
        $comments = Comment::with('user')->where('film_id', $id)->orderBy('created_at', 'desc')->get();
        return $comments;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $film_id)
    {
        $request->validate([
            'comment_body' => 'required'
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->film_id = $film_id;
        $comment->comment_body = $request->comment_body;
        $comment->save();
        return back()->with('success', 'Comment saved');
    }
}
