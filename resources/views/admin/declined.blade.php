<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Declined Posts</title>
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

        {{-- Header --}}
        <h1 class="text-5xl font-serif font-bold text-[#0f365e] mb-6 text-center">Declined Posts</h1>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Declined Posts --}}
        @forelse ($posts as $post)
            <div class="bg-white border border-black rounded-lg p-6 mb-6 shadow">
                <p class="text-lg mb-2">{{ $post->content }}</p>
                <div class="text-sm text-gray-600 mb-4">{{ $post->created_at->format('F j, Y g:i A') }}</div>

                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-full hover:bg-red-700 transition">
                        Delete
                    </button>
                </form>
            </div>
        @empty
            <p class="text-center text-gray-600 mb-8">No declined posts.</p>
        @endforelse

        {{-- Back to Pending --}}
        <div class="text-center mt-10">
            <a href="{{ route('admin.posts') }}" class="bg-[#0f365e] text-white px-6 py-3 rounded-full hover:bg-[#0c2f50] transition">
                Back to Pending
            </a>
        </div>
    </div>
</body>
</html>
