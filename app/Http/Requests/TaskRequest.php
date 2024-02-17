<?php

namespace App\Http\Requests;

use App\Enums\Task\TaskProgressStatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        $enabledStatuses = [
            TaskProgressStatusEnum::Started,
            TaskProgressStatusEnum::Need_Improvements
        ];

        return in_array($this->progress->status, $enabledStatuses);
    }

    public function rules(): array
    {
        return [
            'content' => ['nullable', 'string'],
            'todos' => ['nullable', 'array']
        ];
    }
}
