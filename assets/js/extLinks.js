jQuery(function ($) {

  var checkLinks = function () {
    $('a').filter(function() {
       return this.hostname && this.hostname !== location.hostname;
    }).attr('target', '_blank');
  }

  checkLinks();
  $('body').on('checkLinks', checkLinks);

});