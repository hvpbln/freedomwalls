<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::where('status', 'accepted')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function store(Request $request) {
        $request->validate([
            'content' => 'required|string|max:2000',
        ]);

        Post::create([
            'content' => $request->content,
        ]);

        return redirect('/')->with('success', 'Post submitted for review!');
    }

    public function adminIndex() {
        return view('admin.posts', [
            'pendingPosts' => Post::where('status', 'pending')->latest()->get(),
            'acceptedPosts' => Post::where('status', 'accepted')->latest()->get(),
        ]);
    }

    public function accept($id) {
        $post = Post::findOrFail($id);
        $post->update(['status' => 'accepted']);
        return back()->with('success', 'Post accepted.');
    }

    public function decline($id) {
        $post = Post::findOrFail($id);
        $post->update(['status' => 'declined']);
        return back()->with('success', 'Post declined.');
    }

    public function destroy($id) {
        Post::findOrFail($id)->delete();
        return back()->with('success', 'Post deleted.');
    }

    public function declined() {
        $posts = Post::where('status', 'declined')->latest()->get();
        return view('admin.declined', compact('posts'));
    }
}
