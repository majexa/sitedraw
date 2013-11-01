#! /usr/bin/php
<?php

// queue manager //

define('NGN_PATH', '/home/user/ngn-env/ngn');
define('SITE_PATH', __DIR__.'/site');

define('WEBROOT_PATH', __DIR__);
require_once NGN_PATH.'/init/site-cli.php';
if (file_exists(SITE_PATH.'/init.php')) require SITE_PATH.'/init.php';

new ProjectQueueWorker(isset($_SERVER['argv'][1]) ? $_SERVER['argv'][1] : 1);
