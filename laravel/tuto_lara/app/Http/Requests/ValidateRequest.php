<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;  //change true for auth
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|max:20|min:3",
            "email" => "required",
            "password" => "required|numeric|min:5|same:passwordsec",
            "passwordsec" => "required|numeric|same:password",
            "message" => "required|max:255|min:3",
            "language" => "required",
            "gender" => "required",
            "lvl" => "required",
        ];
    }
    public function message()
    {
        return [
            "name.required" => "Поле name является обязательным для заполнения.",
            "password.numeric" => "Password must be numeric type and min:3 and max:20 only!",
        ];
    }
}
