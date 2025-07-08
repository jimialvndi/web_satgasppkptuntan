<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMaterialRequest extends FormRequest
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
            //
            'tittle' => 'required|string|max:255',
            'icon_path' => 'sometimes|image|mimes:jpg,png,jpeg,gif,sv',
            'unduh_link' => 'sometimes|string|max:255',
        ];
    }
}
