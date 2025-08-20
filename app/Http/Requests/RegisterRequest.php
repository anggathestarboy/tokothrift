<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        'user_username' => 'required|max:150',
        'user_password' => 'required|max:150',
        'user_fullname' => 'required|max:150',
        'user_alamat' => 'required|max:150',
        'user_nohp' => 'required|max:13',
        'user_email' => 'required',

    ];
}
}
