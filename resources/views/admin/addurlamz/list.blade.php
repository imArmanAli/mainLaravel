@include('internal_layout.header')
@include('internal_layout.leftbar')
@section('content')
<link rel="stylesheet" href="https://unpkg.com/bootstrap-select@1.12.4/dist/css/bootstrap-select.min.css" type="text/css" />
    <style>
        .d-none {
            display: none;
        }

        .mt-05 {
            margin-top: 0.5rem
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ $content_title }}</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">{{ $content_title }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
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
                    <div class="box box-danger">
                        <div class="box-body">
                            <form method="post" action="{{ route('addurlamz.save') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                   <div class="col-md-2" >
                                        <div class="form-group">
                                            <label>Country</label>
                                            <?php 
                                             if($singledata != ''){
                                                $country_first = explode(',',$singledata->country);
                                             }else{
                                                $country_first = [];
                                             } ?>
                                            <select class="selectpicker form-control " data-flag="true" data-live-search="true"  data-actions-box="true" name="countries[]" style="height: auto;" data-actions-box="true" multiple required>
                                                    @foreach ($countries as $countries_data)
                                                        <option value="{{ $countries_data->code }}" <?=
                                                         (in_array($countries_data->code,$country_first)?"selected":"") ?>>{{ $countries_data->name }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="number" class="form-control" name="txtPass"
                                                value="<?= $singledata != '' ? $singledata->cl_pasword : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Window XP,7,8 Url</label>
                                                <input type="text" class="form-control txtFile"
                                                    style="margin-top: 0.5rem" name="txt_window_xp"
                                                    value="<?= $singledata != '' ? $singledata->cl_win_url : '' ?>">
                                            </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            
                                            <div class="col-md-8 window10url mt-05 ">
                                                <div class="form-group">
                                                    <label>Window 10 Url</label>
                                                    <input type="text" class="form-control txt_window_ten"
                                                        name="txt_window_ten"
                                                        value="<?= $singledata != '' ? $singledata->cl_win_10 : '' ?>">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                           
                                            <div class="col-md-8 window11url mt-05">
                                                <div class="form-group">
                                                    <label>Window 11 Url</label>
                                                    <input type="text" class="form-control txt_window_eleven"
                                                        name="txt_window_eleven"
                                                        value="<?= $singledata != '' ? $singledata->cl_win_11 : '' ?>">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    @if ($superAdmin || in_array(config('permissions.add_url.edit'), $permissions))
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <br>
                                                <input type="submit" class="btn btn-success" name=""
                                                    value="Update Link">
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://unpkg.com/bootstrap-select@1.12.4/dist/js/bootstrap-select.min.js"></script>
    <script>
     $(document).ready(function(e) {
        $('.selectpicker').selectpicker();
    });
</script>
@endsection
@include('internal_layout.footer')