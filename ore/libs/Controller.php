<?php
namespace ore\libs;

class Controller
{
  private $_content;

  public function __construct($request)
  {
    $className = $request['controller'] . 'Controller';
    $filePath = ORE_ROOT . '/ore/controller/' . $request['controller'] . 'Controller.php';
    if (!is_readable($filePath)) {
      throw new \InvalidArgumentException("Controller is not found.");
    } else {
      require($filePath);
      $this->class = new $className($request['controller'], $request);
    }
  }

}