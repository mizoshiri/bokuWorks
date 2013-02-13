<?php
use ore\libs\Autoloader;
use ore\libs\Dispatcher;

require('../ore/Config.php');
require(ORE_ROOT . '/ore/libs/Autoloader.php');

$autoloader = new Autoloader();
$autoloader->register(array($autoloader, 'load'));


StartController::run();


class StartController
{
  public static function run()
  {
    $dispatcher = new Dispatcher();
    $dispatcher->boot();
  }
}

?>