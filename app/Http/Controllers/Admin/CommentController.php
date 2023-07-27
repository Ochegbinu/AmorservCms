<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Content;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments.index', compact('comments'));
    }

    public function create()
    {
        $contents = Content::all(); // Assuming you have a "Content" model for the content items.
        return view('admin.comments.create', compact('contents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content_id' => 'required|exists:contents,id',
            'body' => 'required|string',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'content_id' => $request->input('content_id'),
            'body' => $request->input('body'),
        ]);

        return redirect()->route('comments.index')->with('success', 'Comment created successfully.');
    }

    public function edit(Comment $comment)
    {
        return view('admin.comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        $comment->update([
            'body' => $request->input('body'),
        ]);

        return redirect()->route('comments.index')->with('success', 'Comment updated successfully.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
    }
}
