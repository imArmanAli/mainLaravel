@include('internal_layout.header')
@include('internal_layout.leftbar')
@section('content')   
    
    <!-- <?php $pageTitle = "Today Report"; ?> -->
    

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
                            <div class="row">
                                <form method="post" action="{{ route('get_pub_report.show') }}" id="filter_form">
                                    @csrf
                                    @if($pub_id == 0)
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Select Publisher</label>
                                            <select class="form-control" name="pub" id="pub">
                                                <option value="0" <?php echo ($pub_id == 0)?'selected':''; ?> >Select Publisher</option>
                                                @if ($publisherList) 
                                                    @foreach ($publisherList as $key => $pub)
                                                    
                                                        <option value="{{ $pub->id }}" <?php echo ($pub_id == $pub->id)?'selected':''; ?> >{{ $pub->username }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    @else
                                    <input type="hidden" name="pub" id="pub" value="{{$pub_id}}">
                                    @endif   
                                    <div class="col-md-2" style="display:none">
                                        <div class="form-group">
                                            <label>Device</label>
                                            <select class="form-control" name="device" id="device">
                                                <option value="0">Select Device</option>
                                                <option value="Windows">Windows</option>
                                                <option value="Android">Android</option>
                                                <option value="mac">Mac</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Sites</label>
                                            <select class="form-control" name="site" id="site">
                                                <option value="0">Select Sites</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Date range</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                <input type="text" class="form-control pull-right" name="dateRange" id="reservation" autocomplete="off" value="<?= date('Y-m-d') ?> - <?= date('Y-m-d') ?>">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
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
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">Page</th>
                                        <th class="text-center">Site</th>
                                        <th>Publisher Id</th>
                                        <th>Device</th>
                                        <th>Browser</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody id="body_data">
                                    
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script type="text/javascript">
        

        (function ($){
            $(".btnsearch").click(function(event) {
                event.preventDefault();
                const dateRange = $('input[name=dateRange]').val();
                if (!dateRange) {
                    swal({
                        title: "Please Select Date before filtering",
                        type: "warning",
                    });
                }
                var form = $('#filter_form');
                var actionUrl = form.attr('action');
                var serializedData = $('#filter_form').serialize();
                $('button .spinner').addClass(' fa fa-refresh fa-spin');
                $.ajax({
                    type: "POST",
                    url: actionUrl,
                    data: form.serialize(), 
                    success: function(data){
                    
                        let dummy = {};
                        
                        for (let index = 0; index < data.length; index++) {
                            const element = data[index];
                            element.browsers = element.browsers.split(',');
                            // element.countries = element.countries.split(',');
                            element.device = element.device.split(',');
                        
                            const ele = dummy[element.dates] || [];
                            dummy = {
                                ...dummy, [element.dates]: [...ele, element]
                            };
                        }
                        let dunnyArray = [];
                        for (const key in dummy) {
                            dunnyArray = [...dunnyArray, ...dummy[key]];
                        }

                        let row = '';
                        dunnyArray.forEach(obj => {
                            let deviceSpan = '';
                            for (const key of obj.device) {
                                deviceSpan += `<span>${key}</span><br>`
                            }
                            let browserSpan = '';
                            for (const key of obj.browsers) {
                                browserSpan += `<span>${key}</span><br>`
                            }
                            
                            // let countrySpan = '';
                            // for (const key in obj.countries) {
                            
                            //     countrySpan += `<span>${obj.countries[key]}</span><br>`
                            // }
                            row += `<tr>
                                        <td>${obj.page}</td>
                                        <td>${obj.url}</td>
                                        <td>${obj.pub_id}</td>
                                        <td>${deviceSpan}</td>
                                        <td>${browserSpan}</td>
                                        <td>${obj.total}</td>
                                        <td>${obj.dates}</td>
                                    </tr>`;
                        });
                        $("#body_data").html(row);
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
        })(jQuery);
        // JavaScript Document
        (function ($){
            $(document).ready(function(e) {
                const getpubId = '<?php echo $pub_id ?>';
                
                //--------------------------------------------------------
            
                const fetechSites = (pub_id) => {
                    var url = "{{ route('sites_by_pub_id.list', ":pub_id") }}";
                    url = url.replace(":pub_id", pub_id);
                    $('#site')
                        .find('option')
                        .remove()
                        .end()
                        .append('<option value="0" selected>Select Sites</option>')
                        .val('whatever');
                    
                    if (pub_id != 0) {
                        $.ajax({
                            type: "GET",
                            url: url,
                            success: function(data){
                              console.log({ data });
                              data.forEach(site => {
                                $('#site').append($('<option>', {
                                    value: site.site_id,
                                    text: site.url
                                }));
                              });
    
                            }
                        });
                    }
                };

                if (getpubId != 0) {
                    fetechSites(getpubId);
                }

                $("#pub").change(function () {
                    const pub_id = this.value;
                    fetechSites(pub_id);
                });

                
            });

            setTimeout(() => {
                const form = document.querySelector("form");
                const formTrigger = form.querySelector(".btnsearch");
                const submitEvent = new SubmitEvent("click");
                formTrigger.dispatchEvent(submitEvent);
            }, 2000);
        })(jQuery);

        

    </script>

    @endsection
    @include('internal_layout.footer')