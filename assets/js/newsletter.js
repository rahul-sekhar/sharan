jQuery(function ($) {
  var form = $('#subscribe-form');
  var emailInput = $('#subscribe-email');

  // Remove any messages and success class when the input is changed
  emailInput.on('change', function (e) {
    form.removeClass('success').find('.message').remove();
  });

  form.on('submit', function (e) {
    e.preventDefault();

    // Do not do anything if an email is not set
    var email = emailInput.val();
    if (!email) {
      return;
    }

    // Set a loading icon
    form.find('button').attr('disabled', true)
      .find('i').attr('class', 'icon-spin6 animate-spin');

    // Send the request
    $.post('/wp-admin/admin-ajax.php', { action: 'subscribe', email: email }, function(response) {

      // Clear the loading icon
      form.find('button').attr('disabled', false)
        .find('i').attr('class', 'icon-ok');

      // On failure, add a message
      if (response == 0) {
        form.find('.subscribe-email-box').before('<div class="message error">An error occurred</div>');
        return;
      }

      // On success display the message and add a success class
      form.addClass('success')
        .find('.subscribe-email-box').before('<div class="message">' + response + '</div>');
    });
  });

});