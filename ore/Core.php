<?php
namespace ore;

class Core
{
  public function __construct($request)
  {
    $this->viewer = new libs\Viewer();
    $this->controller = new libs\Controller($request);
    $this->request = $request;
  }
}