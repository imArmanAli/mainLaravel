@include('internal_layout.header')
@include('internal_layout.leftbar')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ $content_title }} <small>(Ad Code)</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.show') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('publishers.show') }}"> {{ $content_title }}</a></li>
                <li class="active">Ad Code</li>
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
                            <div class="">
                        @if ($superAdmin || in_array(config('permissions.publishers_ad_code.view'), $permissions))
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th>Name</th>
                                            <th>Site Name</th>
                                            <th>Site</th>
                                            <th>Status</th>
                                            <th class="text-center">Code</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)
                                          @if ($myadcode)
                                            @foreach ($myadcode as $nod)
                                                <tr>
                                                    <td class="text-center">{{  $nod->id  }}</td>
                                                    <td>{{  strtolower($nod->name)  }}</td>
                                                    <td>{{  ucwords(strtolower($nod->title)) }}</td>
                                                    <td>{{  $nod->url  }}</td>
                                                    <td>
                                                        @if($nod->status == 1)
                                                            Approved
                                                        @elseif($nod->status == 0)
                                                            Pending
                                                        @elseif($nod->status == -1)
                                                            Rejected
                                                        @endif
                                                    </td>
                                                    <td class="text-center menu-action">

                                                       @if ($nod->status == 1)
                                                            <a href="{{ route('publishers_adcode_detail.show',['pid' => "$nod->pid",'adid' => "$nod->adid","sid"=>"$nod->sid"]) }}" data-original-title="Button Code" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bg-green"> <i class="fa fa-code"></i> </a>
                                                        @elseif($nod->status == 0)
                                                            <a href="{{ route('publishers_adcode_status.approve',['pid' => "$nod->pid",'sid'=>"$nod->adid", 'status' => '1']) }}" data-original-title="Approved" data-toggle="tooltip" class="btn menu-icon vd_bg-green" >Approve</a>
                                                            <a href="{{ route('publishers_adcode_status.reject',['pid' => "$nod->pid",'sid'=>"$nod->adid", 'status' => '0']) }}" data-original-title="Reject" data-toggle="tooltip" class="btn menu-icon vd_bg-red" >Reject</a>
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

    @endsection
    @include('internal_layout.footer')
