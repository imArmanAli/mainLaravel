@include('internal_layout.header')
@include('internal_layout.leftbar')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ $content_title }} <small>(login History)</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.show') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('publishers.show') }}"> {{ $content_title }}</a></li>
                <li class="active">login History</li>
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
                              @if ($superAdmin || in_array(config('permissions.publishers_login_history.view'), $permissions))
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">Sr.No</th>
                                            <th>Ip</th>
                                            <th>Date</th>
                                            <th class="text-center">Time</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)
                                            @if ($myhistory)
                                                 @foreach ($myhistory as $key => $nod)
                                                     @php($dt = new datetime($nod->login_time))

                                                <tr>
                                                    <td class="text-center"><?php echo $i; ?></td>
                                                    <td><?php echo $nod->login_ip; ?></td>

                                                    <td><?php echo $dt->format('d-M-Y'); ?></td>
                                                    <td><?php echo $dt->format('H:i a'); ?></td>


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
