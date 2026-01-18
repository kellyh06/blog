<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        $post = \App\Models\Post::findOrFail($request->input('post_id'));

        $comment = $post->comments()->create([
            'body' => $request->validated()['body'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('post', $post)->with('success', 'Comment added successfully.');
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        if (!Gate::allows('update', $comment)) {
            abort(403);
        }

        $comment->update($request->validated());

        return redirect()->route('post', $comment->post)->with('success', 'Comment updated successfully.');
    }

    public function destroy(Comment $comment)
    {
        if (!Gate::allows('delete', $comment)) {
            abort(403);
        }

        $post = $comment->post;
        $comment->delete();

        return redirect()->route('post', $post)->with('success', 'Comment deleted successfully.');
    }
}
