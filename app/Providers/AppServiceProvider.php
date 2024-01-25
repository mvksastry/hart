<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Schema;
use Laravel\Telescope\Telescope;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        //
        //Telescope::ignoreMigrations();
      if ($this->app->environment('local')) {
        $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
        $this->app->register(TelescopeServiceProvider::class);
      }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Database String Length
        Schema::defaultStringLength(191);
    }
}
