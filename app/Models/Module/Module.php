<?php

namespace App\Models\Module;

use App\Models\Module\Task\Task;
use App\Models\Users\ModuleAttendance;
use App\Models\Users\User;
use Database\Factories\ModuleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'thumbnail_url'
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'users_modules',
            'module_id',
            'user_id'
        )->using(ModuleAttendance::class)
            ->withPivot('status')
            ->withTimestamps();
    }

    protected static function newFactory(): ModuleFactory
    {
        return ModuleFactory::new();
    }
}
