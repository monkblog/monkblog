# Monk!

[![Circle CI](https://circleci.com/gh/monkblog/monkblog-php.svg?style=svg)](https://circleci.com/gh/monkblog/monkblog-php)
[![Code Climate](https://codeclimate.com/github/monkblog/monkblog-php/badges/gpa.svg)](https://codeclimate.com/github/monkblog/monkblog-php)
[![Test Coverage](https://codeclimate.com/github/monkblog/monkblog-php/badges/coverage.svg)](https://codeclimate.com/github/monkblog/monkblog-php/coverage)
[![Total Downloads](https://poser.pugx.org/monkblog/monkblog-php/d/total.svg)](https://packagist.org/packages/monkblog/monkblog-php)
[![Latest Stable Version](https://poser.pugx.org/monkblog/monkblog-php/v/stable.svg)](https://packagist.org/packages/monkblog/monkblog-php)
[![Latest Unstable Version](https://poser.pugx.org/monkblog/monkblog-php/v/unstable.svg)](https://packagist.org/packages/monkblog/monkblog-php)
[![License](https://poser.pugx.org/monkblog/monkblog-php/license.svg)](https://packagist.org/packages/monkblog/monkblog-php)

A blogging engine built on Laravel.

## Homestead local dev instructions

If you prefer to use Homestead over Docker, you can find [instructions on the Laravel website](http://laravel.com/docs/5.1/homestead).

## Docker local dev instructions

If you don't yet have Docker installed, install it [via dinghy](https://github.com/codekitchen/dinghy).

After you have Docker installed, these two commands will get you started:

    docker-compose build
    docker-compose up

Note, however, that there are two environment variables you must set in your own shell before running `docker-compose up`. These are `MYSQL_ROOT_PASSWORD` and `MYSQL_PASSWORD`, and refer to the MySQL root password in the MySQL container (not used by us, but mandatory for the container) and the password for the `monk` user in the MySQL container, respectively.

## License

The Monk blog engine is licensed under the  [MIT license](http://opensource.org/licenses/MIT)

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
