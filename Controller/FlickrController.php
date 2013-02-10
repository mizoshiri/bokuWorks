<?php
class FlickrController extends Controller
{

  public function __construct()
  {
    #$this->view = new FlickerView();
    #$this->model = new FlickrModel();
  }

  #root
  public function index()
  {
    echo 'Hello World!';
 #   $this->model->find();
      #$this->view->display();
  }
}