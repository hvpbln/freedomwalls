<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Pending & Accepted Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 min-h-screen">

    {{-- Navbar --}}
    <nav class="bg-[#2b6b6d] text-white px-6 py-4 flex justify-between items-center">
        <div class="text-2xl font-bold">freedomwall.</div>
        <ul class="flex space-x-6 text-sm">
            <li><a href="#" class="font-semibold border-b-2 border-white">admin page.</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-white hover:underline bg-transparent border-none p-0 m-0 cursor-pointer">
                        Log Out
                    </button>
                </form>
            </li>

        </ul>
    </nav>

    <div class="max-w-4xl mx-auto mt-10 px-4">

        {{-- Pending Posts Header --}}
        <h1 class="text-5xl font-serif font-bold text-[#0f365e] mb-6 text-center">Pending Posts</h1>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Pending Posts --}}
        @forelse ($pendingPosts as $post)
            <div class="bg-white border border-black rounded-lg p-6 mb-6 shadow">
                <p class="text-lg mb-2">{{ $post->content }}</p>
                <div class="text-sm text-gray-600 mb-4">{{ $post->created_at->format('F j, Y g:i A') }}</div>

                <div class="flex gap-3">
                    <form action="{{ route('posts.accept', $post->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-[#0f365e] text-white px-4 py-2 rounded-full hover:bg-[#0c2f50] transition">Accept</button>
                    </form>
                    <form action="{{ route('posts.decline', $post->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transition">Decline</button>
                    </form>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded-full hover:bg-gray-700 transition">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-600 mb-8">No pending posts.</p>
        @endforelse

        <hr class="my-12 border-black">

        {{-- Accepted Posts Header --}}
        <h1 class="text-5xl font-serif font-bold text-[#0f365e] mb-6 text-center">Accepted Posts</h1>

        {{-- Accepted Posts --}}
        @forelse ($acceptedPosts as $post)
            <div class="bg-white border border-black rounded-lg p-6 mb-6 shadow">
                <p class="text-lg mb-2">{{ $post->content }}</p>
                <div class="text-sm text-gray-600 mb-4">{{ $post->created_at->diffForHumans() }}</div>

                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded-full hover:bg-gray-700 transition">Delete</button>
                </form>
            </div>
        @empty
            <p class="text-center text-gray-600 mb-8">No accepted posts.</p>
        @endforelse

        {{-- View Declined Posts --}}
        <div class="text-center mt-10">
            <a href="{{ route('posts.declined') }}" class="bg-red-600 text-white px-6 py-3 rounded-full hover:bg-red-700 transition">View Declined Posts</a>
        </div>
    </div>
</body>
</html>
