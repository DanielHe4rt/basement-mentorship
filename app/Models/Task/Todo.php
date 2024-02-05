<?php

namespace App\Models\Task;

use Database\Factories\TodoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    use HasFactory;

    protected $table = 'task_todos';

    protected $fillable = [
        'task_id',
        'description'
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    protected static function newFactory(): TodoFactory
    {
        return TodoFactory::new();
    }
}
