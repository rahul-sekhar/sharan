jQuery(function ($) {
  var body = $('body');
  var banner = $('#banner');
  var nav = banner.find('#main-nav');

  // Main nav pull
  banner.find('#nav-pull').on('click', function (e) {
    e.preventDefault();

    body.toggleClass('nav-shown');
    nav.find('.show-dropdown').removeClass('show-dropdown');
  });

  // Nav dropdowns
  nav.on('click', 'li.has-dropdown > a', function (e) {
    e.preventDefault();

    var li = $(this).parent('li');

    if (li.hasClass('show-dropdown')) {
      li.removeClass('show-dropdown');
      return;
    }

    nav.find('.show-dropdown').removeClass('show-dropdown');
    li.addClass('show-dropdown');
  });

  // Page side nav
  $('.side-nav-pull').on('click', function (e) {
    e.preventDefault();

    $(this).closest('.inner-container').toggleClass('side-nav-shown');
  });
});