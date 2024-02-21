<?php

namespace App\Services;

use App\Enums\Task\TaskProgressStatusEnum;
use App\Models\Users\Progress;
use App\Repositories\TaskProgressRepository;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;

class TaskService
{
    public function __construct(private readonly TaskProgressRepository $repository)
    {
    }

    public function updateDraftTask(Progress $progress, array $payload): void
    {
        Notification::make()
            ->title('Rascunho salvo')
            ->info()
            ->body(sprintf('O %s salvou um rascunho, deseja visualizar?', $progress->user->name))
            ->actions([
                Action::make('Visualizar',)
                    ->button()
                    ->url('https://google.com'),
            ])
            ->sendToDatabase(auth()->user());

        $this->repository->updateTask($progress, $payload);
        $this->repository->setProgress($progress, TaskProgressStatusEnum::Started);
    }

    public function sendTaskForReview(Progress $progress, array $payload): void
    {
        Notification::make()
            ->title('Submissão Recebida')
            ->warning()
            ->body(sprintf('Mentorado %s submeteu a tarefa, deseja visualizar?', $progress->user->name))
            ->actions([
                Action::make('Visualizar')
                    ->button()
                    ->url('https://google.com'),
            ])
            ->sendToDatabase(auth()->user());
        $this->repository->updateTask($progress, $payload);
        $this->repository->setProgress($progress, TaskProgressStatusEnum::Submitted);
    }
}
