jQuery(function ($) {
  var events = $('#events');
  var eventList = events.find('.event-list ul.events');

  events.on('click', '.event.content .close', function (e) {
    e.preventDefault();

    events.find('.event.content').empty();
    events.removeClass('single');
    var title = 'Events | Sharan';
    document.title = title;

    addHistory('/events');
  });

  eventList.on('click', 'a', function (e) {
    if (e.ctrlKey || e.metaKey) {
      return;
    }
    e.preventDefault();

    events.addClass('single');
    events.find('.event.content')
      .empty()
      .append('<div class="loader"></div>');

    var url = this.href;
    $.get(url, function (eventPage) {
      var newContent = $('.event.content', eventPage);
      events.find('.event.content').replaceWith(newContent);

      var title = newContent.find('h3').text();
      title += ' | Sharan'
      document.title = title;

      addHistory(url);
      $('body').trigger('checkLinks');
    });
  });

  if (window.history && history.pushState) {
    var popped = ('state' in window.history && window.history.state !== null)

    window.addEventListener("popstate", function(e) {
      if (popped) {
        location.href = location.pathname;
      } else {
        popped = true
      }
    });
  }

  function addHistory(url) {
    if (window.history && history.pushState) {
      history.pushState(null, null, url)
    }
  }
});