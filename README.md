# Laravel Responder

Easily send response to api requests

# Installation

You can install the package via composer:

```bash
$ composer require laratoolbox/responder
```

# Usage

You can use helper `responder` function like below.

```
return responder()
        ->addHeader('X-Secret1', 'secret1')
        ->addHeader('X-Secret2', 'secret2')
        ->addHeader('X-Secret3', 'secret3')
        ->setData(\App\Models\User::select('id', 'name')->find(1))
        ->addExtraData('custom-key', 'custom-value')
        ->send();
```

```text
// response
HTTP/1.1 200 OK
Content-Type: application/json
X-Secret1: secret1
X-Secret2: secret2
X-Secret3: secret3

{
    "code": 0,
    "message": null,
    "data": {
        "id": 1,
        "name": "Semih ERDOGAN"
    },
    "custom-key": "custom-value"
}
```

Or you can use `ResponderException`
```php
throw new \LaraToolbox\Responder\Exceptions\ResponderException(
    \LaraToolbox\Responder\ResponseCodes::ERROR,
    $customData = [1,2,3]
);
```

```text
// response
HTTP/1.1 200 OK
Content-Type: application/json

{
    "code": 120,
    "message": "An error occurred",
    "data": [
        1,
        2,
        3
    ]
}
```

# Testing

// TODO:

# Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

# Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

# Security

If you discover any security related issues, please email hasansemiherdogan@gmail.com instead of using the issue tracker.

 Credits

- [Semih ERDOGAN](https://github.com/laratoolbox)
- [Dincer DEMIRCIOGLU](https://github.com/dinncer)
- [All contributors](https://github.com/laratoolbox/database-viewer/graphs/contributors)

# License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
