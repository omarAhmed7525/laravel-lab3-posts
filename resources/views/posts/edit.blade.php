@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Post</h3>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}">
        @error('title') <span class="text-danger">{{ $message }}</span> @enderror

        <label>Description</label>
        <textarea name="description" class="form-control">{{ old('description', $post->description) }}</textarea>
        @error('description') <span class="text-danger">{{ $message }}</span> @enderror

        <label>Post Creator</label>
        <select name="user_id" class="form-control">
            @foreach ($users as $user)
                <option value="{{ $user->id }}" @selected($user->id == $post->user_id)>{{ $user->name }}</option>
            @endforeach
        </select>
        @error('user_id') <span class="text-danger">{{ $message }}</span> @enderror

        <button class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection
