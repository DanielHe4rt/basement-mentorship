<?php

namespace App\Models\Users;

use App\Enums\User\PronounEnum;
use App\Enums\User\SeniorityEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Details extends Model
{
    use HasFactory;


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
