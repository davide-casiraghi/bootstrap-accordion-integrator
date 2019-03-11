<?php

namespace DavideCasiraghi\BootstrapAccordion;

class AccordionFactory
{
    // The regex to identify accordion strings patterns
        protected $regex = "#(?:<p>)?\{slide[r]?=([^}]+)\}(?:</p>)?(.*?)(?:<p>)?\{/slide[r]?\}(?:</p>)?#s";
    
    // The accordion template
        protected $sliderTemplate = "<div class='accordion'><h3>{SLIDER_TITLE}</h3><div>{SLIDER_CONTENT}</div></div>";
        
    public function find_number_of_accordion_string_occurences($text)
    {
        return substr_count($text, '{slide');
    }
    
    public function replace_accordion_strings_with_template($text)
    {
        $text = preg_replace(
                    $this->regex,
                    str_replace(
                        array("{SLIDER_TITLE}", "{SLIDER_CONTENT}"),
                        array("$1", "$2"),
                        $this->sliderTemplate
                    ),
                    $text
                );
        return $text;
    }
}
