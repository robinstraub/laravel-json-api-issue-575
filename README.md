# How to replicate this issue


## Github issue

This code sample provides an example of the issue described [here](https://github.com/cloudcreativity/laravel-json-api/issues/575).


## Steps to replicate this issue

- [install laravel](https://laravel.com/docs/8.x/installation#installation-via-composer)
- [install laravel-json-api](https://laravel-json-api.readthedocs.io/en/latest/installation/)
- [setup the api](https://laravel-json-api.readthedocs.io/en/latest/basics/api/)
- [register a route for the user model](https://laravel-json-api.readthedocs.io/en/latest/basics/routing/)
- [register an adapter for the user model](https://laravel-json-api.readthedocs.io/en/latest/basics/adapters/)
- [register a schema for the user model](https://laravel-json-api.readthedocs.io/en/latest/basics/schemas/)
- write a test for the user endpoint
- enable sqlite database in phpunit.xml
- write some tests in the \Tests\Feature\UsersTest class to demonstrate the issue

## Run this project

- install the project: `composer install`
- run the tests: `php artisan test`
