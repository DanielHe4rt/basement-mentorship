<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Task\Progress;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'github_id',
        'github_username',
        'description',
        'email'
    ];

    public function tokens(): HasMany
    {
        return $this->hasMany(Token::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Progress::class, 'user_id');
    }

    public function modules(): BelongsToMany
    {
        return $this->belongsToMany(
            Module::class,
            'users_modules',
            'user_id',
            'module_id',
        );
    }

}
