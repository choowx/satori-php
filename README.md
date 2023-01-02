![Satori](https://raw.githubusercontent.com/vercel/satori/main/.github/card.png)

# Run Satori — enlightened library to convert HTML and CSS to SVG, using PHP

[![Latest Version on Packagist](https://img.shields.io/packagist/v/choowx/satori-php.svg?style=flat-square)](https://packagist.org/packages/choowx/satori-php)
[![Tests](https://img.shields.io/github/actions/workflow/status/choowx/satori-php/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/choowx/satori-php/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/choowx/satori-php.svg?style=flat-square)](https://packagist.org/packages/choowx/satori-php)

[Satori](https://github.com/vercel/satori) — enlightened library to convert HTML and CSS to SVG.

This package makes it easy to run Satori using PHP.

## Installation

You can install the package via composer:

```bash
composer require choowx/satori-php
```

This package relies on the `satori` and `html-react-parser` js packages being available on your system. In most cases you can accomplish this by issues these commands in your project.

```bash
npm install satori
npm install html-react-parser
```

## Usage

```php
use Choowx\Satori\Satori;

$svg = Satori::html('<div style="color: black">hello, world</div>')->convert();
// $svg = '<svg width="1200" height="630" viewBox="0 0 1200 630" xmlns="http://www.w3.org/2000/svg"><path fill="black"...
```

The width and height of the svg can be configured:

```php
use Choowx\Satori\Satori;

$svg = Satori::html('<div style="color: black">hello, world</div>')
    ->width(600)
    ->height(315)
    ->convert();
// $svg = '<svg width="600" height="315" viewBox="0 0 600 315"...
```

Using custom fonts available in the file system:

> Satori currently supports three font formats: TTF, OTF and WOFF. Note that WOFF2 is not supported at the moment.

```php
use Choowx\Satori\Font;
use Choowx\Satori\Satori;

$svg = Satori::html('<div style="color: black">hello, world</div>')
    ->withFonts([
        Font::path('/path/to/Roboto-Regular.ttf')
            ->name('Roboto')
            ->weight(400)
            ->style('regular'),
        Font::path('/path/to/Roboto-Bold.ttf')
            ->name('Roboto')
            ->weight(700)
            ->style('bold'),
    ])
    ->convert();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/choowx/satori-php/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Choo Wen Xuan](https://github.com/choowx)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
