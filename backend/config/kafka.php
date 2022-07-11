<?php

return [
    /*
     | Your kafka brokers url.
     */
    'brokers' => env('KAFKA_BROKERS', 'localhost:29092'),

    /*
     | Kafka consumers belonging to the same consumer group share a group id.
     | The consumers in a group then divides the topic partitions as fairly amongst themselves as possible by
     | establishing that each partition is only consumed by a single consumer from the group.
     | This config defines the consumer group id you want to use for your project.
     */
    'consumer_group_id' => env('KAFKA_CONSUMER_GROUP_ID', 'Template-Consumer-Group-Id'),

    'consumer_client_id' => env('KAFKA_CONSUMER_CLIENT_ID', 'Template-Consumer-Client-Id'),

    /*
     | After the consumer receives its assignment from the coordinator,
     | it must determine the initial position for each assigned partition.
     | When the group is first created, before any messages have been consumed, the position is set according to a configurable
     | offset reset policy (auto.offset.reset). Typically, consumption starts either at the earliest offset or the latest offset.
     | You can choose between "latest", "earliest" or "none".
     */
    'offset_reset' => env('KAFKA_OFFSET_RESET', 'earliest'),

    /*
     | If you set enable.auto.commit (which is the default), then the consumer will automatically commit offsets periodically at the
     | interval set by auto.commit.interval.ms.
     */
    'auto_commit' => env('KAFKA_AUTO_COMMIT', false),

    'isolation_level' => env('KAFKA_ISOLATION_LEVEL', 'read_committed'),

    'max_poll_records_config' => env('KAFKA_MAX_POLL_RECORDS_CONFIG', 10),

    'schema_registry_url' => env('KAFKA_SCHEMA_REGISTRY_URL', 'http://localhost:8081'),

    'sleep_on_error' => env('KAFKA_ERROR_SLEEP', 5),

    'partition' => env('KAFKA_PARTITION', 1),

    /*
     | Kafka supports 4 compression codecs: none , gzip , lz4 and snappy
     */
    'compression' => env('KAFKA_COMPRESSION_TYPE', 'snappy'),

    /*
     | Choose if debug is enabled or not.
     */
    'debug' => env('KAFKA_DEBUG', false),
];
