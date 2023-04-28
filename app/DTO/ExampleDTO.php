<?php

namespace App\DTO;

use App\Contracts\DTO;
use Illuminate\Validation\Rules\Password;

readonly class ExampleDTO extends DTO
{
    private function __construct(
        public string $email,
        public string $code,
        public string $password
    ) {}

    protected static function build(array $data): static
    {
        return new static(
            $data["email"],
            $data["code"],
            $data["password"]
        );
    }

    protected static function rules(): array
    {
        return [
            "email" => [ "required", "string", "email", "max:255" ],
            "code" => [ "required", "string" ],
            "password" => [
                "required", "string", "confirmed",
                Password::min(8)->mixedCase()->numbers()
            ]
        ];
    }

    protected static function messages(): array
    {
        return [
            "email.required" => __("Email is required")
        ];
    }
}
