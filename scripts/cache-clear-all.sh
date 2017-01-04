#!/bin/sh

rm -rf app/cache/*

composer update;
bower update;

php app/console bazinga:js-translation:dump
php app/console fos:js-routing:dump --locale fr__RG__
php app/console assets:install --symlink
php app/console assetic:dump

redis-cli -n 1 flushall;
redis-cli -n 2 flushall;
redis-cli -n 3 flushall;
redis-cli -n 4 flushall;
php app/console doctrine:schema:update --dump-sql;
