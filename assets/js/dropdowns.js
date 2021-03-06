jQuery(function ($) {
  var containers = $('.dropdown-container')

  containers.find('.dropdown-title').wrapInner('<a href="#"></a>').each(function () {
    $(this).nextUntil('.dropdown-title').wrapAll('<div class="dropdown-content"></div>');
  });
  containers.find('.dropdown-content').hide();

  containers.on('click', '.dropdown-title a', function (e) {
    e.preventDefault();

    var title = $(this).parent('.dropdown-title')
    title.next('.dropdown-content').slideToggle();
    title.toggleClass('expanded');
  });
});