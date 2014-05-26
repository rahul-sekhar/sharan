jQuery(function ($) {
  return;
  var form = $('#registration-form');

  var requiredFields = form.find('input[required], textarea[required]');

  requiredFields.on('blur', function (e) {
    if ($.trim(this.value)) {
      $(this).removeClass('invalid').addClass('valid');
    } else {
      $(this).removeClass('valid').addClass('invalid')
    }
  });
});