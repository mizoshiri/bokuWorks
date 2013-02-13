<?php
namespace ore\libs;

# dispacter
class Dispatcher
{
  # request function refuct
  public function __construct()
  {
    $this->router = new \ore\libs\Router;
    $this->request = $this->router->reuqest;
  }

  public function boot()
  {
    try {
      $core = new \ore\Core($this->request);
      $controller = $core->controller->class;
      $action = $this->request["action"];

      $core->viewer->render($this->request, $controller->$action());
    } catch (\Exception $e) {
      echo $e->getMessage();
    }
  }

}