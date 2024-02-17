<?php

namespace App\Enums;

enum ModuleAttendanceEnum: string
{
    case ON_HOLD = 'onhold';
    case ACCEPTED = 'accepted';
    case FINISHED = 'finished';

}
