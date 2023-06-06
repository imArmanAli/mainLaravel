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
                        <div class="row">
                                <form method="post" action="{{ route('get_user_tracking_id.show') }}">
                                    @csrf
                                    @if($superAdmin == 1)
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Select Admin</label>
                                            <select class="form-control" name="adm" id="adm">
                                                <option value="0" <?php echo ($adm_id == 0)?'selected':''; ?> >Select Publisher</option>
                                                @if ($userList) 
                                                    @foreach ($userList as $key => $user)
                                                    
                                                        <option value="{{ $user->id }}" <?php echo ($adm_id == $user->id)?'selected':''; ?> >{{ $user->username }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    @endif   
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <button type="submit" name="btnsearch" class="btn btn-primary btn-block btnsearch">
                                                <i class="spinner"></i>
                                                Filter
                                            </button>
                                            
                                        </div>
                                    </div>                        
                                </form>
                            </div>
                            
                           <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Subject</th>
                                        <th>URL</th>
                                        <th>Method</th>
                                        <th>Ip</th>
                                        <th>User Id</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script type="text/javascript">
        
        // JavaScript Document
        (function ($){
            $(document).ready(function(e) {
                const getUserId = '<?php echo $adm_id ?>';
                const superAdmin = '<?php echo $superAdmin ?>';
                
                //--------------------------------------------------------
            
                $("form").submit(function(e) {

                    e.preventDefault();
                    var form = $(this);
                    var actionUrl = form.attr('action');
                    $('button .spinner').addClass(' fa fa-refresh fa-spin');
                    $.ajax({
                        type: "POST",
                        url: actionUrl,
                        data: form.serialize(),
                        success: function(data){
                            console.log({ data });
                            let row = '';
                            data.forEach((obj, key) => {
                                row += `<tr>
                                            <td>${key+1}</td>
                                            <td>${obj.subject}</td>
                                            <td class="text-success">${obj.url}</td>
                                            <td><label class="label label-info">${obj.method}</label></td>
                                            <td class="text-warning">${obj.ip}</td>
                                            <td>${obj.username}</td>
                                            <td>${new Date(obj.created_at).toISOString().slice(0, 10)}</td>
                                        </tr>`;
                            });
                            $("table tbody").html(row);

                            $('button .spinner').removeClass(' fa fa-refresh fa-spin');
                        },
                        error: function()
                        {
                            $('button .spinner').removeClass(' fa fa-refresh fa-spin');
                            swal({
                                title: "Something went wrong",
                                type: "error",
                            });
                        }
                    });
                });

                if (superAdmin != 1) {
                    $(form).submit();
                }

            });
        })(jQuery);

    </script>
@endsection
@include('internal_layout.footer')