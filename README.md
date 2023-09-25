# rammastack/langs-to-kurdish-number

This Composer package converts numbers to Kurdish words.

## Installation

You can install this package using Composer:

```bash
composer require rammastack/langs-to-kurdish-number

## Usage

To convert a number to Kurdish words using the `Converter` class, follow these steps:

```php
use Converter\Converter;

echo Converter::NumToKu(12345); // Output: "دوازدە هەزار و سێ سەد و چل و پێنج"
