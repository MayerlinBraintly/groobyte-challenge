# GROOBYTE Challenge

The project is written in Lumen because it is a lighter framework specifically for microservices. It is a framework based on Laravel. You can see the official documentation below.

I used MySQL for the database.

Create the two requested apps to create and cancel a subscription.

I also decided to use the repository pattern to handle the data source logic; This pattern allows you to add data sources as needed, such as another database, cache, or API. In addition, it helps you so that the logic of the controller does not depend on the ORM in case it is decided to change.

The documentation for these can be found at the following link:

https://documenter.getpostman.com/view/16786579/2s93JtRj6T

In order not to waste time creating users and clients, some seeders were designed to work on what interests us, which is making and canceling the subscription.

# Tech Documentation

PHP 8.2.1 (cli) (built: Jan 13 2023 10:42:44) (NTS)

mysql  Ver 8.0.31-0ubuntu0.20.04.2 for Linux on x86_64 ((Ubuntu))

laravel/lumen-framework ^8.3.1


# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


