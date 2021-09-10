![alt tag](https://blogvaronis2.wpengine.com/wp-content/uploads/2019/12/pgp-encryption-hero.png "Encryptor")

Laravel Utilites
=======================
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

 
## Install

You can install `Serinc Utilities` package to your laravel project via composer command:
```
$ composer require serinc/utilities:dev-master
```

## OR
```
$ composer require serinc/utilities:dev-main
````

## Description

This Package Configured To Send Http Request As CURL Method <> For This Function 

``````
use serinc\utilities\HttpClient;

``````

### Example
### AlTretive  Method (GET , POST , PUT , DELETE)

`````
use serinc\utilities\HttpClient;

$httpClient = new HttpClient("$url");
$response = $httpClient->setHeaders([
'Authorization' => 'Berare Token',
'Content-Type' => 'application/json',
])->setUri('/api?example')->request("GET", null);
return $response;
``````
## | For Decrypt & Encrypt Security 

`````
use serinc\utilities\Encryptor;

$value_encrypt = (new Encryptor())->encrypt($password);

$value_decrypt = (new Encryptor())->decrypt($password);

`````

#License By:
-----------------------------------------------------

####
$ Follow ME
>Develope by Dev Ahmed S. Ahmed [coder79](https://twitter.com/yahongie) ❤


