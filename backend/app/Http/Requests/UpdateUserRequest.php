<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest {

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        $user_id = $this->route("user") ? $this->route("user")->id : $this->route("id");

        return [
            "name" => ["sometimes", "required", "string", "max:255"],
            "email" => [
                "sometimes",
                "required",
                "email",
                Rule::unique("users")->ignore($user_id),
            ],
            "password" => ["sometimes", "nullable", "string", "min:8", "confirmed"],
        ];
    }
}
