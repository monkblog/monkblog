# Monk!

[![Circle CI](https://circleci.com/gh/monkblog/monkblog-php.svg?style=svg)](https://circleci.com/gh/monkblog/monkblog-php)
[![Code Climate](https://codeclimate.com/github/monkblog/monkblog-php/badges/gpa.svg)](https://codeclimate.com/github/monkblog/monkblog-php)
[![Test Coverage](https://codeclimate.com/github/monkblog/monkblog-php/badges/coverage.svg)](https://codeclimate.com/github/monkblog/monkblog-php/coverage)
[![Total Downloads](https://poser.pugx.org/monkblog/monkblog-php/d/total.svg)](https://packagist.org/packages/monkblog/monkblog-php)
[![Latest Stable Version](https://poser.pugx.org/monkblog/monkblog-php/v/stable.svg)](https://packagist.org/packages/monkblog/monkblog-php)
[![Latest Unstable Version](https://poser.pugx.org/monkblog/monkblog-php/v/unstable.svg)](https://packagist.org/packages/monkblog/monkblog-php)
[![License](https://poser.pugx.org/monkblog/monkblog-php/license.svg)](https://packagist.org/packages/monkblog/monkblog-php)

A blogging engine built on Laravel 5.1.

## Homestead local dev instructions

If you prefer to use Homestead over Docker, you can find [instructions on the Laravel website](http://laravel.com/docs/5.1/homestead).

## Docker local dev instructions

If you don't yet have Docker installed, install it [according to the Docker website](https://www.docker.com).

After you have Docker installed, these two commands will get you started:

    docker-compose build
    docker-compose up

### Dependency installation and configuration

Next, you'll need to run these commands, in order:

```
cp .env.example .env
composer install
npm install
bower install
gulp
php artisan key:generate
```

### Adding your first admin user

Add an admin user by using the following console command:

```
php artisan user:generate
```

If you want to run it through a Docker container, do it like this:

```
docker exec -it monkblogphp_app_1 php artisan user:generate
```

## Admin Interface

Access the admin interface via `/admin` on your site.

## License

The Monk blog engine is licensed under the  [MIT license](http://opensource.org/licenses/MIT)

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
