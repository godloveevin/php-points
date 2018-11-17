<?php
$redis = new Redis();
$redis->connect('127.0.0.1',6379);
$redis->set('mykey1','hello');
$redis->set('mykey2','world');
$value1 = $redis->get('mykey1');
$value2 = $redis->get('mykey2');
echo 'mykey1: '.$value1.' and mykey2: '.$value2;
$redis->close();