<?php

namespace App\Filament\Resources\ModuleAttendanceResource\Actions;


use App\Enums\Module\ModuleAttendanceEnum;
use App\Mail\MenteeAccepted;
use App\Models\Users\ModuleAttendance;
use Filament\Actions\Concerns\CanCustomizeProcess;
use Filament\Support\Facades\FilamentIcon;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;

class AttendanceApprovalAction extends Action
{
    use CanCustomizeProcess;
    public static function getDefaultName(): ?string
    {
        return 'approve';
    }

    public function setUp(): void
    {
        parent::setUp();


        $this->color('success');
        $this->icon(FilamentIcon::resolve('actions::edit-action') ?? 'heroicon-m-pencil-square');
        $this->successNotificationTitle(__('filament-actions::edit.single.notifications.saved.title'));

        $this->action(function (): void {
            $this->process(function (array $data, ModuleAttendance $record, Table $table) {
                $deniedStatuses = [
                    ModuleAttendanceEnum::ACCEPTED,
                    ModuleAttendanceEnum::FINISHED
                ];

                if (in_array($record->status, $deniedStatuses)) {
                    return;
                }

                $record->accept();
                Mail::to('idanielreiss@gmail.com')->send(new MenteeAccepted(
                    module: $record->module,
                    user: $record->user
                ));

                $this->success();
            });
        });
    }
}
