<?php

namespace DavideCasiraghi\BootstrapAccordion;

class AccordionFactory
{
    protected $icon_kind = 'caret-svg';

    // The regex to identify accordion strings patterns
    protected $regex = "#(?:<p>)?\{accordion?=([^}]+)\}(?:</p>)?(.*?)(?:<p>)?\{/accordion?\}(?:</p>)?#s";

    protected $sliderTemplate = "<div class='accordion'><div class='accordion-header' id='{ACCORDION_ID}' data-toggle='collapse' data-target='#collapse_{ACCORDION_ID}'><div title='{ACCORDION_ID}' class='icon {ICON_KIND}'></div>{SLIDER_TITLE}</div><div class='accordion-body collapse' id='collapse_{ACCORDION_ID}'><div class='accordion-body-content'>{SLIDER_CONTENT}</div></div></div>";

    public function __construct(string $icon_kind = '')
    {
        if ($icon_kind) {
            $this->icon_kind = $icon_kind;
        }
    }

    /************************************************************************/

    /**
     *  Find the number of accordion string occurences in a text.
     *  @param string  $text
     *  @return int $ret
     **/
    public function find_number_of_accordion_string_occurences($text)
    {
        return substr_count($text, '{accordion');
    }

    /************************************************************************/

    /**
     *  Replace accordion strings with template.
     *  @param string  $text
     *  @return string $ret
     **/
    public function replace_accordion_strings_with_template($text)
    {
        // Add to the accordion template the icon kind
        $this->sliderTemplate = str_replace('{ICON_KIND}', $this->icon_kind, $this->sliderTemplate);

        //dd($this->icon_kind);
        $count = 0;
        $text = preg_replace_callback(
                    $this->regex,
                    function ($m) use (&$count) {
                        $count++;

                        return str_replace(
                            ['{SLIDER_TITLE}', '{SLIDER_CONTENT}', '{ACCORDION_ID}'],
                            ["$m[1]", "$m[2]", $count],
                            $this->sliderTemplate
                        );
                    },
                    $text
        );

        return $text;
    }

    /************************************************************************/

    /**
     *  Return the text with the accordions HTML instead of the found snippets.
     *  @param array  $text
     *  @param string $icon_kind
     *  @return array $ret
     **/
    public function getAccordions($text, string $icon_kind = '')
    {
        $accordion = new self($icon_kind);
        $ret = $accordion->replace_accordion_strings_with_template($text);

        return $ret;
    }
}
