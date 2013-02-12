<?php
# dispatch
class Dispatch
{

  function __construct()
  {
    #$this->autoloader('App', 'Controller');
    include(dirname(__DIR__) . '/Controller/Controller.php');
    include(dirname(__DIR__) . '/Model/Model.php');
    include(dirname(__DIR__) . '/View/View.php');
  }

  # set up controller & action
  public function dispatch()
  {
    $param = ereg_replace('/?$', '', $_SERVER['REQUEST_URI']);
    $params = array();

    if ('' != $param) {
      $params = explode('/', $param);
    }

    $controller = "Flickr";
    if (1 < count($params)) {
        $controller = ucfirst(strtolower($params['1']));
    }
    $className = $controller . 'Controller';

    $action= 'index';
    if (2 < count($params)) {
        $action= strtolower($params['2']);
    }

    # read & make
    try {
      include dirname(__DIR__) . '/Controller/' . $controller . 'Controller.php';

      # $this->autoloader($controller, 'controller');
      # $error = $controller . '_controller.php file is not found.';
      # throw new Exception($error);

      $controllerInstance = new $className();
      $controllerInstance->$action();

    } catch(Exception $e) {
      if (CONFIG_DEBUG === true){
        $error = '<h1>tackphp ERROR!</h1>' . $e->getMessage();
      } else {
        $error = 'Not Found';
      }
    }
  }

  # loader
  private function autoloader($name, $type)
  {
    $path = dirname(__DIR__) . '/' . strtolower($type) . '/' . $name . $type . '.php';
    if(file_exists($path)){
      include($path);
    }
    spl_autoload_register($name . $type);
  }
}
