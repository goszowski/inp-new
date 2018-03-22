<?php

namespace Runsite\Blank;

use Illuminate\Support\ServiceProvider;

class RunsiteBlankServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            Console\Commands\BlankCommand::class,
        ]);
    }
}
