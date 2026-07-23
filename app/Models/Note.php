<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    protected $fillable = [
        'body',
    ];

    // Bu not hangi müşteriyle ilgili
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    // Bu notu kim yazdı
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}