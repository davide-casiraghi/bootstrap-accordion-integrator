# Bootstrap 4 Accordion Integrator

[![Latest Stable Version](https://img.shields.io/packagist/v/davide-casiraghi/bootstrap-accordion-integrator.svg?style=flat-square)](https://packagist.org/packages/davide-casiraghi/bootstrap-accordion-integrator)
<a href="https://travis-ci.org/davide-casiraghi/bootstrap-accordion-integrator"><img src="https://travis-ci.org/davide-casiraghi/bootstrap-accordion-integrator.svg" alt="Build Status"></a>
[![StyleCI](https://styleci.io/repos/175197548/shield?style=flat-square)](https://styleci.io/repos/175197548)




Bootstrap Accordion Integrator is a PHP library to add accordions in your application.  
The accordions are based on the Bootstrap 4 collapse component.

The library replace all the occurances of this snippet
```
{slider=Title First Slide}This is the first slide. {/slider}
```
With the HTML code of a bootstrap 4 accordion.
```html
<div class="accordion">
    <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse_1" aria-expanded="false">
        <div class="icon arrow-full"></div>
        Title First Slide
    </div>
    <div class="accordion-body collapse" id="collapse_1" style="">
        <div class="accordion-body-content">This is the first slide. </div>
    </div>
</div>
```


## Installation

To use the package you should import it trough composer.

```bash
composer require davide-casiraghi/bootstrap-accordion-integrator
```

## Usage

Import from the vendor folder of the package the SCSS and the JS.

Then to replace all the occurrance of the accordion snippets:

```php
$accordion = new AccordionFactory('arrow-full');
$accordion->replace_accordion_strings_with_template($body);
```

### Icon styles (open/close)
At the moment are available these icon styles that can be specified when the class get instantiated
- **arrow-full** (default - use svg with mask-image)  
- **arrow-empty**  (use svg with mask-image) 
- **plus-minus-circle**  (use svg with mask-image) 
- **angle-fontawesome-pro** (use Font Awesome Pro 5 font-family)
- **angle-fontawesome-free** (use Font Awesome Free 4.7.0 font-family)
- **caret-fontawesome-pro** (use Font Awesome Pro 5 font-family)
- **caret-fontawesome-free** (use Font Awesome Free 4.7.0 font-family)


### Style SCSS with Laravel
It's possible to customize the scss and the js publishing them in your Laravel application.  

```php artisan vendor:publish```

This command will publish in your application this directories:
- /resources/scss/vendor/bootstrap-accordion/
- /resources/js/vendor/bootstrap-accordion/
- /public/vendor/bootstrap-accordion-integrator/images/

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://github.com/davide-casiraghi/bootstrap-accordion-integrator/blob/master/LICENSE.md)
