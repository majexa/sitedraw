<?php

$items = new SdProjectItems;
$items->cond->addRangeFilter('dateUpdate', false, dbCurTime(time()-6*60*60))->addF('inUse', true);
$items->prepareItemsConds();
$n = 0;
$protoWebroot = (new PmLocalProject($items->getItem(Config::getVar('demoProtoProjectId'))))['webroot'];
foreach ($items->getItems() as $v) {
  $curWebroot = (new PmLocalProject($v))['webroot'];
  Dir::clear($curWebroot);
  Dir::copy($protoWebroot, $curWebroot);
  output("$curWebroot updated");
}