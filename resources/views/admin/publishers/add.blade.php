
@include('internal_layout.header')
@include('internal_layout.leftbar')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Balance <small>(Add)</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.show') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('publishers.show') }}"> Balance</a></li>
                <li class="active">Add</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
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
                            <form action="{{ route('publishers_adamount.add') }}" method="POST">
                            @csrf
                                <input type="hidden" value="<?php echo $pubid; ?>" name="hidid">
                                <div class="row ">
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label>Amount ($)<span class="red">*&nbsp;</span><span class="error err_lvl"></span></label>
                                            <input type="number" name="txtBalance" class="form-control" required="" >
                                        </div>
                                    </div> 
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label>Click<span class="red">*&nbsp;</span><span class="error"></span></label>
                                            <input type="number" name="txtClick" class="form-control" required="" >
                                        </div>
                                    </div> 
                                    
                                    
                                </div>
                                
                                <div class="box-footer"> 
                                    <input type="submit" name="btnButton" id="btnaddform" value="Save" class="btn vd_btn vd_bg-green finish" /> &nbsp;
                                    <input type="button" name="btnButton" value="Back" class="btn vd_btn vd_bg-yellow" onclick="window.location.href='{{ route('publishers.show') }}" /> &nbsp;
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
            