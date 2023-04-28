<?php

namespace App\Contracts;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use LogicException;

abstract readonly class DTO
{
    /**
     * @throws ValidationException
     */
    public static function make(array $data): static
    {
        static::validate($data);
        return static::build($data);
    }

    /**
     * @throws ValidationException
     */
    protected static function validate(array $data): void
    {
        Validator::make($data, static::rules(), static::messages())->validate();
    }

    protected static function build(array $data): static
    {
        throw new LogicException(__("Abstract DTO class can't build it's own instance"));
    }

    protected static function rules(): array
    {
        return [];
    }

    protected static function messages(): array
    {
        return [];
    }
}
