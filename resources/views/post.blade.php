@extends('partials.layout')

@section('title', $post->title)

@section('content')

@include('partials.post-card', ['full' => true])

@auth
<div class="card bg-base-200 shadow-sm my-4">
    <div class="card-body">
        <h3 class="card-title text-lg">Add a Comment</h3>
        <form action="{{ route('comment.store', $post) }}" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <textarea name="body" class="textarea textarea-bordered w-full" placeholder="Share your thoughts..." required></textarea>
            @error('body')
                <span class="text-error text-sm">{{ $message }}</span>
            @enderror
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Post Comment</button>
            </div>
        </form>
    </div>
</div>
@endauth

<div class="mt-6">
    <h3 class="text-2xl font-bold mb-4">Comments ({{ $post->comments->count() }})</h3>

    @forelse ($post->comments as $comment)
    <div class="card bg-base-300 shadow-sm my-3">
        <div class="card-body">
            <div class="flex justify-between items-start">
                <div>
                    <p class="font-semibold">{{ $comment->user->name }}</p>
                    <p class="text-sm text-base-content/50">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
                @can('delete', $comment)
                <form action="{{ route('comment.destroy', $comment) }}" method="POST" onsubmit="return confirm('Delete this comment?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-ghost text-error">Delete</button>
                </form>
                @endcan
            </div>
            <p class="mt-2">{{ $comment->body }}</p>
        </div>
    </div>
    @empty
    <div class="alert">
        <p>No comments yet. Be the first to comment!</p>
    </div>
    @endforelse
</div>

@endsection
