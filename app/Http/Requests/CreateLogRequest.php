<?php

namespace App\Http\Requests;

use App\Services\Logger\Enums\LogLevel;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateLogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'client' => [
                'required',
                'string',
                'max:255',
            ],
            'datetime' => [
                'required',
                'date',
            ],
            'message' => [
                'required',
                'string',
            ],
            'level' => [
                'required',
                Rule::enum(LogLevel::class),
            ],
        ];
    }
}
