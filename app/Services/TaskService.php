<?php

namespace App\Services;

use App\Models\Task\Progress;

class TaskService
{

    public function updateDraftTask(Progress $progress, array $payload): void
    {
        $progress->update(['content' => $payload['content']]);
        if (isset($payload['todos'])) {
            $progress->todos()->sync(array_keys($payload['todos']));
        }
    }

    public function sendTaskForReview(Progress $progress, array $payload)
    {
        dd(1);
    }
}
