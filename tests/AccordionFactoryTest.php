<?php

namespace DavideCasiraghi\BootstrapAccordion\Tests;

use PHPUnit\Framework\TestCase;
use DavideCasiraghi\BootstrapAccordion\AccordionFactory;

class AccordionFactoryTest extends TestCase
{
    protected $body = '{accordion=Title First Slide}This is the first slide. {/accordion}
                       {accordion=Title Second Slide}This is the second slide. {/accordion}';

    /** @test */
    public function it_finds_accordion_strings()
    {
        $accordion = new AccordionFactory();

        $numberOfSlides = $accordion->find_number_of_accordion_string_occurences($this->body);
        $this->assertEquals(2, $numberOfSlides);
    }

    /** @test */
    public function it_replace_accordion_strings_with_template()
    {
        $accordion = new AccordionFactory('plus-minus-circle');

        $bodyWithAccordions = $accordion->replace_accordion_strings_with_template($this->body);
        $this->assertStringContainsString("<div class='accordion'><div class='accordion-header' id='1' data-toggle='collapse' data-target='#collapse_1'><div title='1' class='icon plus-minus-circle'></div>Title First Slide</div><div class='accordion-body collapse' id='collapse_1'><div class='accordion-body-content'>This is the first slide. </div></div></div>", $bodyWithAccordions);
    }
}
