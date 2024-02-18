<?php

namespace App\Services;

use App\Enums\Task\TaskProgressStatusEnum;
use App\Models\Users\Progress;
use App\Repositories\TaskProgressRepository;

class TaskService
{
    public function __construct(private readonly TaskProgressRepository $repository)
    {
    }

    public function updateDraftTask(Progress $progress, array $payload): void
    {

        $this->repository->updateTask($progress, $payload);
        $this->repository->setProgress($progress, TaskProgressStatusEnum::Started);
    }

    public function sendTaskForReview(Progress $progress, array $payload): void
    {
        $this->repository->updateTask($progress, $payload);
        $this->repository->setProgress($progress, TaskProgressStatusEnum::Submitted);
    }
}
