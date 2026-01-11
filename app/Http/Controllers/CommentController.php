<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use App\Http\Requests\StoreCommentRequest;

use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller

{

    /**

     * Display a listing of the resource.

     */

    public function index()

    {

        //

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

    public function store(StoreCommentRequest $request)

    {

        $post = \App\Models\Post::findOrFail($request->post_id);

        $this->authorize('create', Comment::class);

        $comment = new Comment();

        $comment->body = $request->body;

        $comment->post()->associate($post);

        $comment->user()->associate(\Illuminate\Support\Facades\Auth::user());

        $comment->save();

        return redirect()->route('post', $post);

    }

    /**

     * Display the specified resource.

     */

    public function show(Comment $comment)

    {

        //

    }

    /**

     * Show the form for editing the specified resource.

     */

    public function edit(Comment $comment)

    {

        //

    }

    /**

     * Update the specified resource in storage.

     */

    public function update(UpdateCommentRequest $request, Comment $comment)

    {

        //

    }

    /**

     * Remove the specified resource from storage.

     */

    public function destroy(Comment $comment)

    {

        $this->authorize('delete', $comment);

        $post = $comment->post;

        $comment->delete();

        return redirect()->route('post', $post);

    }
}
