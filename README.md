> You might also like [Caret](https://caret.io?ref=parsedown) - our Markdown editor for Mac / Windows / Linux.

## Parsedown for Laravel

[![Build Status](https://travis-ci.org/parsedown/laravel.svg?branch=master)](https://travis-ci.org/parsedown/laravel)

This package is a [Laravel](https://github.com/laravel/laravel) wrapper around **Parsedown**. If you want to know more about **Parsedown** alone check out our [base repository](https://github.com/erusev/parsedown).

### Features

* Blade Directive
* Configuration File
* Helper Function

### Installation

**Parsedown for Laravel** is available as [a **Composer** package](https://packagist.org/packages/parsedown/laravel). You can install it using the command below:

``` bash
composer require parsedown/laravel
```

### Configuration

If you're using **Laravel** +5.5 you don't need to follow the steps below. The [package auto-discovery](https://laravel-news.com/package-auto-discovery) feature has been implemented and will take care of loading the service provider for you.

But if that's not your case you will need to add the service provider to your `config/app.php` file:
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

This package uses the `Parsedown\Providers\ParsedownServiceProvider` service provider to create a singleton of **Parsedown**. That's stored it in a container called `parsedown`. It uses the following options to set the default behavior for that instance:

| Name             | Description                                                                                    | Default |
|:-----------------|:-----------------------------------------------------------------------------------------------|:--------|
| `breaks_enabled` | Converts line breaks such as `\n` into `<br />` tags.                                          | `false` |
| `inline`         | Enables inline parsing for the `parsedown()` helper and the `@parsedown` directive by default. | `false` |
| `markup_escaped` | Escapes **HTML** in trusted input. Redundant if `safe_mode` is enabled.                        | `false` |
| `safe_mode`      | Doesn't process untrusted user-input.                                                          | `true`  |
| `urls_linked`    | Automatically converts **URL**s into anchor tags.                                              | `true`  |

You can overwrite these values by publishing the `config/parsedown.php` file with the following command:

``` sh
php artisan vendor:publish --provider=Parsedown\Providers\ParsedownServiceProvider
```

### Usage

The snippets below show how you can easily use **Parsedown** in your `*.blade.php` files:

``` blade
@parsedown('Hello _Parsedown_!')
```

...or (using the helper approach)

``` blade
{{ parsedown('Hello _Parsedown_!') }}
```

Any of the code above will generate:

``` html
<p>Hello <em>Parsedown</em>!</p>
```

If you want to parse a value using the inline style you just need to set the second argument as `true`:

``` blade
@parsedown('Hello _Parsedown_!', true)
```

...or (using the helper approach)

``` blade
{{ parsedown('Hello _Parsedown_!', true) }}
```

Any of the code above will generate:

``` html
Hello <em>Parsedown</em>!
```

The helper is globally available and can also be used with **PHP** code throughout your project.

## Lumen Support

**Laravel** and **Lumen** pretty much share the same core code. The instructions below should be enough to set this package for your **Lumen** project.

### Enable Facades in Your Project

Ensure you have the following in your `bootstrap/app.php` file:

```php
$app->withFacades();
```

### Service Provider Registering

As **Lumen** does not support package auto-discovery you got to do it manually adding the code below in your `bootstrap/app.php` file:

```php
$app->register(Parsedown\Providers\ParsedownServiceProvider::class);
```
