<?php

namespace App\Models\Task;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Progress extends Model
{

    protected $table = 'user_tasks_progress';

    protected $fillable = [
        'user_id',
        'task_id',
        'status',
        'content',
        'feedback',
        'delivered_at'
    ];

    protected $casts = [
        'delivered_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function todos(): BelongsToMany
    {
        return $this->belongsToMany(
            Todo::class,
            'task_progress_todos',
            'task_progress_id',
            'task_todo_id'
        );
    }
}
