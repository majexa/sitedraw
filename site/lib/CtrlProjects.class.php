<?php

class CtrlProjects extends CtrlBase {
use DdCrudAbstractCtrl, DdCrudAuthorCtrl;

  protected function id() {
    return $this->req->rq('id');
  }

  protected function init() {
    if (!Auth::check()) $this->redirect('/');
  }

    protected function getStrName() {
        return 'projects';
    }

  protected function getIm() {
    return new DdItemsManager($this->items(), new ProjectForm($this->getStrName(), $this->items()));
  }

  protected function _items() {
    $items = new SdProjectItems;
    $items->cond->setOrder('dateCreate DESC');
    return $items;
  }

  protected function oProcessDdo1(Ddo $ddo) {
    $ddo->ddddByName['panel'] = '`<a href="http://`.$o->items[$id][`domain`].`/c/auth/keyLogin/`.DbModelCore::get(`users`, $o->items[$id][`authorId`])[`actCode`].`?url=/cpanel" target="_blank" title="Управление проектом" class="gray">упр.</a>`';
    $ddo->ddddByName['title'] = '`<a href="http://`.$o->items[$id][`domain`].`" target="_blank">`.$v.`</a>`';
    $ddo->fields = Arr::injectAfter($ddo->initFields()->fields, 'title', [[
      'type' => 'staticText',
      'title' => '',
      'name' => 'panel',
      'forceEmpty' => true
    ]], 'name');
  }

  function action_default() {
    $this->setPageTitle('Мои проекты');
    $this->d['items'] = $this->items()->getItems();
    $this->d['tpl'] = 'inner';
  }

  function action_json_copy() {
    $this->items()->copy($this->req['id']);
  }

}