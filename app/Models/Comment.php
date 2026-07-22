<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'body',
    ];

    // Bu yorum hangi post'a ait
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    // Bu yorumu kim yazdı
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}