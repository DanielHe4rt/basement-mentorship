<?php

namespace App\Enums\User;

enum PronounEnum: string
{
    case HE_HIM = 'he/him';
    case SHE_HER = 'she/her';
    case THEY_THEM = 'they/them';
    case OTHER = 'other';
}
