# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/westlinks/simple-ivr.svg?style=flat-square)](https://packagist.org/packages/westlinks/simple-ivr)
[![Total Downloads](https://img.shields.io/packagist/dt/westlinks/simple-ivr.svg?style=flat-square)](https://packagist.org/packages/westlinks/simple-ivr)
![GitHub Actions](https://github.com/westlinks/simple-ivr/actions/workflows/main.yml/badge.svg)

Special purpose package for use in product code name WLHM. 

## Installation

You can install the package via composer:

```bash
composer require westlinks/simple-ivr
```

## Usage
This is a special use sub-package used to add an IVR tree to the Helpline Manager web app. It is not registered at Packagist and must be installed semi-manually. Currently Helpline Manager is a private repo. 
```php
//Add to composer.json just prior to the require{} section.
    "repositories": [
        {
            "type": "path",
            "url": "local/simple-ivr"
        }
        ],
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please use the issue tracker.

## Credits

-   [Westlinks Online](https://github.com/westlinks)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
