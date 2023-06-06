@include('internal_layout.header')
@include('internal_layout.leftbar')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ $content_title }} <small>(Sites)</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.show') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('publishers.show') }}"> {{ $content_title }}</a></li>
                <li class="active">Sites</li>
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
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            @if(isset ($errors) && count($errors) > 0)
                                <div class="alert alert-warning" role="alert">
                                    <ul class="list-unstyled mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if($message = Session::get('success', false))
                                    <p class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ $message  }}
                                    </p>
                            @endif
                            @if($message = Session::get('error', false))
                                <p class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ $message  }}
                                </p>
                            @endif
                            <div class="">
                          @if ($superAdmin || in_array(config('permissions.publishers_sites.view'), $permissions))

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">Site ID</th>
                                            <th>Site Name</th>
                                            <th>Domain</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)
                                          @if ($mysites)
                                            @foreach ($mysites as $nod)

                                                <tr>
                                                    <td class="text-center"><?php echo $nod->site_id; ?></td>
                                                    <td><?php echo strtolower($nod->title); ?></td>

                                                    <td><?php echo $nod->protocol.$nod->url; ?></td>
                                                    <td class="text-center">
                                                        @if($nod->status == 1)
                                                           Approved
                                                        @elseif($nod->status == 0)
                                                            Pending
                                                        @elseif($nod->status == -1)
                                                            Rejected
                                                        @endif

                                                    </td>
                                                    <td>
                                                       @if ($nod->status == 0)
                                                            <a href="{{ route('publishers_sites_status.approve',['pid' => "$nod->pid",'sid'=>"$nod->site_id", 'status' => '1']) }}" class="label label-success" >Approve</a>
                                                            <a href="{{ route('publishers_sites_status.reject',['pid' => "$nod->pid",'sid'=>"$nod->site_id", 'status' => '0']) }}" class="label label-danger" >Reject</a>
                                                        @endif

                                                    </td>

                                                </tr>
                                                    @php($i++)
                                                @endforeach
                                            @endif
                                    </tbody>
                                </table>
                            @endif
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->



    </div>

