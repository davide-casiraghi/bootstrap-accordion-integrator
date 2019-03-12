# Bootstrap Accordion Integrator

[![Latest Stable Version](https://img.shields.io/packagist/v/davide-casiraghi/bootstrap-accordion-integrator.svg?style=flat-square)](https://packagist.org/packages/davide-casiraghi/bootstrap-accordion-integrator)

[![StyleCI](https://styleci.io/repos/175197548/shield?style=flat-square)](https://styleci.io/repos/175197548)




Bootstrap Accordion Integrator is a PHP library to add accordions in your application.  
The accordions are based on the Bootstrap 4 collapse component.



## Installation

Use the package manager [pip](https://pip.pypa.io/en/stable/) to install foobar.

```bash
composer require davide-casiraghi/bootstrap-accordion-integrator
```

## Usage

```php
$accordion = new AccordionFactory('arrow-full');
$accordion->replace_accordion_strings_with_template($body);
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://github.com/davide-casiraghi/bootstrap-accordion-integrator/blob/master/LICENSE.md)
