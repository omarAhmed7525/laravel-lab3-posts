@extends('layouts.app')

@section('content')
<div class="container">
    <h3>All Posts</h3>
    <a href="{{ route('posts.create') }}" style="background:#198754;color:#fff;padding:6px 14px;border-radius:4px;text-decoration:none;display:inline-block;margin-bottom:15px;">Create Post</a>

    <table class="table" border="1" cellpadding="8" style="width:100%;border-collapse:collapse;">
        <thead>
            <tr>
                <th>Title</th>
                <th>Creator</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->created_at->format('l jS \o\f F Y h:i:s A') }}</td>
                <td>
                    @if ($post->trashed())
                        <form action="{{ route('posts.restore', $post->id) }}" method="POST" style="display:inline">
                            @csrf
                            <button style="background:#ffc107;color:#000;padding:5px 12px;border:none;border-radius:4px;">Restore</button>
                        </form>
                    @else
                        <a href="{{ route('posts.show', $post->id) }}" style="background:#28a745;color:#fff;padding:5px 12px;border-radius:4px;text-decoration:none;display:inline-block;">Show</a>
                        <a href="{{ route('posts.edit', $post->id) }}" style="background:#ffc107;color:#000;padding:5px 12px;border-radius:4px;text-decoration:none;display:inline-block;">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button style="background:#dc3545;color:#fff;padding:5px 12px;border:none;border-radius:4px;">Delete</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
</div>
@endsection