<?php

class CtrlSitedrawDefault extends CtrlCommon {
use SdDefaultCtrl, HomeCtrl;

  function action_default() {
    /*
    try {
      $html = file_get_contents('http://sitedrawhome.sitedraw.ru/index.html');
    } catch (Exception $e) {
      $html = Tt()->getTpl('auth/login');
    }
    */
    $html = Tt()->getTpl('auth/login');
    $html = str_replace('</head>', "<script src=\"/m/js/design.js\"></script>\n</head>", $html);
    $this->processExportedHtml($html);
  }

  function action_demo() {
    $queue = new SdDemosQueue;
    if (($available = $queue->available())) {
      $item = $available[array_rand($available)];
      $queue->items->update($item['id'], ['inUse' => true]);
      $this->redirect('http://'.$item['domain'].'/c/auth/keyLogin/'.DbModelCore::get('users', $item['authorId'])['actCode'].'?url=/cpanel');
    } else throw new Exception('no available demos');
  }

}