@include('internal_layout.header')
@include('internal_layout.leftbar')
@section('content')   
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ $content_title }} <small>(Add)</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.show') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('roles.show') }}"> {{ $content_title }}</a></li>
                <li class="active">Add</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-danger">
                        <div class="box-body">
                            
                            <form action="{{ route('roles.save') }}" method="POST">
                                @csrf
                                <div class="row ">
                             
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label>Role Name<span class="red">*&nbsp;</span><span class="error err_name"></span></label>
                                            <input type="text" name="name" id="name" class="form-control removespecl" value="" />
                                        </div>
                                    </div>
                                   

                                    
                                </div>
                                
                                <div class="box-footer"> 
                                    <input type="submit" name="btnButton" id="btnaddform" value="Save" class="btn vd_btn vd_bg-green finish" /> &nbsp;
                                    <input type="button" name="btnButton" value="Back" class="btn vd_btn vd_bg-yellow" onclick="window.location.href='{{ route('roles.show') }}'" /> &nbsp;
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