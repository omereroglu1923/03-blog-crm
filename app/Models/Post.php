<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    // Toplu atamaya izin verilen alanlar (mass assignment koruması)
    protected $fillable = [
        'title',
        'slug',
        'body',
        'published_at',
    ];

    /**
     * Hangi alanlar hangi tipe otomatik dönüştürülsün.
     * "published_at" veritabanından string gelir, bunu Carbon
     * (tarih) nesnesine çevirmezsek üzerinde format() gibi
     * metotlar çağıramayız.
     */
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    // Bu post hangi kullanıcıya ait
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
