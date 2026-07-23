<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $posts = Post::whereNotNull('published_at')
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->input('search') . '%');
            })
            ->latest('published_at')
            ->get();

        return view('blog.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        $post->load('comments.user');

        return view('blog.show', ['post' => $post]);
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ]);

        $post = $request->user()->posts()->create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'body' => $validated['body'],
            'published_at' => now(), // şimdilik direkt yayınla, taslak akışı sonraki adımlarda eklenebilir
        ]);

        return redirect()->route('blog.show', $post);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('blog.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ]);

        // Not: slug bilinçli olarak güncellenmiyor (title değişse bile) — SEO/link kırılmasın diye
        $post->update([
            'title' => $validated['title'],
            'body' => $validated['body'],
        ]);

        return redirect()->route('blog.show', $post);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('blog.index');
    }
}
