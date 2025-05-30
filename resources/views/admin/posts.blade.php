@extends('layouts.admin')

@section('content')
<div class="container">

    {{-- Header --}}
    <div class="header">
        <h1 class="title">Pending Posts</h1>
    </div>

    {{-- Flash message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Pending Posts --}}
    @forelse ($pendingPosts as $post)
        <div class="post-card">
            <p>{{ $post->content }}</p>
            <div class="post-meta">{{ $post->created_at->diffForHumans() }}</div>

            <div class="post-actions">
                <form action="{{ route('posts.accept', $post->id) }}" method="POST" style="display:inline-block">
                    @csrf
                    <button type="submit" class="btn btn-success">Accept</button>
                </form>
                <form action="{{ route('posts.decline', $post->id) }}" method="POST" style="display:inline-block">
                    @csrf
                    <button type="submit" class="btn btn-warning">Decline</button>
                </form>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <p>No pending posts.</p>
    @endforelse

    {{-- Accepted Posts --}}
    <hr style="margin: 2rem 0;">
    <div class="header">
        <h1 class="title">Accepted Posts</h1>
    </div>

    @forelse ($acceptedPosts as $post)
        <div class="post-card">
            <p>{{ $post->content }}</p>
            <div class="post-meta">{{ $post->created_at->diffForHumans() }}</div>

            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="post-actions">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    @empty
        <p>No accepted posts.</p>
    @endforelse

    <a href="{{ route('posts.declined') }}" class="btn btn-danger">View Declined Posts</a>

</div>
@endsection