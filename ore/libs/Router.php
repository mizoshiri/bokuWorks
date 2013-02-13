<?php
namespace ore\libs;

class Router
{
  public function __construct()
  {
    $param = ereg_replace('/?$', '', $_SERVER['REQUEST_URI']);
    $this->reuqest = array(
        'controller' => DEFAULT_CONTROLLER,
        'action' => 'index',
        'meta' => null
    );
    if ('' !== $param) {
      $params = explode('/', $param);
      if (1 < count($params)) {
        $this->reuqests['controller'] = ucfirst($this->cleanUp($params['1']));
      }
      if (2 < count($params)) {
        $this->reuqest['action'] = $this->cleanUp($params['2']);
      }
      if (3 < count($params)) {
        $this->reuqest['meta'] = $this->requestData($params['3']);
      }
    }
  }

  private function requestData($getData)
  {
    foreach($_POST as $key => $value){
      $params['post'][$key] = $this->cleanUp($value);
    }

    #making get data from URL
    parse_str(ereg_replace('^\?', '', $getData), $gets);
    foreach($gets as $key => $value){
      $params['get'][$key] = $this->cleanUp($value);
    }
    return $params;
  }

  private function cleanUp($data)
  {
    return htmlspecialchars( urlencode ( strtolower($data) ) );
  }
}