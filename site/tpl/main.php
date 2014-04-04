<? // шаблон для personal зоны ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title><?= $d['pageHeadTitle'] ?></title>
  <?= Sflm::frontend('css')->getTags('site') ?>
  <?= Sflm::frontend('js')->getTags('core') ?>
  <?= Sflm::frontend('js')->getTags('dialogs') ?>
  <?= Sflm::frontend('js')->getTags('grid') ?>
  <?= Sflm::frontend('js')->getTags('siteAuth') ?>
</head>
<body>
<div id="layout">
  <div class="container">
    <a href="/" src="/m/img/smLogo.png" class="logo"><img src="/m/img/smLogo.png" /></a>
    <div class="header">
      <? $this->tpl('top', ['links' => ['projects list' => ['Мои проекты', '/projects']]]) ?>
      <h1><?= $d['pageTitle'] ?></h1>
      <div class="clear"><!-- --></div>
    </div>
    <? $this->tpl($d['tpl'], $d) ?>
    <div class="push"></div>
  </div>
</div>
</body>

</html>