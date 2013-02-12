<?php

abstract class Model
{
  protected $controller = DEFAULT_CONTROLLER;
  protected $action = 'index';
  protected $view;
  protected $request;

  public function __construct()
  {

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


}