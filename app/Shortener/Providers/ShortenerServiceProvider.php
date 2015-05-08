<?php namespace Shortener\Providers;

use Illuminate\Support\ServiceProvider;

class ShortenerServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Shortener\\Repository\\UrlRepositoryInterface',
            'Shortener\\Repository\\EloquentUrlRepository'
        );

        $this->app->bind(
            'Shortener\\Services\\BarcodeServiceInterface',
            'Shortener\\Services\\DineshBarcodeService'
        );
    }
}