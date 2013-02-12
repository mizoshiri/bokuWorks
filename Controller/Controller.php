<?php
abstract class Controller
{
  protected $controller = DEFAULT_CONTROLLER;
  protected $action = 'index';
  protected $view;
  protected $request;

  public function __construct()
  {
    #$this->request = new Request();
    #this->initializeModel();
    #$this->initializeView();
  }


  public function run()
  {
    try {

      $this->initializeModel();
      $this->initializeView();
      $this->preAction();

    } catch (Exception $e) {
      # logs
    }
  }

  # add common method here
  protected function preAction()
  {
  }

  # make Model instance
  protected function initializeModel()
  {
    $className = ucfirst($this->controller);
    $path = dirname(__DIR__) . '/Model/' . $className.'.php';
    if (file_exists($path)) {
      include($path);
    }
    if (class_exists($className)) {
      $this->model = new $className();
      return $this->model;
    }
  }

  # make View instance
  public function initializeView()
  {
    $controller = ucfirst($this->controller);
    $name = strtolower($this->action);

    $path = dirname(__DIR__) . '/View/' . $controller . "/" .$name.'.php';
    if (file_exists($path)) {
      include($path);
    }
    $this->view = new View();
    return $this->view;
  }
}