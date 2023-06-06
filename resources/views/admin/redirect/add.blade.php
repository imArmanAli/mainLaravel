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
                <li><a href="{{ route('addredirect.show') }}"> {{ $content_title }}</a></li>
                <li class="active">Add</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-danger">
                        <div class="box-body">
                            <form action="{{ route('redirect.save') }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="row ">
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ad Name<span class="red">*&nbsp;</span><span class="error err_title"></span></label>
                                            <input type="text" name="txtAdname" id="txtAdname" class="form-control"  value="" />
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Ad Url<span class="red">*&nbsp;</span><span class="error err_title"></span></label>
                                            <input type="text" name="txtUrl" id="txtUrl" class="form-control"  value="" />
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Status :</label><br>
                                            <input type="radio" name="radStatus" id="radStatus" value="1"  required />
                                            <span class="txtDarkGray14">Active</span> &nbsp;
                                            <input type="radio" name="radStatus" id="radStatus" value="0" checked="checked" />
                                            <span class="txtDarkGray14">In Active</span>
                                        </div>
                                    </div> 
                                    
                                    <div class="col-md-12">
                                        <div class="box-footer"> 
                                            <input type="submit" name="btnButton" value="Save" id="btnaddform" class="btn vd_btn vd_bg-green finish" /> &nbsp;
                                            <input type="button" name="btnButton" value="Back" class="btn vd_btn vd_bg-yellow" onclick="window.location.href='{{ route('redirect.show') }}'" /> &nbsp;
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

           