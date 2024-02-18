<?php

namespace App\Models\Users;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Auth\Token;
use App\Models\Module\Module;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser
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
        'email',
        'onboarded',
        'password'
    ];

    protected $casts = [
        'onboarded' => 'boolean',
        'github_id' => 'int'
    ];

    public function getImageUrlAttribute(): string
    {
        return "https://avatars.githubusercontent.com/u/{$this->github_id}";
    }

    public function tokens(): HasMany
    {
        return $this->hasMany(Token::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Progress::class, 'user_id');
    }

    public function details(): HasOne
    {
        return $this->hasOne(Details::class);
    }

    public function modules(): BelongsToMany
    {
        return $this->belongsToMany(
            Module::class,
            'users_modules',
            'user_id',
            'module_id',
        )->using(ModuleAttendance::class)
            ->withPivot('status')
            ->withTimestamps();
    }

    public function onboard(array $payload): void
    {
        $this->details()->updateOrCreate($payload);
        $this->update(['onboarded'=> true]);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }
}
