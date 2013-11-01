<?php

$items = new SdProjectItems;
for ($i=0; $i<100; $i++) $items->copy(Config::getVar('demoProtoProjectId'));