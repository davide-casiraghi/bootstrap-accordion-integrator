<?php

namespace DavideCasiraghi\BootstrapAccordion\Tests;

use DavideCasiraghi\BootstrapAccordion\AccordionFactory;

use PHPUnit\Framework\TestCase; 

class AccordionFactoryTest extends TestCase
{
    protected $body = "{slider=Title First Slide}This is the first slide. {/slider}
                       {slider=Title Second Slide}This is the second slide. {/slider}";
    
    /** @test */
    public function it_finds_accordion_strings()
    {
        $accordion = new AccordionFactory();
        
        $numberOfSlides = $accordion->find_number_of_accordion_string_occurences($this->body);
        $this->assertEquals(2,$numberOfSlides);
    }
    
    /** @test */
    public function it_replace_accordion_strings_with_template()
    {
        $accordion = new AccordionFactory();
        
        $bodyWithAccordions = $accordion->replace_accordion_strings_with_template($this->body);
        $this->assertStringContainsString("<div class='accordion'><h3 data-toggle='collapse' data-target='#collapse_1'>Title First Slide</h3><div class='collapse' id='collapse_1'>This is the first slide. </div></div>",$bodyWithAccordions);
    }
    
}
