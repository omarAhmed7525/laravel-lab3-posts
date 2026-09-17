@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-header">Post Info</div>
        <div class="card-body">
            <p><b>Title :-</b> {{ $post->title }}</p>
            <p><b>Description :-</b><br>{{ $post->description }}</p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">Post Creator Info</div>
        <div class="card-body">
            <p><b>Name :-</b> {{ $post->user->name }}</p>
            <p><b>Email :-</b> {{ $post->user->email }}</p>
            <p><b>Created At :-</b> {{ $post->created_at->format('l jS \o\f F Y h:i:s A') }}</p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">Comments</div>
        <div class="card-body">
            @forelse ($post->comments as $comment)
                <p><b>{{ $comment->user->name }}:</b> {{ $comment->body }}</p>
            @empty
                <p>No comments yet.</p>
            @endforelse

            <hr>

            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf
                <label>Add a comment</label>
                <textarea name="body" class="form-control"></textarea>

                <label>Your name</label>
                <select name="user_id" class="form-control">
                    @foreach (\App\Models\User::all() as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>

                <button class="btn btn-primary mt-2">Add Comment</button>
            </form>
        </div>
    </div>
</div>
@endsection
