<?php

namespace App\Http\Requests\Modules;

use Illuminate\Foundation\Http\FormRequest;

class ShowModuleRequest extends FormRequest
{
    public function authorize()
    {
        return request()
            ->user()
            ->modules()
            ->find($this->route('module'));
    }

    public function rules(): array
    {
        return [];
    }
}
