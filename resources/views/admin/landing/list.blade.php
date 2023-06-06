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
                        url = '{{ route('landing.delete', ':id') }}';
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
                            @if ($superAdmin || in_array(config('permissions.landing_domain.add'), $permissions))
                                <a href="{{ route('addlanding.show') }}" class="pull-right btn btn-success"><i
                                        class="fa fa-plus"></i> Add New Domain</a>
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

                                        <th>Add Name</th>
                                        <th>URL</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center" style="width: 130px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @if ($allnode)
                                        @foreach ($allnode as $nod)
                                            <tr>
                                                <td class="text-center">{{ $i }}</td>

                                                <td>{{ $nod->ad_name }}</td>
                                                <td>{{ $nod->ad_url . $nod->ad_keyword }}</td>

                                                <td class="text-center">
                                                    @if ($nod->ad_status == 0)
                                                        In-Active
                                                    @elseif ($nod->ad_status == 2)
                                                        {
                                                        Active-S-2
                                                    @else
                                                        Active
                                                    @endif
                                                </td>

                                                <td class="text-center menu-action">

                                                    @if ($superAdmin || in_array(config('permissions.landing_domain.edit'), $permissions))
                                                        @if ($nod->ad_status == 0)
                                                            <a href="{{ route('landing.pause', ['id' => "$nod->ad_id", 'status' => '1']) }}"
                                                                data-original-title="Play" data-toggle="tooltip"
                                                                data-placement="top" class="btn menu-icon vd_bg-green"> <i
                                                                    class="fa fa-play"></i> </a>
                                                        @elseif($nod->ad_status == 1)
                                                            <a href="{{ route('landing.play', ['id' => "$nod->ad_id", 'status' => '0']) }}"
                                                                data-original-title="Pause" data-toggle="tooltip"
                                                                data-placement="top" class="btn menu-icon vd_bg-green"> <i
                                                                    class="fa fa-pause"></i> </a>
                                                        @endif
                                                        <a href="{{ route('landing.edit', "$nod->ad_id") }}"
                                                            data-original-title="Edit" data-toggle="tooltip"
                                                            data-placement="top" class="btn menu-icon vd_bg-yellow"> <i
                                                                class="fa fa-pencil"></i> </a>
                                                    @endif
                                                    @if ($superAdmin || in_array(config('permissions.landing_domain.delete'), $permissions))
                                                        <a href="javascript:void(0)" data-id=""
                                                            data-original-title="Delete" data-toggle="tooltip"
                                                            data-placement="top" class="btn menu-icon vd_bg-red"
                                                            onclick="my_del_function({{ $nod->ad_id }})"> <i
                                                                class="fa fa-times"></i> </a>
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
