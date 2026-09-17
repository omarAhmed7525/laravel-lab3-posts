@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Create Post</h3>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        @error('title') <span class="text-danger">{{ $message }}</span> @enderror

        <label>Description</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        @error('description') <span class="text-danger">{{ $message }}</span> @enderror

        <label>Post Creator</label>
        <select name="user_id" class="form-control">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        @error('user_id') <span class="text-danger">{{ $message }}</span> @enderror

        <button class="btn btn-success mt-2">Create</button>
    </form>
</div>
@endsection
