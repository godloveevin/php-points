<?php
session_start();
$_SESSION['sessionid'] = 'this is session content!';

/*$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

// redis 用 session_id 作为 key 并且是以 string 的形式存储
if($redis->set(session_id(), $_SESSION['sessionid'])){
    echo $redis->get(session_id());
}*/