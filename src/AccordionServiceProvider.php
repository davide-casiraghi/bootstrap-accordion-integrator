<?php

namespace DavideCasiraghi\BootstrapAccordion;

use Illuminate\Support\ServiceProvider;

class AccordionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../resources/assets/sass' => resource_path('sass/vendor/bootstrap-accordion/'),
        ], 'sass');
        $this->publishes([
            __DIR__.'/../resources/assets/js' => resource_path('js/vendor/bootstrap-accordion/'),
        ], 'js');
        $this->publishes([
            __DIR__.'/../resources/assets/images' => public_path('vendor/bootstrap-accordion-integrator/images/'),
        ], 'images');
    }

    public function register()
    {
        $this->app->bind('accordion', function () {
            return new AccordionFactory();
        });
    }
}
