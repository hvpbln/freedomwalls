<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FreedomWall</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <body>
  <header>
    <div class="nav-container">
      <div class="logo">freedomwall.</div>
      <nav>
        <a href="#">Home</a>
        <a href="#">Post</a>
        <a href="{{ route('login') }}" class="btn btn-primary">Admin Login</a>
      </nav>
    </div>
  </header>

  <main>
    <h1 class="brand-title">freedomwall.</h1>
  </main>
</body>


    <div class="post-box">
        <div class="header">
                  <h2 class="tagline">Write. Express. Be Heard.</h2>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <textarea name="content" rows="4" class="textarea" placeholder="Write your anonymous post..." required>{{ old('content') }}</textarea>
            @error('content')
                <p class="error-text">{{ $message }}</p>
            @enderror
            <button type="submit" class="btn btn-green">Submit</button>
        </form>


        <hr class="divider">

        <h2 class="subheading">Published Posts</h2>
        @forelse ($posts as $post)
            <div class="post">
                {{ $post->content }}
                <div class="post-meta">{{ $post->created_at->format('F j, Y g:i A') }}</div>
            </div>
        @empty
            <p>No accepted posts yet.</p>
        @endforelse

    </div>
</body>
</html>
