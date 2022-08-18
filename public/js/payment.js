//Payment Window Toggler
$(document).ready(function(){
    $('#paymentbtn').click(function(){
        $('#paymentwindow').slideToggle("slow");
    })
})

//Payment Window Toggler
$(document).ready(function(){
    $('#paymentwinclose').click(function(){
        $('#paymentwindow').slideToggle("slow");
    })
})

//Payment Function
$(function() {
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
      var $form = $(".require-validation"),
      inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
      $inputs = $form.find('.required').find(inputSelector),
      $errorMessage = $form.find('div.error'),
      valid = true;
      $errorMessage.addClass('hide');
      $('.has-error').removeClass('has-error');
      $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
              $input.parent().addClass('has-error');
              $errorMessage.removeClass('hide');
              e.preventDefault();
          }
      });
      if (!$form.data('cc-on-file')) {
        e.preventDefault();
        Stripe.setPublishableKey($form.data('stripe-publishable-key'));
        Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
      }
    });
  
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  });

