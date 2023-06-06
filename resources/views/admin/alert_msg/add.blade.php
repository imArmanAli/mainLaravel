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
                <li><a href="{{ route('addlanding.show') }}"> {{ $content_title }}</a></li>
                <li class="active">Add</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-danger">
                        <div class="box-body">
                            <form action="{{ route('alertmsg.save') }}" method="POST">
                                 @csrf
                                <div class="row ">
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label>Select Type<span class="red">*&nbsp;</span><span class="error err_lvl"></span></label>
                                            <select name="txtType" id="txtType" class="form-control" >
                                                <option value="0">--Choose--</option>
                                                <option value="1">Important</option>                                                 
                                                <option value="2">Very Important</option>
                                            </select>
                                        </div>
                                    </div> 
                                    
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label>Status :</label><br>
                                            <input type="radio" name="radStatus" id="radStatus" value="1" checked="checked" required />
                                            <span class="txtDarkGray14">Active</span> &nbsp;
                                            <input type="radio" name="radStatus" id="radStatus" value="0" />
                                            <span class="txtDarkGray14">In Active</span>
                                        </div>
                                    </div> 
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description<span class="red">*&nbsp;</span><span class="error err_name"></span></label>
                                            <textarea class="form-control" name="txtDesc" rows="7"></textarea>
                                        </div>
                                    </div>

                                    
                                </div>
                                
                                <div class="box-footer"> 
                                    <input type="submit" name="btnButton" id="btnaddform" value="Save" class="btn vd_btn vd_bg-green finish" /> &nbsp;
                                    <input type="button" name="btnButton" value="Back" class="btn vd_btn vd_bg-yellow" onclick="window.location.href='{{ route('alertmsg.show') }}'" /> &nbsp;
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