<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'nullable|string',
            'name' => 'nullable|string',
            'email' => 'nullable|unique:users|max:255',
            'group' => 'nullable|integer',
            'picture' => 'mimes:jpg,png,jpeg,gif'
        ];
    }
}
