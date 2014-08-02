<?php namespace Apartments;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'Apartments\Services\ResponseInterface',
            'Apartments\Services\Response'
        );

        $this->app->bind('apartment_input', 'Apartments\Services\Input');
    }
}
