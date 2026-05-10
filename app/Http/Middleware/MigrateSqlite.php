<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MigrateSqlite
{
    public function handle(Request $request, Closure $next)
    {
        if (env('NATIVEPHP_RUNNING')) {
            try {
                if (\App\Models\Obra::count() === 0) {
                    Artisan::call('db:seed', ['--force' => true]);
                }
            } catch (\Exception $e) {
                // silencio
            }
        }
        return $next($request);
    }
}