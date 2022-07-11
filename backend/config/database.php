<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        /*  'tarantool' => [
            'driver'   => 'tarantool',
            'host'     => env('DB_HOST', '127.0.0.1'),
            'port'     => env('DB_PORT', 3301),
            'database' => env('DB_DATABASE'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'driver_oprions' => [
                'connection_type'     => env('DB_CONNECTION_TYPE', 'tcp')
            ],
            'options'  => [
                'connect_timeout' => 5,
                'max_retries' => 3
            ]
        ], */

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            'host' => env('PG_MASTER_HOST', '127.0.0.1'),
            'port' => env('PG_MASTER_PORT', '5432'),
            'database' => env('POSTGRES_DB', 'forge'),
            'username' => env('POSTGRES_USER', 'forge'),
            'password' => env('POSTGRES_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */
    'redis-sentinel' => [
        'cache' => [
            [
                'host' => env('REDIS_HOST', 'localhost'),
                'port' => env('REDIS_PORT', 26379),
            ],
            'options' => [
                'service' => env('REDIS_SENTINEL_SERVICE', 'redis-master'),
                'parameters' => [
                    'password' => env('REDIS_PASSWORD', null),
                    'database' => 0,
                ],
            ],
        ],


        'default' => [
            [
                'host' => env('REDIS_HOST', 'localhost'),
                'port' => env('REDIS_PORT', 26379),
            ],

        ],

        'options' => [
            'service' => env('REDIS_SENTINEL_SERVICE', 'redis-master'),
            'parameters' => [
                'password' => env('REDIS_PASSWORD', null),
                'database' => 0,
            ],
            'sentinel_timeout' => 0.500,
            'retry_limit' => 20,
            'retry_wait' => 1000,
            'update_sentinels' => true,
        ],

        'session' => [
            [
                'host' => env('REDIS_HOST', 'localhost'),
                'port' => env('REDIS_PORT', 26379),
            ],
            'options' => [
                'service' => env('REDIS_SENTINEL_SERVICE', 'redis-master'),
                'parameters' => [
                    'password' => env('REDIS_PASSWORD', null),
                    'database' => 1,
                ],
            ],
        ],

        'feed' => [
            [
                'host' => env('REDIS_HOST', 'localhost'),
                'port' => env('REDIS_PORT', 26379),

            ],
            'options' => [
                'service' => env('REDIS_SENTINEL_FEED_SERVICE', 'feed-service'),
                'parameters' => [
                    'password' => env('REDIS_PASSWORD', null),
                    'database' => 2,
                ],
            ],
        ],
    ],

    'redis' => [
        'cluster' => false,

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'cache' => [
            [
                'url' => env('REDIS_URL'),
                'host' => env('REDIS_HOST', '127.0.0.1'),
                'password' => env('REDIS_PASSWORD', null),
                'port' => env('REDIS_PORT', '26379'),
                'database' => env('REDIS_DB', '0'),
            ],
            'options' => [
                'service' => env('REDIS_SENTINEL_SERVICE', 'redis-master'),
                'parameters' => [
                    'password' => env('REDIS_PASSWORD', null),
                    'database' => 0,
                ],
            ],
        ],

        'options' => [
            // 'cluster' => env('REDIS_CLUSTER', 'redis'),
            'replication' => 'sentinel',

            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_') . '_database_'),

            'parameters' => [
                'password' => env('REDIS_PASSWORD', null),
                'database' => 0,
            ],
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '26379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'session' => [
            [
                'url' => env('REDIS_URL'),
                'host' => env('REDIS_HOST', '127.0.0.1'),
                'password' => env('REDIS_PASSWORD', null),
                'port' => env('REDIS_PORT', '26379'),
                'database' => env('REDIS_DB', '0'),
            ],
            'options' => [
                'replication' => 'sentinel',
                'service' => env('REDIS_SENTINEL_SERVICE', 'redis-master'),
                'parameters' => [
                    'password' => env('REDIS_PASSWORD', null),
                    'database' => 1,
                ],
            ],
        ],

        'feed' => [
            [
                'url' => env('REDIS_URL'),
                'host' => env('REDIS_HOST', '127.0.0.1'),
                'password' => env('REDIS_PASSWORD', null),
                'port' => env('REDIS_PORT', '26379'),
                'database' => env('REDIS_DB', '0'),
            ],
            'options' => [
                'replication' => 'sentinel',
                'service' => env('REDIS_SENTINEL_FEED_SERVICE', 'feed-service'),
                'parameters' => [
                    'password' => env('REDIS_PASSWORD', null),
                    'database' => 2,
                ],
            ],
        ],
    ]
];
