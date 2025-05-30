@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="header">
        <h1 class="title">Declined Posts</h1>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @forelse ($posts as $post)
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
        <p>No declined posts.</p>
    @endforelse

    <a href="{{ route('admin.posts') }}" class="btn btn-primary">Back to Pending</a>
</div>
@endsection
