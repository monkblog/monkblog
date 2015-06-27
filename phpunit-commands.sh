#!/bin/bash

DB='circle_test';

mysql -uhomestead -psecret -e "DROP DATABASE IF EXISTS \`$DB\`";
mysql -uhomestead -psecret -e "CREATE DATABASE \`$DB\` DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_unicode_ci";
mysql -uhomestead -psecret -e "GRANT ALL PRIVILEGES  ON \`$DB\`.* TO 'ubuntu'@'localhost' WITH GRANT OPTION;";

cd ~/monkblog-php/ && php artisan migrate && php artisan db:seed && php -d memory_limit=-1 vendor/bin/phpunit