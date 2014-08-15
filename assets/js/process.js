jQuery(function ($) {
  window.processRecipes = function () {
    var pageTitle = $('h2').text();

    var containers = $('.dropdown-container');
    var titles = containers.find('.dropdown-title');

    var data = [];

    titles.each(function () {
      title = $(this);

      obj = {};
      obj.title = title.text();

      el = title;
      heading = el.prevAll('h3');
      i = 0;
      while(heading.length == 0) {
        i += 1;
        if (i > 10) break;
        el = el.parent();
        heading = el.prevAll('h3');
      }
      obj.subcategory = heading.first().text();

      obj.content = title.next('.dropdown-content').html();

      data.push(obj);
    });

    $.post('/wp-admin/admin-ajax.php', { action: 'process_recipes', data: data, title: pageTitle }, function (response) {
      console.log(response);
    });
  };
});