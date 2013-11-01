<?php

class ProjectForm extends DdForm {

  /**
   * @var DbItems
   */
  protected $items;

  function __construct($strName, UpdatableItems $items) {
    $this->items = $items;
    parent::__construct(new DdFields($strName, ['getDisallowed' => Misc::isAdmin()]), $strName);
  }

  /*
  protected function _initErrors() {
    $el = $this->getElement('name');
    if ($this->isUsed($el->value())) {
      $el->error('К сожалению такое имя ('.$el->value().') уже занято. За-то свободны: '.$this->getUnused($el->value()));
    }
  }
  */

  protected function isUsed($v) {
    return (bool)(new PmLocalProjectRecords())->getRecord($v);
  }

  function getUnused($v) {
    $r = [];
    for ($i = 1; $i < 10; $i++) if (!$this->isUsed("$v$i")) $r[] = "$v$i";
    return implode(', ', $r);
  }

}