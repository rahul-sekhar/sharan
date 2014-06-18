jQuery(function ($) {

  $(document).on('click', '.search-link', function (e) {
    e.preventDefault();
    code = $(this).closest('.custom-search').data('cseId')
    $(this).replaceWith('<gcse:search />')

    var cx = code;
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);

  });

});