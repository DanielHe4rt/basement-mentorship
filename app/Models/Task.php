<?php

namespace App\Models;

use Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'title',
        'thumbnail_url',
        'description',
        'deadline',
    ];

    protected static function newFactory(): TaskFactory
    {
        return TaskFactory::new();
    }
}
