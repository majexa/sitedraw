<?php

define('NGN_PATH', '/home/user/ngn-env/ngn');
define('PROJECT_PATH', __DIR__.'/site');
define('WEBROOT_PATH', __DIR__);

require_once NGN_PATH.'/init/core.php';
$projects = require dirname(NGN_PATH).'/config/projects.php';
define('SITE_DOMAIN', Arr::getSubValue($projects, 'name', basename(__DIR__), 'domain'));

require_once NGN_PATH.'/init/site-cli.php';
if (file_exists(PROJECT_PATH.'/init.php')) require PROJECT_PATH.'/init.php';

if (strstr($_SERVER['argv'][1], '(')) { // eval
  $cmd = trim($_SERVER['argv'][1]);
  if ($cmd[strlen($cmd)-1] != ';') $cmd = "$cmd;";
  eval($cmd);
  return;
}

if (isset($_SERVER['argv'][1])) {
  $found = false;
  foreach (Ngn::$basePaths as $path) {
    $file = "$path/cmd/{$_SERVER['argv'][1]}.php";
    if (file_exists($file)) {
      require $file;
      $found = true;
      break;
    }
  }
}//
if (!$found) throw new NotFoundException($_SERVER['argv'][1]);