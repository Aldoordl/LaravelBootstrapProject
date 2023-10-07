<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BootstrapRequest extends FormRequest
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
            'name' => 'required|string|max:20',
            'email' => 'required|email',
            'message' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            // 'name.required' => 'Harap isi nama.',
            // 'email.required' => 'Harap isi email.',
            // 'message.required' => 'Harap isi pesan.',
        ];
    }
}
