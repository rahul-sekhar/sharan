jQuery(function ($) {
  var form = $('.inner-container.form form');
  if (form.length == 0) {
    return;
  }

  var requiredFields = form.find('input[required], textarea[required]').parent('.field');
  if (requiredFields.length == 0) {
    return;
  }

  var submit = form.find('input[type="submit"]');
  submit.attr('disabled', true).addClass('disabled');

  var checkFields = function () {
    requiredFields.each(function () {
      var field = $(this);
      var input = field.find('input, textarea')
      var val = $.trim(input.val());
      var type = input.attr('type');

      if (val && (!(type == 'email') || val.match(/.+@.+\..+/i))) {
        field.removeClass('invalid').removeClass('invalid-silent').addClass('valid');
      } else {
        field.removeClass('valid').addClass('invalid-silent')
      }
    });

    // Check if all fields are valid
    if (!requiredFields.is(':not(.valid)')) {
      submit.attr('disabled', false).removeClass('disabled');
    } else {
      submit.attr('disabled', true).addClass('disabled');
    }
  }

  form.on('keyup', 'input[required],textarea[required]', checkFields);
  form.on('blur', 'input[required],textarea[required]', function () {
    checkFields();
    var field = $(this).parent('.field');
    if (field.hasClass('invalid-silent')) {
      field.addClass('invalid');
    }
  });

  // Debounce
  form.on('submit', function () {
    if(!submit.hasClass('disabled')) {
      submit.attr('disabled', true).addClass('disabled');
    }
  });
});