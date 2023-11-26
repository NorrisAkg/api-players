<?php

namespace App\Core\Players\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePlayerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstname'     => 'required|string',
            'lastname'      => 'required|string',
            'jersey_number' => 'required|numeric',
            'picture'       => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:4000',
        ];
    }
}
