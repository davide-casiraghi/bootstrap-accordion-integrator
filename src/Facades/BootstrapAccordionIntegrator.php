<?php

namespace DavideCasiraghi\BootstrapAccordion;

use Illuminate\Support\Facades\Facade;

class BootstrapAccordionIntegrator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'accordion';
    }
}
