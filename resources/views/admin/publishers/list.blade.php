@include('internal_layout.header')
@include('internal_layout.leftbar')
@section('content')
    <script type="text/javascript">
        function my_del_function(id) {
            swal({
                    title: "Are you sure?",
                    text: "You want to delete!",
                    type: "warning",
                    confirmButtonClass: "sweet_ok",
                    confirmButtonText: "Delete",
                    cancelButtonClass: "sweet_cancel",
                    cancelButtonText: "Cancel",
                    showCancelButton: true,
                },
                function(isConfirm) {
                    if (isConfirm) {
                        url = '{{ route('publishers.delete', ':id') }}';
                        url = url.replace(':id', id);
                        window.location = url
                    } else {
                        // swal("Cancelled", "You canceled)", "error");
                    }
                });
        }
    </script>

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
                    <div class="box box-primary">
                        <div class="box-header">

                        </div><!-- /.box-header -->
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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>UserName</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Reg Date</th>
                                        <th>Status</th>
                                        <th>Balance</th>
                                        <th class="text-center" style="width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @if ($allnode)
                                        @foreach ($allnode as $key => $nod)
                                            @php($dt = new datetime($nod->regtime))

                                            <tr>
                                                <td class="text-center"><?php echo $nod->id; ?></td>
                                                <td><a
                                                        href="{{ route('tracking.show', "$nod->id") }}"><?php echo $nod->username; ?></a>
                                                </td>
                                                <td><?php echo $nod->f_name; ?></td>
                                                <td><?php echo $nod->l_name; ?></td>
                                                <td><?php echo $nod->email; ?></td>
                                                <td><?php echo $dt->format('d-m-Y'); ?></td>
                                                <td class="text-center">
                                                    @if ($nod->reg_status == 1)
                                                        <span class="label label-success">Active</span>
                                                    @else
                                                        <span class="label label-primary">Pending</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">$<?php echo round($nod->account_balance); ?></td>
                                                <td class="text-center menu-action">
                                                    @if ($superAdmin || in_array(config('permissions.publisher_list.view'), $permissions))
                                                        <a href="{{ route('publishers_profile.view', "$nod->id") }}"
                                                            data-original-title="Login Detail" data-toggle="tooltip"
                                                            data-placement="top" class="btn menu-icon vd_bg-grey"> <i
                                                                class="fa fa-user"></i> </a>
                                                    @endif
                                                    @if ($superAdmin || in_array(config('permissions.publisher_list.edit'), $permissions))
                                                        @if ($nod->reg_status == 1)
                                                            <a href="{{ route('publishers.inactive', ['id' => "$nod->id", 'status' => '0']) }}"
                                                                data-original-title="In-Active" data-toggle="tooltip"
                                                                data-placement="top" class="btn menu-icon vd_bg-red"> <i
                                                                    class="fa fa-ban"></i> </a>
                                                        @else
                                                            <a href="{{ route('publishers.active', ['id' => "$nod->id", 'status' => '1']) }}"
                                                                data-original-title="Active" data-toggle="tooltip"
                                                                data-placement="top" class="btn menu-icon vd_bg-green"> <i
                                                                    class="fa fa-check"></i> </a>
                                                        @endif
                                                        <a href="{{ route('publishers_adbalance.view',"$nod->id") }}" data-original-title="Add Balance" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bg-blue"> <i class="fa fa-dollar"></i> </a>
                                                    @endif

                                                    @if ($superAdmin || in_array(config('permissions.publisher_list.delete'), $permissions))
                                                        <a href="javascript:void(0);" data-original-title="Delete"
                                                            data-toggle="tooltip" data-placement="top"
                                                            class="btn menu-icon vd_bg-red"
                                                            onclick="my_del_function({{ $nod->id }})"> <i
                                                                class="fa fa-times"></i> </a>
                                                    @endif

                                                    @if ($superAdmin || in_array(config('permissions.publisher_stats_report.view'), $permissions))
                                                        <a href="{{ route('stats_export_yesterday.download', "$nod->id") }}"
                                                            data-original-title="Export Yesterday Stats"
                                                            data-toggle="tooltip" data-placement="top"
                                                            class="btn menu-icon vd_bg-blue"> <i
                                                                class="fa fa-file-excel-o"></i> </a>
                                                        <a href="{{ route('stats_export_seven.download', "$nod->id") }}"
                                                            data-original-title="Export Last Seven Days Stats"
                                                            data-toggle="tooltip" data-placement="top"
                                                            class="btn menu-icon vd_bg-blue"> <i class="fa fa-file"></i>
                                                        </a>
                                                        <a href="{{ route('stats_export_all.download', "$nod->id") }}"
                                                            data-original-title="Export All Publishers Stats"
                                                            data-toggle="tooltip" data-placement="top"
                                                            class="btn menu-icon vd_bg-red"> <i
                                                                class="fa fa-building-o"></i>
                                                        </a>
                                                    @endif


                                                    @if ($superAdmin || in_array(config('permissions.finance.edit'), $permissions))
                                                        <a href="{{ route('publisher.payment', "$nod->id") }}"
                                                            data-original-title="Transfer Payments" data-toggle="tooltip"
                                                            data-placement="top" class="btn menu-icon vd_bg-yellow"> <i
                                                                class="fa fa-money"></i> </a>
                                                    @endif

                                                </td>
                                            </tr>
                                            @php($i++)
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@include('internal_layout.footer')
