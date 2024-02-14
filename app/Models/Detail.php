<?php

namespace App\Models;

use App\Enums\PronounEnum;
use App\Enums\SeniorityEnum;
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
        'pronouns',
        'twitter_handle',
        'devto_handle',
        'comments',
        'is_employed',
        'switching_career',
    ];

    protected $casts = [
        'is_employed' => 'boolean',
        'switching_career' => 'boolean',
        'pronouns' => PronounEnum::class,
        'seniority' => SeniorityEnum::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }



}
