#!/bin/bash

ssh -t vagrant@127.0.0.1 -p 2222 'cd ~/monkblog-php/ && ./phpunit-commands.sh'