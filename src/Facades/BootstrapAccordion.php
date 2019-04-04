<?php

namespace DavideCasiraghi\BootstrapAccordion\Facades;

use Illuminate\Support\Facades\Facade;

class BootstrapAccordion extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'accordion';
    }
}
