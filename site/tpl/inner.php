<? if (Auth::check()) { ?>
<div id="table"></div>
<script>
  Ngn.Grid.defaultDialogOpts = {
    width: 250,
    height: 'auto',
    dialogClass: 'dialog fieldFullWidth'
  };
  var toolActions = Object.clone(Ngn.Grid.toolActions);
  toolActions.copy = function(row, opt) {
    new Ngn.loading(true);
    new Ngn.Request.JSON({
      url: this.options.basePath + '?a=json_copy&id=' + row.id,
      onComplete: function() {
        this.reload();
      }.bind(this)
    }).send();
  };
  new Ngn.Grid({
    menu: [Ngn.Grid.menu.new],
    toolActions: toolActions,
    tools: {
      copy: 'Копировать'
    }
  }).reload();
</script>
<? }
else { ?>
Авторизуйтесь
<? } ?>