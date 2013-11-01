<?php

class SdDemosQueue {

  /**
   * @var SdProjectItems
   */
  public $items;

  function __construct() {
    $this->items = new SdProjectItems;
  }

  function all() {
    return array_values($this->items->addF('package', 314)->addF('inUse', 0)->getItems());
  }

  function available() {
    return $this->all();
    return array_filter($this->all(), function($name) {
      return !(new PmLocalProjectRecords())->getRecord($name);
    });
  }

}