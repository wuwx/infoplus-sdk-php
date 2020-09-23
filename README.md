# InfoPlus SDK PHP

## Requirement

1. PHP >= 7.2
2. **[Composer](https://getcomposer.org/)**

## Installation

```shell
$ composer require "wuwx/infoplus-sdk-php
```

## Usage

```php
<?php
use Wuwx\InfoPlus\Application;
$app = new Application([
    "base_uri"      => $_ENV["INFOPLUS_BASE_URI"],
    "client_id"     => $_ENV["INFOPLUS_CLIENT_ID"],
    "client_secret" => $_ENV["INFOPLUS_CLIENT_SECRET"],
]);
$app["process"]->find(6807);
```

## License

MIT

