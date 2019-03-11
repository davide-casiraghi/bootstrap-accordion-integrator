<?php

namespace DavideCasiraghi\BootstrapAccordion;


class AccordionFactory
{    
    // The regex to identify accordion strings patterns
        protected $regex = "#(?:<p>)?\{slide[r]?=([^}]+)\}(?:</p>)?(.*?)(?:<p>)?\{/slide[r]?\}(?:</p>)?#s";
    
        protected $sliderTemplate = "<div class='accordion'><h3 data-toggle='collapse' data-target='#collapse_{ACCORDION_ID}'>{SLIDER_TITLE}</h3><div class='collapse' id='collapse_{ACCORDION_ID}'>{SLIDER_CONTENT}</div></div>";


    public function find_number_of_accordion_string_occurences($text)
    {
        return substr_count($text, '{slide');
    }
    
    public function replace_accordion_strings_with_template($text)
    {            
        $count = 0;
        $text = preg_replace_callback(
                    $this->regex,
                    function ($m) use (&$count)
                    { 
                        $count++;
                        return str_replace(
                            array("{SLIDER_TITLE}", "{SLIDER_CONTENT}", "{ACCORDION_ID}"),
                            array("$m[1]", "$m[2]",$count),
                            $this->sliderTemplate
                        );
                    }, 
                    $text
        );    
                    
        return $text;
    }
}
