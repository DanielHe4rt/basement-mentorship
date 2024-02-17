<?php

namespace App\Pivots;

use App\Enums\Module\ModuleAttendanceEnum;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ModuleAttendancePivot extends Pivot
{
    protected $casts = [
        'status' => ModuleAttendanceEnum::class
    ];
}
