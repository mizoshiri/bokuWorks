<?php
class FlickrController extends Controller
{

  public function __construct()
  {
    $this->model = $this->initializeModel();
    $this->view = $this->initializeView();
  }

  #root
  public function index()
  {
    #var_dump($this->model);
    #$this->model->getImages('keyword', 30, 'small', $attributes);
 #   $this->model->find();
    $this->view->display();
  }
}