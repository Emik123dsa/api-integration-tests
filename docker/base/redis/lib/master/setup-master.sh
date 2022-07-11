#!/usr/bin/env sh

set -e

sed -i "s/\$REDIS_PORT/$REDIS_PORT/g" /usr/local/etc/redis/master.conf
sed -i "s/\$REDIS_BIND_ADDRESS/$REDIS_BIND_ADDRESS/g" /usr/local/etc/redis/master.conf
sed -i "s/\$REDIS_PASSWORD/$REDIS_PASSWORD/g" /usr/local/etc/redis/master.conf

redis-server /usr/local/etc/redis/master.conf