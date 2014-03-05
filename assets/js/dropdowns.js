jQuery(function ($) {

  var containers = $('.dropdown-container')

  console.log(containers.find('.dropdown-title'));

  containers.find('.dropdown-title').each(function () {
    $(this).nextUntil('.dropdown-title').wrapAll('<div class="dropdown-content"></div>');
  });
  containers.find('.dropdown-content').hide();

  containers.on('click', '.dropdown-title', function (e) {
    $(this).next('.dropdown-content').slideToggle();
  });
});