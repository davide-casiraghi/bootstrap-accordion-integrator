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
        $accordion = new AccordionFactory("plus-minus-circle");
        
        $bodyWithAccordions = $accordion->replace_accordion_strings_with_template($this->body);
        $this->assertStringContainsString("<div class='accordion'><div class='accordion-header' data-toggle='collapse' data-target='#collapse_1'><div class='icon plus-minus-circle'></div>Title First Slide</div><div class='accordion-body collapse' id='collapse_1'><div class='accordion-body-content'>This is the first slide. </div></div></div>",$bodyWithAccordions);
    }
    
}
