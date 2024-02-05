<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StartTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
}
