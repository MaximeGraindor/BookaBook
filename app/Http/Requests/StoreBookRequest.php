<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'cover' => 'required|image|mimes:jpeg,png|max:2000',
            'title' => 'required|string',
            'isbn' => 'required|unique:books|string|min:10',
            'required' => 'required',
            'publicPrice' => ['required','regex:/^(?:[1-9]\d+|\d)(?:\.\d\d)?$/'],
            'studentPrice' => ['required', 'regex:/^(?:[1-9]\d+|\d)(?:\.\d\d)?$/'],
            'publisher' => 'required',
            'publishingDetails' => 'nullable'
        ];
    }
}
