<?php

abstract class Controller
{
  protected $controller = DEFAULT_CONTROLLER;
  protected $action = 'index';
  protected $view;
  protected $request;

  public function __construct()
  {
    $this->request = new Request();
  }


  public function run()
  {
    try {

      $this->initializeModel();
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
    $className = ucfirst($this->controller) . 'Model';
    $path = dirname(__DIR__) . '/Model/' . $className.'.php';
    if (file_exists($path)) {
      include($path);
    }
    if (class_exists($className)) {
      $this->model = new $className();
    }
  }
}