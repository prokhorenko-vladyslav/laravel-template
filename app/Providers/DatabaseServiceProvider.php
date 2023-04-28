<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\ServiceProvider;

class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        Builder::defaultMorphKeyType("uuid");
        Relation::enforceMorphMap([
            'user' => User::class
        ]);

        if ($this->app->runningInConsole()) {
            $this->loadMigrations();
        }
    }

    private function loadMigrations(): void
    {
        $folders = glob(database_path("migrations/*"), GLOB_ONLYDIR);
        $this->loadMigrationsFrom($folders);
    }
}
