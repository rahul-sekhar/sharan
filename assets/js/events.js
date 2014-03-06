jQuery(function ($) {

  var eventList = $('.event-list').first();
  var eventFilters = eventList.find('.filters');
  var filterDropdowns = eventFilters.find('.city-list, .type-list');

  // Get filtered events by AJAX
  function filterEvents() {
    var city, type;
    var data = {
      action: 'filter_events'
    };

    city = eventFilters.find('.city-list .selected');
    if (city.length > 0) {
      data['city_id'] = city.data('id');
    }

    type = eventFilters.find('.type-list .selected');
    if (type.length > 0) {
      data['type_id'] = type.data('id');
    }

    $.get('/wp-admin/admin-ajax.php', data, function(response) {
      eventList.find('ul.events, p.no-results').replaceWith(response);
    });
  }

  // Handle filter selection
  filterDropdowns.on('click', 'a', function (e) {
    e.preventDefault();

    var link = $(this);
    var container = link.closest('.city-list, .type-list');
    var button;
    if (container.hasClass('city-list')) {
      button = eventFilters.find('.city');
    } else {
      button = eventFilters.find('.type');
    }

    if (link.hasClass('selected')) {
      link.removeClass('selected');
      button.removeClass('active');
    } else {
      container.find('.selected').removeClass('selected');
      link.addClass('selected');
      button.addClass('active');
    }

    filterEvents();
  });

  // Show filter dropdowns
  eventFilters.find('.city, .type').on('click', function (e) {
    e.preventDefault();
    e.stopPropagation();

    if ($(this).hasClass('city')) {
      eventFilters
        .find('.type-list').removeClass('shown').end()
        .find('.city-list').toggleClass('shown');
    } else {
      eventFilters
        .find('.city-list').removeClass('shown').end()
        .find('.type-list').toggleClass('shown');
    }
  });

  // Hide dropdowns on clicking outside them
  filterDropdowns.on('click', function(e) {
    e.stopPropagation();
  });
  $('html').on('click', function(e) {
    filterDropdowns.removeClass('shown');
  });
});