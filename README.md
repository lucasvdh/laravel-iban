Laravel IBAN validation
==============

IBAN validation made easy.

![license](https://img.shields.io/packagist/v/lucasvdh/laravel-iban.svg)
![license](https://img.shields.io/packagist/dt/lucasvdh/laravel-iban.svg)
![license](https://img.shields.io/packagist/l/lucasvdh/laravel-iban.svg)
![php-v](https://img.shields.io/packagist/php-v/lucasvdh/laravel-iban.svg)

Getting started
----------
1. [Include the package in your application](#include-the-package-in-your-application)
2. [Register the service provider](#register-the-sevice-provider)
3. [Example usage](#example-usage)

Include the package in your application
---------------------------------------

``` bash
$ composer require lucasvdh/laravel-iban:5.*
```
Or add a requirement to your project's composer.json

``` javascript
"require": {
	"lucasvdh/laravel-iban": "5.*"
},
```

TODO: register package at the packagist

Register the service
-----------------------------

Add the following to your `config/app.php`

``` php
<?php

return [

    ...

    'providers' => [
        ... 
        
        IBAN\ServiceProvider::class,
    ],
    
    ...
    
    // Optionally you can register the Facade alias
    'aliases' => [
        ...

        'IBAN' => IBAN\Facades\IBAN::class,
    ],
    
];
```

Example usages
--------------

IBAN validation can be used in the following ways:
1. [Via the facade](#via-the-facade)
2. [Via dependency injection](#via-dependency-injection)
3. [Via validation rules](#via-validation-rules)

#### Via the facade
``` php
function validateIBAN($iban) 
{
    echo $iban;
    
    if (\IBAN::validate($iban)) {
        echo 'is a valid IBAN';
    } else {
        echo 'is NOT valid IBAN';
    }
    
    echo "\r\n";
}

validateIBAN('NL39 RABO 0300 0652 64');
validateIBAN('123456789');
```

This results in
```
NL39 RABO 0300 0652 64 is a valid IBAN
123456789 is NOT a valid IBAN
```

#### Via dependency injection

``` php
<?php namespace App\Http\Controllers;

use IBAN\Services\IBANService;

class IBANController extends Controller
{
    
    public function validate(IBANService $IBANService, $iban)
    {
        if ($IBANService->validate($iban)) {
            return response()->json([
                'message' => $iban . 'is a valid IBAN'
            ]);
        } else {
            return response()->json([
                'message' => $iban . 'is NOT a valid IBAN'
            ]);
        }
    }
}
```

#### Via validation rules

``` php
$validator = Validator::make(
    ['required_iban_field' => 'required|iban'],
    ['optional_iban_field' => 'sometimes|iban'],
);
```