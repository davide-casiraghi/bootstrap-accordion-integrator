<?php 
namespace DavideCasiraghi\BootstrapAccordion;

use \Illuminate\Support\ServiceProvider;

class AccordionServiceProvider extends ServiceProvider
{
    public function boot()
    {    
        $this->publishes([
            __DIR__ . '/../resources/assets/sass' => resource_path('sass/vendor/bootstrap-accordion/')
        ], 'sass');
        
    }
    
    public function register()
    {
        $this->app->bind('accordion', function(){
            return new AccordionFactory();
        });

    }

}
