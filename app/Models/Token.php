<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Token extends Model
{
    protected $table = 'user_tokens';

    protected $fillable = [
        'user_id',
        'access_token',
        'refresh_token'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
