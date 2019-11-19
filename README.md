# example-com-client

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Данный проект представляет клиента для вымышленного сервиса комментариев example.com


## Install

Via Composer

``` bash
$ composer require 9nekra/example-com-client:^0
```

## Usage

### Получение комментариев

``` php
use Nekra\ExampleComClient\ExampleClientBuilder;

$exampleClient = ExampleClientBuilder::create();
$comments = $exampleClient->getComments();
```

### Добавление комментария

``` php
use \Nekra\ExampleComClient\Comment;

$comment = new Comment(['name' => 'Name 1', 'text' => 'text two']);
$exampleClient->postComment($comment);
```

### Изменение комментария

``` php
use \Nekra\ExampleComClient\Comment;

$comment = new Comment(['id' => 1, 'name' => 'New Name 22','text' => 'text two']);
$exampleClient->updateComment($comment);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email 9nekra@gmail.com instead of using the issue tracker.

## Credits

- [Alexander][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/9nekra/example-com-client.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/9nekra/example-com-client/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/9nekra/example-com-client.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/9nekra/example-com-client.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/9nekra/example-com-client.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/9nekra/example-com-client
[link-travis]: https://travis-ci.org/9nekra/example-com-client
[link-scrutinizer]: https://scrutinizer-ci.com/g/9nekra/example-com-client/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/9nekra/example-com-client
[link-downloads]: https://packagist.org/packages/9nekra/example-com-client
[link-author]: https://github.com/9nekra
