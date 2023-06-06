@include('internal_layout.header')
@include('internal_layout.leftbar')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ $main_content }} <small>(Add)</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.show') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('finance.list') }}"> {{ $content_title }}</a></li>
                <!-- <li class="active">Add</li> -->
            </ol>
        </section>
        <link rel="stylesheet" href="{{ asset('assets/front/css/payment_page.css') }}">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <h3>Transfer Funds to: <b>{{ $client->username }}</b></h4>
                </div>
                <div class="col-md-6">
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="row" style="margin-top: 3rem">
                <div class="col-xs-12">
                    <div class="col-md-4">
                        <div class="thumbnail" data-toggle="modal" data-target="#paymentModal">
                            <div class="caption text-center">
                                <div class="position-relative">
                                    <img src="{{ asset('assets/front/images/payment/stripe1.png') }}" width="60%" />
                                </div>
                                <h4 id="thumbnail-label"><b>Stripe</b></h4>
                                <div class="thumbnail-description smaller">Funds will be loaded to your account in 5
                                    minutes after you proceed the payment.</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>



        <!-- Modal -->
        <div id="paymentModal" class="modal fade  " role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Payment Details</h4>
                    </div>
                    <div class="modal-body">

                        <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                            data-cc-on-file="false" data-stripe-publishable-key="{{ config('payment.stripe_key') }}"
                            id="payment-form">
                            @csrf
                            <input type="hidden" name="publisher_id" value="{{ $client->id }}">
                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Name on Card</label> <input class='form-control'
                                        size='4' type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 form-group card required'>
                                    <label class='control-label'>Card Number</label> <input autocomplete='off'
                                        class='form-control card-number' size='20' type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-3 form-group cvc required'>
                                    <label class='control-label'>CVC</label> <input autocomplete='off'
                                        class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'
                                        maxlength="3">
                                </div>
                                <div class='col-xs-12 col-md-3 form-group expiration required'>
                                    <label class='control-label'>Expiration</label> <input
                                        class='form-control card-expiry-month' placeholder='MM' size='2'
                                        maxlength="2" type='text'>
                                </div>
                                <div class='col-xs-12 col-md-3 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label> <input
                                        class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                        maxlength="4" type='text'>
                                </div>
                                <div class='col-xs-12 col-md-3 form-group expiration required'>
                                    <label class='control-label'>Amount</label> <input
                                        class='form-control card-payment-amount' placeholder='0000' name="amount"
                                        type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-md-12 error form-group hide'>
                                    <div class='alert-danger alert'>Please correct the errors and try
                                        again.</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@include('internal_layout.footer')




<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function() {

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
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
                    // payment_amount: $('.card-payment-amount').val()
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
</script>
