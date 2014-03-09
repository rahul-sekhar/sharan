jQuery(function ($) {

  var eventList = $('.event-list').first();
  var eventFilters = eventList.find('.filters');

  // Get filtered events by AJAX
  function filterEvents() {
    var city, type;
    var data = {
      action: 'filter_events'
    };

    city = eventFilters.find('.city .selected');
    if (city.length > 0) {
      data['city_id'] = city.data('id');
    }

    type = eventFilters.find('.type .selected');
    if (type.length > 0) {
      data['type_id'] = type.data('id');
    }

    eventList.addClass('loading');
    $.get('/wp-admin/admin-ajax.php', data, function(response) {
      eventList.find('ul.events, p.no-results').replaceWith(response);
      eventList.removeClass('loading');
    });
  }

  // Handle filter selection
  eventFilters.on('click', 'ul a', function (e) {
    e.preventDefault();

    var link = $(this);
    var container = link.closest('.city, .type');

    if (link.hasClass('selected')) {
      link.removeClass('selected');
      container.find('.button').removeClass('active');
    } else {
      container.find('.selected').removeClass('selected');
      link.addClass('selected');
      container.find('.button').addClass('active');
    }

    filterEvents();
  });
});