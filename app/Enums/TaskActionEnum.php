<?php

namespace App\Enums;

enum TaskActionEnum: string
{
    case Draft = 'draft';
    case Submit = 'submit';

    case Done = 'completed';
}
