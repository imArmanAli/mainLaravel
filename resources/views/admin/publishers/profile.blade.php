@include('internal_layout.header')
@include('internal_layout.leftbar')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ $content_title }} <small>(Profile)</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.show') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('publishers.show') }}"> {{ $content_title }}</a></li>
                <li class="active">Profile</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    @include('admin.publishers.menu')
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <!-- Profile Image -->
                    @if ($superAdmin || in_array(config('permissions.publisher_profile.view'), $permissions))
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <div class="row ">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" name="" class="form-control"
                                                value="<?php echo $singnod->f_name; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" name="" class="form-control"
                                                value="<?php echo $singnod->l_name; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="" class="form-control"
                                                value="<?php echo $singnod->email; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input type="text" name="" class="form-control"
                                                value="<?php echo $singnod->phone; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" name="" class="form-control"
                                                value="<?php echo $singnod->password; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Skype Id</label>
                                            <input type="text" name="" class="form-control"
                                                value="<?php echo $singnod->skype_id; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="" class="form-control"
                                                value="<?php echo $singnod->address; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->



    </div>
@endsection
@include('internal_layout.footer')
