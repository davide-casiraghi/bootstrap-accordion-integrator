<?php

namespace DavideCasiraghi\BootstrapAccordion\Tests;

use Orchestra\Testbench\TestCase;
use DavideCasiraghi\BootstrapAccordion\AccordionServiceProvider;
use DavideCasiraghi\BootstrapAccordion\Facades\BootstrapAccordion;

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

    /** @test */
    public function it_replace_accordion_strings_with_template_using_facade()
    {
        $bodyWithAccordions = BootstrapAccordion::getAccordions($this->body, 'plus-minus-circle');
        $this->assertStringContainsString("<div class='accordion'><div class='accordion-header' id='1' data-toggle='collapse' data-target='#collapse_1'><div title='1' class='icon plus-minus-circle'></div>Title First Slide</div><div class='accordion-body collapse' id='collapse_1'><div class='accordion-body-content'>This is the first slide. </div></div></div>", $bodyWithAccordions);
    }
}
