<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    public function register()
    {
        require base_path("helpers/common.php");
        require base_path("helpers/auth.php");
        require base_path("helpers/responses.php");
    }
}
