<?php

namespace App\Enums\Module;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ModuleAttendanceEnum: string implements HasLabel, HasColor
{
    case ON_HOLD = 'onhold';
    case ACCEPTED = 'accepted';
    case FINISHED = 'finished';


    public function getLabel(): ?string
    {
        return $this->value;
    }

    public function getColor(): string|array|null
    {
        return match($this) {
            self::ON_HOLD => 'warning',
            self::ACCEPTED => 'info',
            self::FINISHED => 'success',
        };
    }
}
