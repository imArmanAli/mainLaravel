@include('internal_layout.header')
@include('internal_layout.leftbar')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ $content_title }} <small>(Modify)</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.show') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('dashboard.show') }}"> {{ $content_title }}</a></li>
                <li class="active">Modify</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-danger">
                        <div class="box-body">
                            <form action="{{ route('users.update') }}" method="POST">
                                <input type="hidden" name="hidId" value="<?php echo $usermod->id; ?>" />
                                @csrf
                                <div class="row ">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>User Level<span class="red">*&nbsp;</span><span
                                                    class="error err_lvl"></span></label>
                                            <select name="selUserLevel" id="selUserLevel" class="form-control"
                                                required="required">
                                                <option value="">--Choose--</option>
                                                <?php
                                                foreach ($roles as $key => $value) {
                                                  ?> <option
                                                    {{ $value->id == $usermod->user_level ? 'selected' : '' }}
                                                    value="{{ $value->id }}">{{ $value->title }}
                                                </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>User Name<span class="red">*&nbsp;</span><span
                                                    class="error err_name"></span></label>
                                            <input type="text" name="txtUserName" id="txtUserName" class="form-control"
                                                required="required" value="<?php echo $usermod->username; ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>User Password&nbsp;<span class="error err_pass"></span></label>
                                            <input type="text" name="txtPassword" id="txtPassword" class="form-control"
                                                value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Status :</label><br>
                                            <input type="radio" name="radStatus" id="radStatus" value="1"
                                                <?php echo $usermod->user_status == 1 ? 'checked' : ''; ?> />
                                            <span class="txtDarkGray14">Active</span> &nbsp;
                                            <input type="radio" name="radStatus" id="radStatus" value="0"
                                                <?php echo $usermod->user_status == 0 ? 'checked' : ''; ?> />
                                            <span class="txtDarkGray14">In Active</span>
                                        </div>
                                    </div>


                                </div>

                                <div class="box-footer">
                                    <input type="submit" name="btnButton" value="Update" id="btnaddform"
                                        class="btn vd_btn vd_bg-green finish" /> &nbsp;
                                    <input type="button" name="btnButton" value="Back" class="btn vd_btn vd_bg-yellow"
                                        onclick="window.location.href='{{ route('users.show') }}'" /> &nbsp;
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
