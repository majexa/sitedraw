window.addEvent('domready', function() {
  document.getElement('.id_13 a').addEvent('click', function(e) {
    new Event(e).preventDefault();
    new Ngn.Dialog.Captcha({
      onOkClose: function() {
        new Ngn.Dialog.Link({ link: '/demo' });
      }
    });
  });
});
