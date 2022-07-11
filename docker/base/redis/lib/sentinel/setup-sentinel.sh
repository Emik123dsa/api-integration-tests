#!/usr/bin/env sh

set -e

sed -i "s/\$REDIS_MASTER_PORT/$REDIS_MASTER_PORT/g" /usr/local/etc/redis/sentinel.conf
sed -i "s/\$SENTINEL_AUTH_PASSWORD/$SENTINEL_AUTH_PASSWORD/g" /usr/local/etc/redis/sentinel.conf
sed -i "s/\$SENTINEL_HOST/$SENTINEL_HOST/g" /usr/local/etc/redis/sentinel.conf
sed -i "s/\$SENTINEL_PORT/$SENTINEL_PORT/g" /usr/local/etc/redis/sentinel.conf
sed -i "s/\$SENTINEL_QUORUM/$SENTINEL_QUORUM/g" /usr/local/etc/redis/sentinel.conf
sed -i "s/\$SENTINEL_DOWN_AFTER/$SENTINEL_DOWN_AFTER/g" /usr/local/etc/redis/sentinel.conf
sed -i "s/\$SENTINEL_FAILOVER/$SENTINEL_FAILOVER/g" /usr/local/etc/redis/sentinel.conf

redis-sentinel /usr/local/etc/redis/sentinel.conf