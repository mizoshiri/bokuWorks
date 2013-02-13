<?php
namespace ore\libs;

# dispacter
class Dispatcher
{
  # request function refuct
  public function __construct()
  {
    $this->request = $this->_reuqestsMaker();
    #$this->anote_path = (@$get['anote_path'] === null) ? 'index' : $this->_getFormattedAnotePath($get['anote_path']);
  }

  public function boot()
  {
    try {
      $core = new \ore\Core($this->request);
      $controller = $core->controller->class;
      $action = $this->request["action"];

      $core->viewer->render($this->request, $controller->$action());
    } catch (\Exception $e) {
      echo $e->getMessage();
    }
  }

  private function _reuqestsMaker()
  {
    $param = ereg_replace('/?$', '', $_SERVER['REQUEST_URI']);
    $reuqest = array(
        'controller' => DEFAULT_CONTROLLER,
        'action' => 'index',
        'meta' => null
    );
    if ('' !== $param) {
      $params = explode('/', $param);
      if (1 < count($params)) {
        $reuqests['controller'] = ucfirst(strtolower($params['1']));
      }
      if (2 < count($params)) {
        $reuqest['action'] = strtolower($params['2']);
      }
      if (3 < count($params)) {
        $reuqest['meta'] = strtolower($params['3']);
      }
    }
    return $reuqest;
  }
}