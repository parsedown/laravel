> You might also like [Caret](https://caret.io?ref=parsedown) - our Markdown editor for Mac / Windows / Linux.

## Parsedown for Laravel

[![Build Status](https://travis-ci.org/parsedown/laravel.svg?branch=master)](https://travis-ci.org/parsedown/laravel)

A [Laravel](https://github.com/laravel/laravel) wrapper of **Parsedown** to extend its features. If you want to know more about **Parsedown** alone check out our [base repository](https://github.com/erusev/parsedown).

### Features

* Blade directive
* Helper function

### Installation

**Parsedown for Laravel** is available as [a composer package](https://packagist.org/packages/parsedown/laravel). You can install it using the following command:

``` bash
composer require "parsedown/laravel"
```

### Configuration

If you're using **Laravel** +5.5 you don't need to follow the steps below. The [auto-discovery](https://laravel-news.com/package-auto-discovery) feature has been implemented and will take care of loading the service provider for you.

But if that's not your case you just need to add the service provider to your `config/app.php`:
``` php
return [
    // Other configurations above...

    'providers' => [
        // Other providers above...
        Parsedown\Providers\ParsedownServiceProvider::class,
        // Other providers below...
    ],

    // Other configurations below...
];
```

### Usage

``` blade
@parsedown('Hello _Parsedown_!')
```

or (using a helper approach)

``` blade
{{ parsedown('Hello _Parsedown_!') }}
```

Any of the codes above will generate:

``` html
<p>Hello <em>Parsedown</em>!</p>
```

The helper can be used with **PHP** throughout the project.
