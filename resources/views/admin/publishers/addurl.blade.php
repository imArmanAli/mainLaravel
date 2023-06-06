@include('internal_layout.header')
@include('internal_layout.leftbar')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <style>
        .d-none {
            display: none;
        }

        .mt-05 {
            margin-top: 0.5rem
        }
    </style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ $content_title }} <small>(Ad Links)</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.show') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('publishers.show') }}"> {{ $content_title }}</a></li>
                <li class="active">Ad Links</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    @include('admin.publishers.menu')
                </div>
                <div class="col-md-9">
                    <div class="box box-danger">
                        <div class="box-body">
                            <form method="post" action="{{ route('publishers_adlink.save', "$pid") }}"
                                enctype="multipart/form-data">
                                @csrf
                                @if ($superAdmin || in_array(config('permissions.publishers_ad_link.view'), $permissions))
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="number" class="form-control" name="txtPass"
                                                    value="{{ $singledata != '' ? $singledata->cl_pasword : '' }}">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Window XP,7,8 Url</label>
                                                <input type="text" class="form-control" name="txtFile"
                                                    value="{{ $singledata != '' ? $singledata->cl_win_url : '' }}">
                                            </div>
                                        </div> --}}
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Window XP,7,8 Url</label>
                                                    <select class="form-control" id="window78">
                                                        <option value="">Select</option>
                                                        <option value="1">File Upload</option>
                                                        <option value="2">URL</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7  window78">
                                                    <div class="form-group">
                                                        <label></label>
                                                        <input type="text" class="form-control txtFile"
                                                            style="margin-top: 0.5rem" name="txtFile"
                                                            value="<?= $singledata != '' ? $singledata->user_window_xp_file : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 window78file d-none">
                                                    <div class="input-group mb-3">
                                                        <div class="custom-file mt-3">
                                                            <input type="file" class="custom-file-input"
                                                                name="window78file" style="padding-top: 3rem"
                                                                id="window78file">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Window 10 Url</label>
                                                <input type="text" class="form-control" name="txt_window_ten"
                                                    value="{{ $singledata != '' ? $singledata->cl_win_10 : '' }}">
                                            </div>
                                        </div> --}}
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Window 10 Url</label>
                                                    <select class="form-control" id="window10">
                                                        <option value="">Select</option>
                                                        <option value="1">File Upload</option>
                                                        <option value="2">URL</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-8 window10url mt-05 ">
                                                    <div class="form-group">
                                                        <label></label>
                                                        <input type="text" class="form-control txt_window_ten"
                                                            name="txt_window_ten"
                                                            value="<?= $singledata != '' ? $singledata->user_window_ten_file : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 window10file d-none">
                                                    <div class="input-group mb-3">
                                                        <div class="custom-file mt-3">
                                                            <input type="file" class="custom-file-input"
                                                                name="window10file" style="padding-top: 3rem"
                                                                id="window10file">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        {{-- <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Window 11 Url</label>
                                                <input type="text" class="form-control" name="txt_window_eleven"
                                                    value="{{ $singledata != '' ? $singledata->cl_win_11 : '' }}">
                                            </div>
                                        </div> --}}
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Window 11 Url</label>
                                                    <select class="form-control" id="window11">
                                                        <option value="">Select</option>
                                                        <option value="1">File Upload</option>
                                                        <option value="2">URL</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-8 window11url mt-05">
                                                    <div class="form-group">
                                                        <label></label>
                                                        <input type="text" class="form-control txt_window_eleven"
                                                            name="txt_window_eleven"
                                                            value="<?= $singledata != '' ? $singledata->user_window_eleven_file : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 window11file d-none">
                                                    <div class="input-group mb-3">
                                                        <div class="custom-file mt-3">
                                                            <input type="file" class="custom-file-input"
                                                                name="window11file" style="padding-top: 3rem"
                                                                id="window11file">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                        {{-- <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Android Url</label>
                                                <input type="text" class="form-control" name="txtAndroid"
                                                    value="{{ $singledata != '' ? $singledata->cl_and_url : '' }}">
                                            </div>
                                        </div> --}}
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Android Url</label>
                                                    <select class="form-control" id="androidurl">
                                                        <option value="">Select</option>
                                                        <option value="1">File Upload</option>
                                                        <option value="2">URL</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-8 androidurl mt-05 ">
                                                    <div class="form-group">
                                                        <label></label>
                                                        <input type="text" class="form-control txtAndroid"
                                                            name="txtAndroid" required=""
                                                            value="<?= $singledata != '' ? $singledata->user_and_file : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 androidfile d-none">
                                                    <div class="input-group mb-3">
                                                        <div class="custom-file mt-3">
                                                            <input type="file" class="custom-file-input"
                                                                name="androidfile" style="padding-top: 3rem"
                                                                id="androidfile">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                        {{-- <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Mac Url</label>
                                                <input type="text" class="form-control" name="txtMac"
                                                    value="{{ $singledata != '' ? $singledata->cl_mac_url : '' }}">
                                            </div>
                                        </div> --}}
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Mac Url</label>
                                                    <select class="form-control" id="macurl">
                                                        <option value="">Select</option>
                                                        <option value="1">File Upload</option>
                                                        <option value="2">URL</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-8 macurl mt-05 ">
                                                    <div class="form-group">
                                                        <label></label>
                                                        <input type="text" class="form-control txtMac" name="txtMac"
                                                            value="{{ $singledata != '' ? $singledata->user_mac_file :'' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 macfile d-none">
                                                    <div class="input-group mb-3">
                                                        <div class="custom-file mt-3">
                                                            <input type="file" class="custom-file-input"
                                                                name="macfile" style="padding-top: 3rem" id="macfile">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <br>
                                                @if ($superAdmin || in_array(config('permissions.publishers_ad_link.edit'), $permissions))
                                                    <input type="submit" class="btn btn-success" name=""
                                                        value="Update Link">
                                                @endif
                                                @if ($superAdmin || in_array(config('permissions.publishers_ad_link.delete'), $permissions))
                                                    <a href="{{ route('publishers_adlink.delete', "$pid") }}"
                                                        class="btn btn-danger">Delete</a>
                                                @endif

                                            </div>
                                        </div>

                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@include('internal_layout.footer')


