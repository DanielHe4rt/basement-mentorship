<?php

namespace App\Models\Users;

use App\Enums\Module\ModuleAttendanceEnum;
use App\Models\Module\Module;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ModuleAttendance extends Pivot
{
    protected $table = 'users_modules';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    protected $casts = [
        'status' => ModuleAttendanceEnum::class
    ];
}
