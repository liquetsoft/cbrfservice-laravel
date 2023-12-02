Laravel курсы валют
===============

[![Latest Stable Version](https://poser.pugx.org/liquetsoft/cbrfservice-laravel/v/stable.png)](https://packagist.org/packages/liquetsoft/cbrfservice-laravel)
[![Total Downloads](https://poser.pugx.org/liquetsoft/cbrfservice-laravel/downloads.png)](https://packagist.org/packages/liquetsoft/cbrfservice-laravel)
[![License](https://poser.pugx.org/liquetsoft/cbrfservice-laravel/license.svg)](https://packagist.org/packages/liquetsoft/cbrfservice-laravel)
[![Build Status](https://github.com/liquetsoft/cbrfservice-laravel/workflows/cbrfservice_laravel/badge.svg)](https://github.com/liquetsoft/cbrfservice-laravel/actions?query=workflow%3A%22cbrfservice_laravel%22)

Laravel bundle для [liquetsoft/cbrfservice](https://github.com/liquetsoft/cbrfservice).



Установка
---------
1. Установить пакет с помощью composer:

    ```bash
    composer require liquetsoft/fias-laravel
    ```

2. Бандл следует стандартной структуре, поэтому на `laravel >=5.5` зарегистрируется автоматически с помощью `Package Discovery`. Для более ранних версий провайдер нужно зарегистрировать самостоятельно, добавив его в `config/app.php`:

    ```php
    'providers' => [
        // Other Service Providers
        Liquetsoft\CbrfService\Laravel\LiquetsoftCbrfServiceBundleServiceProvider::class,
    ],
    ```