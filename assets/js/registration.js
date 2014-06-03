jQuery(function ($) {
  var form = $('#registration-form');
  var submit = form.find('input[type="submit"]');
  submit.attr('disabled', true).addClass('disabled');

  var requiredFields = form.find('input[required], textarea[required]').parent('.field');

  var checkFields = function () {
    var input = $(this);
    var field = input.parent('.field');

    field.addClass('focussed');

    requiredFields.each(function () {
      var field = $(this);
      var input = field.find('input, textarea')
      var val = $.trim(input.val());
      var type = input.attr('type');

      if (val && (!(type == 'email') || val.match(/.+@.+\..+/i))) {
        field.removeClass('invalid').addClass('valid');
      } else if (field.hasClass('focussed')) {
        field.removeClass('valid').addClass('invalid')
      }
    })

    // Check if all fields are valid
    if (!requiredFields.is(':not(.valid)')) {
      submit.attr('disabled', false).removeClass('disabled');
    } else {
      submit.attr('disabled', true).addClass('disabled');
    }
  }

  form.on('keydown', '.invalid input[required],.invalid textarea[required]', checkFields);
  form.on('blur', 'input[required], textarea[required]', checkFields);

  // Debounce
  form.on('submit', function () {
    if(!submit.hasClass('disabled')) {
      submit.attr('disabled', true).addClass('disabled');
    }
  });
});