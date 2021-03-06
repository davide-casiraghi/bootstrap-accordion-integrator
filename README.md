# Bootstrap 4 Accordion Integrator

[![Latest Stable Version](https://img.shields.io/packagist/v/davide-casiraghi/bootstrap-accordion-integrator.svg?style=flat-square)](https://packagist.org/packages/davide-casiraghi/bootstrap-accordion-integrator)
<a href="https://travis-ci.org/davide-casiraghi/bootstrap-accordion-integrator"><img src="https://travis-ci.org/davide-casiraghi/bootstrap-accordion-integrator.svg" alt="Build Status"></a>
[![StyleCI](https://styleci.io/repos/175197548/shield?style=flat-square)](https://styleci.io/repos/175197548)
[![Coverage Status](https://scrutinizer-ci.com/g/davide-casiraghi/bootstrap-accordion-integrator/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/davide-casiraghi/bootstrap-accordion-integrator/)
<a href="https://codeclimate.com/github/davide-casiraghi/bootstrap-accordion-integrator/maintainability"><img src="https://api.codeclimate.com/v1/badges/de95f0b5560cdfb79d2c/maintainability" /></a>
[![GitHub last commit](https://img.shields.io/github/last-commit/davide-casiraghi/bootstrap-accordion-integrator.svg)](https://github.com/davide-casiraghi/bootstrap-accordion-integrator) 




**Bootstrap 4 Accordion Integrator** is a PHP library to add accordions in your application.  
The accordions are based on the Bootstrap 4 **collapse component**.

The library replace all the occurances of this snippet
```
{accordion=Title First Slide}This is the first slide. {/accordion}
```
With the HTML code of a bootstrap 4 accordion.
```html
<div class="accordion">
    <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse_1" aria-expanded="false">
        <div class="icon caret-svg"></div>
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

### Import the scss files
Add this line to your **resources/sass/app.scss** file:  
```@import 'vendor/bootstrap-accordion-integrator/accordion';```   
and then run in console:  
```npm run dev```  


## Usage

To replace all the occurrance of the accordion snippets:

```php
$accordion = new BootstrapAccordion('caret-svg');
$accordion->replace_accordion_strings_with_template($text);
```

or using the facade
```php
$text = BootstrapAccordion::getAccordions($text, 'plus-minus-circle');
```

## Icon styles (open/close)
At the moment are available these icon styles that can be specified when the class get instantiated
- **caret-svg** (default - use svg with mask-image)  
- **angle-svg**  (use svg with mask-image) 
- **plus-minus-circle**  (use default font) 
- **angle-fontawesome-pro** (use Font Awesome Pro 5 font-family)
- **angle-fontawesome-free** (use Font Awesome Free 4.7.0 font-family)
- **caret-fontawesome-pro** (use Font Awesome Pro 5 font-family)
- **caret-fontawesome-free** (use Font Awesome Free 4.7.0 font-family)

To use FontAwesome styles you need FontAwesome already loaded in your application.

## Load the CSS and JS files

### Without Laravel
You can import the JS and the CSS files in the vendor/bootstrap-accordion/ folder.

### With Laravel

#### Publish the JS, CSS and IMAGES
It's possible to customize the scss and the js publishing them in your Laravel application.  

```php artisan vendor:publish```

This command will publish in your application this folders:
- /resources/scss/vendor/bootstrap-accordion/
- /resources/js/vendor/bootstrap-accordion/
- /public/vendor/bootstrap-accordion-integrator/images/

#### Load the JS file
In your app.js file you can require the accordion.js file before the Vue object get instanciated:

```
require('./bootstrap');
window.Vue = require('vue');

require('./vendor/bootstrap-accordion/accordion');

window.myApp = new Vue({  
    el: '#app'
});
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://github.com/davide-casiraghi/bootstrap-accordion-integrator/blob/master/LICENSE.md)
