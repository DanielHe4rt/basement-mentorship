<?php

namespace App\Http\Requests;

use App\Enums\User\BasedPlaceEnum;
use App\Enums\User\JobRoleEnum;
use App\Enums\User\PronounEnum;
use App\Enums\User\SeniorityEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreOnboardRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'company' => ['nullable', 'string'],
            'role' => ['required',  new Enum(JobRoleEnum::class)],
            'seniority' => ['required', new Enum(SeniorityEnum::class)],
            'based_in' => ['required', new Enum(BasedPlaceEnum::class)],
            'pronouns' => ['required', new Enum(PronounEnum::class)],
            'twitter_handle' => ['required', 'string'],
            'devto_handle' => ['required', 'string'],
            'comments' => ['nullable', 'string'],
            'is_employed' => ['required', 'boolean'],
            'switching_career' => ['required', 'boolean']
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge(['is_employed' => $this->has('is_employed')]);
        $this->merge(['switching_career' => $this->has('switching_career')]);
    }
}
