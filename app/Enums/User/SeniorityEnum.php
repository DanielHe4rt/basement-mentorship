<?php

namespace App\Enums\User;

enum SeniorityEnum: string
{
    case Trainee = 'trainee';
    case Junior = 'junior';
    case Mid = 'mid';
    case Senior = 'senior';
    case Tech_Lead = 'tech-lead';
    case Staff = 'staff';
}
