<?php
class View
{
  public function display()
  {
    include(dirname(__DIR__) . '/View//layout/layout.php');
  }
}