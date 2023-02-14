# laravel-database-session-model

[![Latest Version on Packagist](https://img.shields.io/packagist/v/repat/laravel-database-session-model.svg?style=flat-square)](https://packagist.org/packages/repat/laravel-database-session-model)
[![Total Downloads](https://img.shields.io/packagist/dt/repat/laravel-database-session-model.svg?style=flat-square)](https://packagist.org/packages/repat/laravel-database-session-model)

**laravel-database-session-model** contains an Eloquent model for the `sesssions` (or `config('sessions.table')`) as created by the artisan commands `sessions:table`

## Installation

`$ composer require repat/laravel-database-session-model`

## Documentation

### Relationship / Attributes

The attribute `unserialized_payload` returns the `payload` array, unserialized and base64 decoded. For more information, see the [Laravel Documentation on Eloquent Mutators](https://laravel.com/docs/8.x/eloquent-mutators).

The attribute `last_activity_at` parses the `last_activity` as a UNIX timestamp.

If you've kept the standard FQCN for Laravels User Model (`\App\Model\User::class`) you can use the `->user` relationship or extend this model and override the `user()` method.

```php
$session = \Repat\LaravelSessions\Session::first();

// UUID
$session->id; // string

// User
$session->user_id;
$session->user; // App\Models\User, extend the relationship if you have a different FQCN

$session->ip_address; // string
$session->user_agent; // string

// Attributes
$session->unserialized_payload; // array
$session->last_activity_at; // \Carbon\Carbon
```

## License

* MIT, see [LICENSE](https://github.com/repat/laravel-database-session-model/blob/master/LICENSE)

## Version

* Version 0.4

## Contact

### repat

* Homepage: [https://repat.de](https://repat.de)
* e-mail: repat@repat.de
* Twitter: [@repat123](https://twitter.com/repat123 "repat123 on twitter")

[![Flattr this git repo](http://api.flattr.com/button/flattr-badge-large.png)](https://flattr.com/submit/auto?user_id=repat&url=https://github.com/repat/laravel-database-session-model&title=laravel-database-session-model&language=&tags=github&category=software)
