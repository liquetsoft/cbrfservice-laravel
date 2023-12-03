Laravel курсы валют
===================

[![Latest Stable Version](https://poser.pugx.org/liquetsoft/cbrfservice-laravel/v/stable.png)](https://packagist.org/packages/liquetsoft/cbrfservice-laravel)
[![Total Downloads](https://poser.pugx.org/liquetsoft/cbrfservice-laravel/downloads.png)](https://packagist.org/packages/liquetsoft/cbrfservice-laravel)
[![License](https://poser.pugx.org/liquetsoft/cbrfservice-laravel/license.svg)](https://packagist.org/packages/liquetsoft/cbrfservice-laravel)
[![Build Status](https://github.com/liquetsoft/cbrfservice-laravel/workflows/cbrfservice_laravel/badge.svg)](https://github.com/liquetsoft/cbrfservice-laravel/actions?query=workflow%3A%22cbrfservice_laravel%22)

Laravel бандл для [liquetsoft/cbrfservice](https://github.com/liquetsoft/cbrfservice).



Установка
---------

1. Установить пакет с помощью composer:

    ```bash
    composer require liquetsoft/cbrfservice-laravel
    ```

2. Бандл зарегистрируется автоматически с помощью `Package Discovery`.



Использование
-------------

Сервис можно получить с помощью [Service Container](https://laravel.com/docs/10.x/container).

```php
<?php
 
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Collection;
use Liquetsoft\CbrfService\Laravel\CbrfDailyWrapper;
 
class UserController extends Controller
{
    public function __construct(
        private readonly CbrfDailyWrapper $cbrfDaily,
    ) {}

    public function getEnumValutes(): Collection
    { 
        return $this->cbrfDaily->enumValutes();
    }
}
```



Методы
------

Описание методов находится на [сайте банка России](https://www.cbr.ru/development/DWS/).