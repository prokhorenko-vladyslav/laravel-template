<?php

use App\Models\User;

if (!function_exists("user")) {
    function user(): User|null
    {
        return auth()->user();
    }
}

if (!function_exists("token")) {
    function token(): string|null
    {
        return request()->input("token");
    }
}
