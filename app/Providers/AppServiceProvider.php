<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Listeners\MigrateDatabase;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

   
   public function boot(): void
    {
        if (env('NATIVEPHP_RUNNING')) {
            $dbPath = env('DB_DATABASE');
            config(['database.default' => 'sqlite']);
            config(['database.connections.sqlite.database' => $dbPath]);
        }
    }
    
}