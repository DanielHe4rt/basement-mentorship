<?php

namespace App\Models\Task;

use Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'title',
        'thumbnail_url',
        'description',
        'deadline',
        'order',
        'tips'
    ];

    protected $casts = [
        'tips' => 'array'
    ];

    public function todos(): HasMany
    {
        return $this->hasMany(Todo::class);
    }

    public function progress(): HasMany
    {
        return $this->hasMany(Progress::class);
    }

    protected static function newFactory(): TaskFactory
    {
        return TaskFactory::new();
    }
}
