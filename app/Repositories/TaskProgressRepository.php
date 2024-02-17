<?php

namespace App\Repositories;

use App\Enums\Task\TaskProgressStatusEnum;
use App\Models\Task\Progress;

class TaskProgressRepository
{
    public function updateTask(Progress $progress, array $payload): void
    {
        $progress->update(['content' => $payload['content']]);
        if (isset($payload['todos'])) {
            $progress->todos()->sync(array_keys($payload['todos']));
        }
    }

    public function setProgress(Progress $progress, TaskProgressStatusEnum $enum): void
    {
        $progress->update(['status' => $enum->value]);
    }
}
