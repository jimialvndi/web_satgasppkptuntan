<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArtikelRequest extends FormRequest
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
            'slug' => 'required|string|max:255',
            'writer' => 'required|string|max:255',
            'content' => 'required|string|max:65535',
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ];
    }
}