<script>
    $("#window78").change(function() {
        if (this.value === '2') {
            $(".window78").removeClass('d-none');
            $(".window78file").addClass('d-none');
        }
        if (this.value === '1') {
            $(".window78file").removeClass('d-none');
            $(".window78").addClass('d-none');
            // $(".txtFile").val('');
        }
        if (this.value === '') {
            $(".window78file").addClass('d-none');
            $(".window78").addClass('d-none');
        }
    });

    $("#window10").change(function() {
        if (this.value === '2') {
            $(".window10url").removeClass('d-none');
            $(".window10file").addClass('d-none');
        }
        if (this.value === '1') {
            $(".window10file").removeClass('d-none');
            $(".window10url").addClass('d-none');
            // $(".txt_window_ten").val('');

        }
        if (this.value === '') {
            $(".window10file").addClass('d-none');
            $(".window10url").addClass('d-none');
        }
    });

    $("#window11").change(function() {
        if (this.value === '2') {
            $(".window11url").removeClass('d-none');
            $(".window11file").addClass('d-none');
        }
        if (this.value === '1') {
            $(".window11file").removeClass('d-none');
            $(".window11url").addClass('d-none');
            // $(".txt_window_eleven").val('');
        }
        if (this.value === '') {
            $(".window11file").addClass('d-none');
            $(".window11url").addClass('d-none');
        }
    });

    $("#androidurl").change(function() {
        if (this.value === '2') {
            $(".androidurl").removeClass('d-none');
            $(".androidfile").addClass('d-none');
        }
        if (this.value === '1') {
            $(".androidfile").removeClass('d-none');
            $(".androidurl").addClass('d-none');
            // $(".txtAndroid").val('');

        }
        if (this.value === '') {
            $(".androidfile").addClass('d-none');
            $(".androidurl").addClass('d-none');
        }
    });
    $("#macurl").change(function() {
        if (this.value === '2') {
            $(".macurl").removeClass('d-none');
            $(".macfile").addClass('d-none');
        }
        if (this.value === '1') {
            $(".macfile").removeClass('d-none');
            $(".macurl").addClass('d-none');
            // $(".txtMac").val('');

        }
        if (this.value === '') {
            $(".macfile").addClass('d-none');
            $(".macurl").addClass('d-none');
        }
    });
</script>
