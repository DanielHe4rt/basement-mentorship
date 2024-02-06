<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detail extends Model
{
    protected $table = 'user_details';

    protected $fillable = [
        'user_id',
        'company',
        'role',
        'seniority',
        'based_in',
        'pronoums',
        'twitter_handle',
        'devto_handle',
        'comments',
        'is_employed',
        'switching_career',
    ];

    protected $casts = [
        'is_employed' => 'boolean',
        'switching_career' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }



}
