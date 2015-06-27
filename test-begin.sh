#!/bin/bash

mv .env .env.bak && cp .env.testing .env && php artisan key:generate