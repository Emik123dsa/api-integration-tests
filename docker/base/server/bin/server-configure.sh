
# MIT License

# Copyright (c) 2021 Emil Shari <emil.shari87@gmail.com>

# Permission is hereby granted, free of charge, to any person obtaining a copy
# of this software and associated documentation files (the "Software"), to deal
# in the Software without restriction, including without limitation the rights
# to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
# copies of the Software, and to permit persons to whom the Software is
# furnished to do so, subject to the following conditions:

# The above copyright notice and this permission notice shall be included in all
# copies or substantial portions of the Software.

# THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
# IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
# FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
# AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
# LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
# OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
# SOFTWARE.

#!/usr/bin/env bash

apt-get upgrade -qy && \
    apt-get update -qy && \  
    apt-get install --no-install-recommends --no-install-suggests -qy python-setuptools locales curl netcat net-tools postgresql git zip vim wget libonig-dev libpq-dev libzip-dev autoconf build-essential libssl-dev libxml2-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev libmemcached-dev zlib1g-dev libevent-dev libcurl4-openssl-dev libicu-dev libsodium-dev libghc-postgresql-libpq-dev automake autoconf libtool && \
    locale-gen C.UTF-8 && \
    /usr/sbin/update-locale LANG=C.UTF-8 && \ 
    apt-get remove --purge --auto-remove -qy && \ 
    apt-get clean all -qy && \
    rm -rf /var/lib/apt/lists/*

wget https://github.com/edenhill/librdkafka/archive/v${PHP_SERVER_LIBRDKAFKA_DEV_VERSION}.tar.gz

tar -xvf v${PHP_SERVER_LIBRDKAFKA_DEV_VERSION}.tar.gz && cd librdkafka-${PHP_SERVER_LIBRDKAFKA_DEV_VERSION} && \
    ./configure --prefix /usr && \
    make -j$(nproc --all) && \
    make install

git clone https://github.com/arnaud-lb/php-rdkafka.git && \
    cd php-rdkafka && \
    phpize && \
    ./configure && \
    make all -j$(nproc --all) && \
    make install

pecl install -of lzf msgpack igbinary && docker-php-ext-enable msgpack igbinary

pecl install memcached

mkdir -p /usr/src/php/ext/ && \
    chmod -R a+x /usr/src/php/ext/ && \ 
    chown -R www-data:www-data /usr/src/php/ext/ && \
    cd /usr/src/php/ext/ && \
    pecl bundle redis && \
    docker-php-ext-configure redis --enable-redis-igbinary --enable-redis-msgpack --enable-redis-lzf

docker-php-ext-configure gd  --with-freetype=/usr/include/ --with-jpeg=/usr/include/
docker-php-ext-configure pgsql --with-pgsql=/usr/include/postgresql/

git clone https://github.com/c-ares/c-ares.git && \
    cd c-ares && \
    autoreconf -fi && \
    ./configure && \
    make -j$(nproc -all) && \
    make install

pecl install ds

docker-php-ext-install -j$(nproc --all) sockets redis pcntl pdo pgsql pdo_pgsql pdo_mysql mysqli intl opcache bcmath zip curl gd

# TODO: add tarantool to the extension
docker-php-ext-enable rdkafka redis memcached curl gd && pecl channel-update pecl.php.net

# FIXME: enable cares in the future.
git clone https://github.com/swoole/swoole-src.git && \
    cd swoole-src && \
    git checkout v${PHP_SERVER_SWOOLE_VERSION} && \
    phpize && \
    ./configure --enable-openssl \
    --enable-mysqlnd \
    --enable-sockets \
    --enable-http2 \
    --enable-swoole-curl \
    --enable-swoole-json && \
    # --enable-cares && \
    make -j$(nproc --all) && \
    make install

# FIXME: add ext async for swoole.
#  git clone https://github.com/swoole/ext-async.git && \
#     cd ext-async && \
#     phpize && \
#     ./configure && \
#     make -j$(nproc --all) && \
#     sudo make install

docker-php-ext-enable swoole