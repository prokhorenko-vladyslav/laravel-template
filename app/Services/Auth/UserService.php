<?php

namespace App\Services\Auth;

use App\Models\User;

class UserService
{
    public function identifyByCodeAndEmail(string $email, string $code, CodeAction $codeAction): User|null
    {
        // TODO: Implement identifyByCodeAndEmail method
        return new User;
    }
}
