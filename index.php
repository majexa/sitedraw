<?php

define('NGN_PATH', '/home/user/ngn-env/ngn');
define('VENDORS_PATH', '/home/user/ngn-env/vendors');
define('SITE_PATH', __DIR__.'/site');
define('WEBROOT_PATH', __DIR__);

require_once SITE_PATH.'/config/constants/core.php';
require_once NGN_PATH.'/init/site-web.php';
if (file_exists(SITE_PATH.'/init.php')) require SITE_PATH.'/init.php';

print (new RouterManager)->router()->dispatch()->getOutput();
