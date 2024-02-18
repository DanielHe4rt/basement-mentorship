<?php

namespace App\Filament\Resources\ModuleAttendanceResource\Pages;

use App\Filament\Resources\ModuleAttendanceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditModuleAttendance extends EditRecord
{
    protected static string $resource = ModuleAttendanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
