<?php

namespace EFrame\PropertyBag\Providers;

use EFrame\PropertyBag\Console\PropertyBagTableCommand;
use Illuminate\Support\ServiceProvider as IlluminateProvider;

class PropertyBagServiceProvider extends IlluminateProvider
{
    /**
     * Register the application services
     */
    public function register()
    {
        $this->registerCommands();
    }

    /**
     * Register commands
     */
    protected function registerCommands()
    {
        $this->commands(PropertyBagTableCommand::class);
    }
}
