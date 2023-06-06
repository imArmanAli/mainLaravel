@include('internal_layout.header')
@include('internal_layout.leftbar')
@section('content')
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

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Publisher</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($logs->count())
                                        @foreach ($logs as $key => $log)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $log->publisher->username }}</td>
                                                <td>{{ $log->payment_amount }}</td>
                                                <td class="text-warning">{{ $log->payment_status }}</td>
                                                <td>{{ $log->created_at }}</td>
                                            </tr>
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
