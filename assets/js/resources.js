jQuery(function ($) {
  var description, bookList;

  // Show book descriptions
  description = $('<li class="description"></li>');
  $('body').on('click', 'li.description .close', function (e) {
    e.preventDefault();
    bookList.find('.selected').removeClass('selected');
    description.remove();
  });

  bookList = $('ul.books');
  bookList.on('click', 'li.resource', function (e) {
    e.preventDefault();

    var resource = $(this);
    if (resource.hasClass('selected')) {
      return;
    }

    var descriptionContent = $('<div class="description-content"></div>')
      .append(resource.find('.description').contents().clone());
    var descriptionImage = resource.find('img').clone();

    description.empty()
      .append('<a href="#" class="close"></a>')
      .append(descriptionImage)
      .append(descriptionContent.find('.buy'))
      .append(descriptionContent);

    bookList.find('.selected').removeClass('selected');
    resource.addClass('selected');

    resourceBottom = resource.offset().top + resource.outerHeight();
    var lastRowItem = resource;
    while(lastRowItem.next('li.resource').length && lastRowItem.next('li.resource').offset().top < resourceBottom) {
      lastRowItem = lastRowItem.next();
    }

    lastRowItem.after(description);
  });



  // Filtering
  var resourceFilters = $('.resource-filters')
  resourceFilters.on('click', 'a', function (e) {
    e.preventDefault();

    resourceFilters.find('.selected').removeClass('selected');
    $(this).parent('li').addClass('selected');

    description.remove();
    bookList.find('.selected').removeClass('selected');

    var tagId = $(this).data('id');
    $('.resource:not(.tag-' + tagId + ')').hide();
    $('.resource.tag-' + tagId).show();
  });

  if (resourceFilters.find('.selected').length == 0) {
    resourceFilters.find('li').first().addClass('selected');
  }
  resourceFilters.find('.selected a').click();
});