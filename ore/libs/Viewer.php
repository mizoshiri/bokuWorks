<?php
namespace ore\libs;

class Viewer
{
  private $_content;

  public function __construct()
  {
    #
  }

  public function render($requests, $data)
  {

    $filePath = ORE_ROOT . '/ore/view/' . $requests['controller'] . '/' . $requests['action'] . '.php';
    ob_start();
    if (!is_readable($filePath)) {
      throw new \InvalidArgumentException('View is not found.');
    } else {
      require($filePath);
    }

    $this->_content = ob_get_clean();
    require_once(ORE_ROOT . '/ore/view/layout/layout.php');
    exit;
  }
}