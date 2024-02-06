<?php

namespace App\Http\Requests;

use App\Enums\BasedPlaceEnum;
use App\Enums\JobRoleEnum;
use App\Enums\PronoumEnum;
use App\Enums\SeniorityEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreOnboardRequest extends FormRequest
{

    public function rules()
    {
        // array instead pipes
        return [
            'company' => ['nullable', 'string'],
            'role' => ['required',  new Enum(JobRoleEnum::class)],
            'seniority' => ['required', new Enum(SeniorityEnum::class)],
            'based_in' => ['required', new Enum(BasedPlaceEnum::class)],
            'pronoums' => ['required', new Enum(PronoumEnum::class)],
            'twitter_handle' => ['required', 'string'],
            'devto_handle' => ['required', 'string'],
            'comments' => ['nullable', 'string'],
            'is_employed' => ['required', 'boolean'],
            'switching_career' => ['required', 'boolean']
        ];
    }
}
