#!/usr/bin/env sh

set -e

sed -i "s/\$REPLICA_HOST/$REPLICA_HOST/g" /usr/local/etc/redis/replica.conf
sed -i "s/\$REPLICA_PORT/$REPLICA_PORT/g" /usr/local/etc/redis/replica.conf
sed -i "s/\$REPLICA_PASSWORD/$REPLICA_PASSWORD/g" /usr/local/etc/redis/replica.conf

redis-server /usr/local/etc/redis/replica.conf