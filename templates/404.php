<div class="content error">
  <h2>Oops!</h2>
  <p>Sorry, but we couldn't find the page you requested.</p>

  <h3>Search our website</h3>
  <div class="custom-search">
    <script>
      (function() {
        var cx = '<?php echo GOOGLE_CUSTOM_SEARCH_ID; ?>';
        var gcse = document.createElement('script');
        gcse.type = 'text/javascript';
        gcse.async = true;
        gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
            '//www.google.com/cse/cse.js?cx=' + cx;
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(gcse, s);
      })();
    </script>
    <gcse:search></gcse:search>
  </div>
</div>