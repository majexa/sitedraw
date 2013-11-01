#!/usr/bin/php
<?php

define('LOGS_PATH', __DIR__.'/site/logs');
require '/home/user/ngn-env/ws/init.php';
$config = require __DIR__.'/site/config/vars/ws.php';

use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

$server = IoServer::factory(new WsServer(new WsBase()), $config['port']);
$server->run();