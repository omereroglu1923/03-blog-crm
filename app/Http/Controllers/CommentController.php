<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    use AuthorizesRequests;

    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'body' => ['required', 'string', 'max:2000'],
        ]);

        // 1) İlişki üzerinden yeni bir Comment nesnesi oluştur (henüz kaydetme),
        //    bu adım post_id'yi otomatik dolduruyor
        $comment = $post->comments()->make([
            'body' => $validated['body'],
        ]);

        // 2) İkinci belongsTo'yu (user) mass assignment'a hiç uğramadan bağla
        $comment->user()->associate($request->user());

        // 3) Şimdi veritabanına kaydet
        $comment->save();

        return redirect()->route('blog.show', $post);
    }

    public function destroy(Post $post, Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return redirect()->route('blog.show', $post);
    }
}
