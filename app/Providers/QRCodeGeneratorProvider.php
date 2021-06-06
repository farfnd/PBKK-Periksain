<?php

namespace App\Providers;

use App\Services\SimpleQRService;
use Illuminate\Support\ServiceProvider;

class QRCodeGeneratorProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('SimpleQRService', SimpleQRService::class);
    }
}
