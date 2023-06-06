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
                    <div class="box box-success">
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
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    if ($allnode) {
                                        
                                        foreach ($allnode as $key => $nod) {
                                            
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i; ?></td>
                                                <td><?php echo $nod->register->username; ?></td>
                                                <td><?php echo $nod->register->email; ?></td>
                                                <td><?php echo $nod->register->phone; ?></td>
                                                <td>$<?php echo $nod->amount; ?></td>
                                                <td><?php echo ($nod->status == -1)?'Pending':'Approved';?></td>
                                                
                                                <td class="text-center menu-action">
                                                    <a href="{{ route('widthdrawls.edit', "$nod->wid") }}" data-original-title="Pay Now" data-toggle="tooltip" data-placement="top" class="btn btn-success"> View Detail </a>
                                                    
                                                    
                                                </td>
                                            </tr> <?php
                                            $i++;                                           
                                        }
                                    }
                                    
                                    ?>
                                    
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