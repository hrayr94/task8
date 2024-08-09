<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mapRoutes();
    }

    protected function mapRoutes(): void
    {
        $adminPrefix = config('routes.admin_prefix', 'admin');

        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        Route::middleware('web')
            ->group(function () use ($adminPrefix) {
                Route::prefix($adminPrefix)
                    ->group(base_path('routes/admin.php'));
            });

        Route::middleware('web')
            ->group(function () {
                require base_path('routes/console.php');
            });
    }
}
