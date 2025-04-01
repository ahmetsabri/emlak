<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $comments = Comment::latest()->with('user')->paginate();

        return view('admin.comments.index', compact('comments'));
    }

    public function store(StoreCommentRequest $request)
    {
        Comment::create($request->validated());

        return back()->with('success', 'success');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('success', 'success');
    }

    public function toggleStatus(Comment $comment)
    {
        $comment->update(['status' => ! $comment->status]);

        return response()->json(['msg' => 'success']);
    }

    public function show(User $user)
    {
        $comments = Comment::where('user_id', $user->id)->where('status', 1)->paginate(10);

        return response()->json($comments);
    }

}
