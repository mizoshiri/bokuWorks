<?php
namespace ore\libs;

class Autoloader
{
  public function register($registFunction)
  {
    spl_autoload_register($registFunction);
  }

  public function load($className)
  {
    $paths = explode('\\', $className);
    $filePath = ORE_ROOT . "/" . implode('/', $paths) . '.php';
    if (is_readable($filePath)) {
      require_once($filePath);
    }
  }
}