jQuery(function ($) {
  var form = $('#registration-form');
  var submit = form.find('input[type="submit"]');
  submit.attr('disabled', true).addClass('disabled');

  var requiredFields = form.find('input[required], textarea[required]').parent('.field');

  var checkField = function () {
    var val = $.trim(this.value);
    var input = $(this);
    var field = input.parent('.field');
    var type = input.attr('type');

    if (val && (!(type == 'email') || val.match(/.+@.+\..+/i))) {
      field.removeClass('invalid').addClass('valid');
    } else {
      field.removeClass('valid').addClass('invalid')
    }

    // Check if all fields are valid
    if (!requiredFields.is(':not(.valid)')) {
      submit.attr('disabled', false).removeClass('disabled');
    } else {
      submit.attr('disabled', true).addClass('disabled');
    }
  }

  form.on('keydown', '.invalid input[required],.invalid textarea[required]', checkField);
  form.on('blur', 'input[required], textarea[required]', checkField);

  // Debounce
  submit.on('click', function () {
    if(!submit.hasClass('disabled')) {
      submit.attr('disabled', true).addClass('disabled');
    }
  });
});