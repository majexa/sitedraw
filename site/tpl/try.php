<? if (Auth::get('id')) { ?>
  <a href="/interviews" class="btn btnLarge"><span>Мои опросы <small>(<?= UsersCore::getTitle(Auth::get('id')) ?>)</small></span></a>
  <a href="?logout=1" class="login">Выйти</a>
<? } else { ?>
<a href="" class="btn btnLarge try"><span>Попробовать</span></a>
<a href="" class="login auth pseudoLink">Войти</a>
<script>
  Ngn.addBtnsAction('a.try', function(eBtn) {
    new Ngn.Dialog.Auth({
      selectedTab: 1,
      completeUrl: '/interviews'
    });
  });
  Ngn.addBtnsAction('a.auth', function(eBtn) {
    new Ngn.Dialog.Auth({
      selectedTab: 0,
      completeUrl: '/interviews'
    });
  });
</script>
<? } ?>
