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
    $pager = $this->pager($requests, $data);
    if (!is_readable($filePath)) {
      throw new \InvalidArgumentException('View is not found.');
    } else {
      require($filePath);
    }

    $this->_content = ob_get_clean();
    require_once(ORE_ROOT . '/ore/view/layout/layout.php');
    exit;
  }

  #pager
  public function pager($requests, $data) {
    $currentPage = $data['page'];
    $totalPage = $data['pages'];
    $showNavigation = 10;

    if ($totalPage < $showNavigation) {
      $showNavigation = $totalPage;
    }

    # setting middle of pager
    $showNavigationHead = floor($showNavigation / 2);
    $loopStart = $currentPage - $showNavigationHead;
    $loopEnd = $currentPage + $showNavigationHead;

    if ($loopStart <= 0) {
      $loopStart  = 1;
      $loopEnd = $showNavigation;
    }
    if ($loopEnd > $totalPage) {
      $loopStart  = $totalPage - $showNavigation + 1;
      $loopEnd =  $totalPage;
    }

    #making data
    $data = '<ul>';
        for ($i=$loopStart; $i<=$loopEnd; $i++) {
          if ($i > 0 && $totalPage >= $i) {
            if ($i == $currentPage) {
              $data .= '<li class="active">' . $i . '</li>';
            } else {
              $data .= '<li><a href="/'. $requests['controller'] . '/search/?s=' . $requests['meta']['get']['s'] . '&p=' . $i .'">' . $i . '</a></li>';
            }
          }
        }
    $data .= '</ul>';
    return $data;
  }

}