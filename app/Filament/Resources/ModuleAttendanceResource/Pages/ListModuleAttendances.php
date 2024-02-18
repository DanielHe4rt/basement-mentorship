<?php

namespace App\Filament\Resources\ModuleAttendanceResource\Pages;

use App\Enums\Module\ModuleAttendanceEnum;
use App\Filament\Resources\ModuleAttendanceResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListModuleAttendances extends ListRecords
{
    protected static string $resource = ModuleAttendanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        $tabs = [null => Tab::make('All')];

        foreach (ModuleAttendanceEnum::cases() as $attendanceEnum) {
            $tabs[$attendanceEnum->value] = Tab::make()->query(fn($query) => $query->where('status', $attendanceEnum->value));
        }

        return $tabs;
    }
}
