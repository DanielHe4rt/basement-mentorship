<?php

namespace App\Models\Task;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    protected $table = 'task_todos';

    protected $fillable = [
        'task_id',
        'description'
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
