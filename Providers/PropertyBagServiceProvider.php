<?php

namespace EFrame\PropertyBag\Providers;

use Illuminate\Support\ServiceProvider as IlluminateProvider;

class PropertyBagServiceProvider extends IlluminateProvider
{
    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Migrations/' => database_path('migrations'),
        ], 'migrations');
    }
}
