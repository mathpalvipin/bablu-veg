<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
   
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    public function register()
{
    //check that app is local
    if (!$this->app->isLocal()) {
        //else register your services you require for production
        $this->app['request']->server->set('HTTPS', true);
    }
}
}
