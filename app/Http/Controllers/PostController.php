<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    /**
     * Yayınlanmış postları listele (blog ana sayfası).
     */
    public function index()
    {
        $posts = Post::whereNotNull('published_at')
            ->latest('published_at')
            ->get();

        return view('blog.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        // N+1 problemini önlemek için yorumları ve yazarlarını eager load ediyoruz
        $post->load('comments.user');

        return view('blog.show', ['post' => $post]);
    }
}
