@include('internal_layout.header')
@include('internal_layout.leftbar')
@section('content')
<script language="JavaScript"> 
    function select_payment(id){

        $('.payment-tr').hide();
        $('#payment-tr'+id).show();
    }
</script>

    <?php $pageTitle = $content_title; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><?php echo $pageTitle; ?> <small>(Payout)</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.show') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('widthdrawls.show') }}"> <?php echo $pageTitle; ?></a></li>
                <li class="active">Payout</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success">
                        
                        <div class="box-body">
                           @if (isset($errors) && count($errors) > 0)
                                <div class="alert alert-warning" role="alert">
                                    <ul class="list-unstyled mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if ($message = Session::get('success', false))
                                <p class="alert alert-success">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ $message }}
                                </p>
                            @endif
                            @if ($message = Session::get('error', false))
                                <p class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ $message }}
                                </p>
                            @endif
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><strong>Withdrawal Mode</strong></td>
                                            <td><?php 
                                                if ($sinnod[0]->payment_mode == 2) {
                                                    echo "Bank";
                                                }else{
                                                    echo "Paypal";
                                                }
                                            ?></td>
                                            <td><strong>Withdrawal From</strong></td>
                                            <td><?php 
                                            if ($sinnod[0]->withdrawal_type == 0) {
                                                echo "Publisher Balance";
                                            }else{
                                                echo "Referral Balance";
                                            }
                                            ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Amount Payable</strong></td>
                                            <td>$<?php echo $sinnod[0]->amount; ?></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <?php
                                        if ($sinnod[0]->payment_mode == 2) {
                                            
                                            ?>
                                            <tr>
                                                <td><strong>Payee Name</strong></td>
                                                <td><?php echo $sinnod[0]->withdrawalDetails[0]->payee_name; ?></td>
                                                <td><strong>Bank Name</strong></td>
                                                <td><?php echo $sinnod[0]->withdrawalDetails[0]->bank_name; ?></td>
                                            </tr>
                                            <tr>
                                                
                                                <td><strong>Account Number </strong></td>
                                                <td><?php echo $sinnod[0]->withdrawalDetails[0]->account_number; ?></td>
                                                <td><strong>Transaction ID</strong></td>
                                                <td><?php echo $sinnod[0]->withdrawalDetails[0]->bank_transaction_id; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Bank Address Line1</strong></td>
                                                <td><?php echo $sinnod[0]->withdrawalDetails[0]->address_line1; ?></td>
                                                <td><strong>Bank Address Line2</strong></td>
                                                <td><?php echo $sinnod[0]->withdrawalDetails[0]->address_line2; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>City</strong></td>
                                                <td><?php echo $sinnod[0]->withdrawalDetails[0]->city; ?></td>
                                                <td><strong>State</strong></td>
                                                <td><?php echo $sinnod[0]->withdrawalDetails[0]->state; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Swift/Routing No</strong></td>
                                                <td><?php echo $sinnod[0]->withdrawalDetails[0]->swift_number; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        if ($sinnod[0]->payment_mode == 3) {
                                            ?>
                                            <tr>
                                                <td><strong>Paypal Email</strong></td>
                                                <td><?php echo $sinnod[0]->withdrawalDetails[0]->paypal_email; ?></td>
                                                <td><strong>Transaction ID</strong></td>
                                                <td><?php echo $sinnod[0]->withdrawalDetails[0]->paypal_transaction_id; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        
                                        <tr>
                                            <td><strong>Status</strong></td>
                                            <td>
                                                <?php 
                                                if ($sinnod[0]->status == -1) {
                                                    echo "Pending";
                                                }else if($sinnod[0]->status == 1){
                                                    echo "Approved";
                                                }else{
                                                    echo "Rejected";
                                                } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Request Date</strong></td>
                                            <td><?php echo date("d-m-Y",$sinnod[0]->request_time); ?></td>
                                            <td><strong>Process Date</strong></td>
                                            <td><?php echo ($sinnod[0]->process_time == 0)?'-NA-':date("d-m-Y",$sinnod[0]->process_time); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <form method="post" action="{{ route('widthdrawls.paynow') }}">
                                <input type="hidden" value="<?php echo $sinnod[0]->id; ?>" name="hidid">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Amount Payable ($)</label>
                                            <input type="text" class="form-control" value="<?php echo $sinnod[0]->amount; ?>" name="txtAmount">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <br>
                                            <button type="submit" class="btn btn-success">Pay Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </section>
    </div>

    @endsection
@include('internal_layout.footer')