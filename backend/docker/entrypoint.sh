#!/bin/bash

mkdir -p /var/www/html/storage/framework/{sessions,views,cache}
mkdir -p /var/www/html/bootstrap/cache

exec "$@"
