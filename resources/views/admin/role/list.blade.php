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
                        url = '{{ route('roles.delete', ':id') }}';
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
                    <div class="box box-danger">
                        <div class="box-header">
                            @if ($superAdmin || in_array(config('permissions.role_management.add'), $permissions))
                                <a href="{{ route('addrole.show') }}" class="pull-right btn btn-success"
                                    style="margin-left: 20px;"><i class="fa fa-plus"></i> Add Role</a>
                            @endif
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
                                        <th>Title</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach ($allrole as $roles)
                                        <tr>
                                            <td class="text-center"><?php echo $i; ?></td>
                                            <td><?php echo $roles->title; ?></td>

                                            <td class="text-center"><?php echo $roles->status == 1 ? 'Active' : 'In-Active'; ?></td>
                                            <td class="text-center menu-action">
                                                @if ($superAdmin || in_array(config('permissions.role_management.edit'), $permissions))
                                                    @if ($roles->status == 1)
                                                        <a href="{{ route('roles.inactive', ['id' => "$roles->id", 'status' => '0']) }}"
                                                            data-original-title="In-Active" data-toggle="tooltip"
                                                            data-placement="top" class="btn menu-icon vd_bg-red"> <i
                                                                class="fa fa-ban"></i> </a>
                                                    @else
                                                        <a href="{{ route('roles.active', ['id' => "$roles->id", 'status' => '1']) }}"
                                                            data-original-title="Active" data-toggle="tooltip"
                                                            data-placement="top" class="btn menu-icon vd_bg-green"> <i
                                                                class="fa fa-check"></i> </a>
                                                    @endif
                                                    <a href="{{ route('roles.edit', "$roles->id") }}"
                                                        data-original-title="Edit" data-toggle="tooltip"
                                                        data-placement="top" class="btn menu-icon vd_bg-yellow"> <i
                                                            class="fa fa-pencil"></i> </a>
                                                @endif
                                                @if ($superAdmin || in_array(config('permissions.role_management.delete'), $permissions))
                                                    <a href="javascript:void(0);" data-id="{{ $roles->id }}"
                                                        data-original-title="Delete" data-toggle="tooltip"
                                                        data-placement="top" class="btn menu-icon vd_bg-red"
                                                        onclick="my_del_function({{ $roles->id }})"> <i
                                                            class="fa fa-times"></i> </a>
                                                @endif

                                                @if ($superAdmin || in_array(config('permissions.permission_management.view'), $permissions))
                                                    <a href="{{ route('roles.permissions', "$roles->id") }}"
                                                        data-original-title="Permissiom" data-toggle="tooltip"
                                                        data-placement="top" class="btn menu-icon vd_bg-blue"> <i
                                                            class="fa fa-eye"></i> </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @php($i++)
                                    @endforeach

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
