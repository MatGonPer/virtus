<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest {

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            "name" => ["required", "string", "max:255"],

            "email" => [
                "required",
                "string",
                "email",
                "max:255",
                "unique:users"
            ],

            "password" => [
                "required",
                "confirmed",
                Password::defaults(),
            ],
        ];
    }

    public function messages(): array {
        return [
            "email.unique" => "Este e-mail já está em uso.",
            "password.confirmed" => "As senhas não conferem.",
            "required" => "O campo :attribute é obrigatório.",
        ];
    }
}
