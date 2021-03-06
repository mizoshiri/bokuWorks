<?php
class FlickrController
{
  # needs refuctaring
  public function __construct($modelName, $params)
  {
    $filePath = ORE_ROOT . '/ore/model/' . $modelName . '.php';
    if (!is_readable($filePath)) {
      throw new \InvalidArgumentException("Model is not found.");
    }else{
      require($filePath);
      $this->model = new $modelName();
    }
    $this->params = $params;
  }

  #root
  public function index()
  {
    $data = $this->model->getImages('test');
    return $data;
  }

  public function search()
  {
    $p = 1;
    if (isset($this->params['meta']['get']['p'])){
      $p = $this->params['meta']['get']['p'];
    }
    $data = $this->model->getImages($this->params['meta']['get']['s'], $p);
    return $data;
  }
}