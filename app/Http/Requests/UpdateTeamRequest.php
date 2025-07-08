<?php

namespace App\Http\Requests;

use App\Enums\TeamDivisionEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTeamRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg, webp|max:4048',
            'division' => ['required', Rule::in(array_column(TeamDivisionEnum::cases(), 'value'))],
        ];
    }
}
