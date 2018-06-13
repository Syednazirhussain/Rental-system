@extends('company.default')

@section('content')

    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Company Hr / </span>Add Company Hr</h1>
        </div>

        @include('company.company_hrs.fields')

    </div>






@endsection
<script type="text/javascript">


    $(function() {
      var $wizard = $('#wizard-validation');

      $wizard.pxWizard();

      // Init plugins
      $('#wizard-country').select2({
        placeholder: 'Select your country...'
      }).change(function() { $(this).valid(); });
      $('#wizard-postal-code').mask("999999");
      $('#wizard-credit-card-number').mask("9999 9999 9999 9999");
      $('#wizard-csv').mask("999");
      $('[data-toggle="tooltip"]').tooltip();

      // Rules

      $('#wizard-account').pxValidate({
        ignore: '.ignore',
        focusInvalid: false,
        rules: {
          'wizard-username': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'wizard-password': {
            required:  true,
            minlength: 6,
            maxlength: 20,
          },
          'wizard-repeat-password': {
            required:  true,
            minlength: 6,
            equalTo:   'input[name="wizard-password"]',
          },
          'wizard-email': {
            required: true,
            email:    true,
          },
        },
      });

      $("#wizard-profile").pxValidate({
        ignore: '.ignore, .select2-input',
        focusInvalid: true,
        rules: {
          'wizard-full-name': {
            required: true,
          },
          'wizard-country': {
            required: true,
          },
          'wizard-gender': {
            required: true,
          },
        },
      });

      $("#wizard-credit-card").pxValidate({
        ignore: '.ignore',
        focusInvalid: true,
        rules: {
          'wizard-postal-code': {
            required:    true,
            digits:      true,
            rangelength: [6, 6],
          },
          'wizard-credit-card-number': {
            required:   true,
            creditcard: true,
          },
          'wizard-csv': {
            required:    true,
            digits:      true,
            rangelength: [3, 3],
          },
        },
      });

      // Validate

      $wizard.on('stepchange.px.wizard', function(e, data) {
        // Validate only if jump to the forward step
        if (data.nextStepIndex < data.activeStepIndex) { return; }

        var $form = $wizard.pxWizard('getActivePane');

        if (!$form.valid()) {
          e.preventDefault();
        }
      });

      // Finish

      $wizard.on('finished.px.wizard', function() {
        //
        // Collect and send data...
        //

        $('#wizard-finish').find('.ion-checkmark-round').removeClass('ion-checkmark-round').addClass('ion-checkmark-circled');
        $('#wizard-finish').find('h4').text('Thank You!');
        $('#wizard-finish').find('button').remove();
      });

    });
    
  $('#daterange-3').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
      });

  $('#daterange-4').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
      });
</script>