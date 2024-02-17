<?php

namespace App\Enums\Task;

enum TaskProgressStatusEnum: string
{
    case Started = 'started';

    case Submitted = 'submitted';

    case Completed = 'completed';

    public function getMessage(): string
    {
        return match ($this) {
            self::Started => "Não Enviado",
            self::Submitted => "Aguardando Revisão",
            self::Completed => "Atividade Aceita",
        };
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::Started => 'secondary',
            self::Submitted => 'warning',
            self::Completed => 'success',
        };
    }
}
