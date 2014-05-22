jQuery(function ($) {
  var nav = $('.news.side-nav');

  // Form yearly lists
  getYear = function (li) {
    var date = li.text();
    return date.slice(-4);
  }

  getMonth = function(li) {
    var date = li.text();
    return date.slice(0, -5);
  }

  nav.find('ul.all li').each(function () {
    var li = $(this);
    var year = getYear(li);
    var month = getMonth(li);

    var yearList = nav.find('ul.year-' + year);
    if (yearList.length == 0) {
      yearList = $('<ul class="year-' + year + '"></ul>');
      yearList.appendTo(nav);
      yearList.append('<li class="title"><a href="#">' + year + '</a></li>')
    }
    li.find('a').text(month);
    li.appendTo(yearList);
  });

  nav.find('ul.all').remove()

  // Hide all years but the first initially
  nav.find('ul:not(:first)').find('li:not(.title)').hide();
  nav.find('ul:first').addClass('shown');

  // Dropdown months
  nav.on('click', '.title a', function (e) {
    e.preventDefault();

    var li = $(this).parent('li');
    li.nextAll().slideToggle();

    li.parent('ul').toggleClass('shown');
  });
  // var containers = $('.dropdown-container')

  // containers.find('.dropdown-title').wrapInner('<a href="#"></a>').each(function () {
  //   $(this).nextUntil('.dropdown-title').wrapAll('<div class="dropdown-content"></div>');
  // });
  // containers.find('.dropdown-content').hide();

  // containers.on('click', '.dropdown-title a', function (e) {
  //   e.preventDefault();

  //   var title = $(this).parent('.dropdown-title')
  //   title.next('.dropdown-content').slideToggle();
  //   title.toggleClass('expanded');
  // });
});