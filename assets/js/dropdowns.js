jQuery(function ($) {

  var containers = $('.dropdown-container')

  console.log(containers.find('.dropdown-title'));

  containers.find('.dropdown-title').nextAll().wrapAll('<div class="dropdown-content"></div>');
  containers.find('.dropdown-content').hide();

  containers.on('click', '.dropdown-title', function (e) {
    $(this).closest('.dropdown-container').find('.dropdown-content').slideToggle();
  });
});