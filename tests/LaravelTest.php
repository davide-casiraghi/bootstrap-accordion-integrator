<?php

namespace DavideCasiraghi\BootstrapAccordion\Tests;

use Orchestra\Testbench\TestCase;
use DavideCasiraghi\BootstrapAccordion\Facades\BootstrapAccordion;
use DavideCasiraghi\BootstrapAccordion\AccordionServiceProvider;

class LaravelTest extends TestCase
{
    protected $body = '{accordion=Title First Slide}This is the first slide. {/accordion}
                       {accordion=Title Second Slide}This is the second slide. {/accordion}';


    protected function getPackageProviders($app)
    {
        return [
            AccordionServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'BootstrapAccordion' => BootstrapAccordion::class, // facade called ResponsiveQuote and the name of the facade class
        ];
    }

    /** @test */
    public function the_facade_can_be_reached()
    {
        $testExtension = BootstrapAccordion::find_number_of_accordion_string_occurences($this->body);
        $this->assertStringContainsString($testExtension, 2);
    }
}
