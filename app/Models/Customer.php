<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
    ];

    // Bu müşteriyi hangi kullanıcı ekledi
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
