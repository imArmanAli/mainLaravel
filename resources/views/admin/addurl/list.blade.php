@include('internal_layout.header')
@include('internal_layout.leftbar')
@section('content')

    <style>
        .d-none {
            display: none;
        }

        .mt-05 {
            margin-top: 0.5rem
        }
    </style>
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
                    <div class="box box-danger">
                        <div class="box-body">
                            <form method="post" action="{{ route('addurl.save') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                   <div class="col-md-2" style="display:none">
                                        <div class="form-group">
                                            <label>Time</label>
                                            <select name="time[]" id="time" class="form-control">
                                                <option value="">Please Select</option>
                                                <option value="1"  <?= $singledata != '' && $singledata->time == '1' ? 'selected' : '' ?>>1 AM</option>
                                                <option value="2"  <?= $singledata != '' && $singledata->time == '2' ? 'selected' : '' ?>>2 AM</option>
                                                <option value="3"  <?= $singledata != '' && $singledata->time == '3' ? 'selected' : '' ?>>3 AM</option>
                                                <option value="4"  <?= $singledata != '' && $singledata->time == '4' ? 'selected' : '' ?>>4 AM</option>
                                                <option value="5"  <?= $singledata != '' && $singledata->time == '5' ? 'selected' : '' ?>>5 AM</option>
                                                <option value="6"  <?= $singledata != '' && $singledata->time == '6' ? 'selected' : '' ?>>6 AM</option>
                                                <option value="7"  <?= $singledata != '' && $singledata->time == '7' ? 'selected' : '' ?>>7 AM</option>
                                                <option value="8"  <?= $singledata != '' && $singledata->time == '8' ? 'selected' : '' ?>>8 AM</option>
                                                <option value="9"  <?= $singledata != '' && $singledata->time == '9' ? 'selected' : '' ?>>9 AM</option>
                                                <option value="10" <?= $singledata != '' && $singledata->time == '10' ? 'selected' : '' ?>>10 AM</option>
                                                <option value="11" <?= $singledata != '' && $singledata->time == '11' ? 'selected' : '' ?>>11 AM</option>
                                                <option value="12" <?= $singledata != '' && $singledata->time == '12' ? 'selected' : '' ?>>12 AM</option>
                                                <option value="13" <?= $singledata != '' && $singledata->time == '13' ? 'selected' : '' ?>>1 PM</option>
                                                <option value="14" <?= $singledata != '' && $singledata->time == '14' ? 'selected' : '' ?>>2 PM</option>
                                                <option value="15" <?= $singledata != '' && $singledata->time == '15' ? 'selected' : '' ?>>3 PM</option>
                                                <option value="16" <?= $singledata != '' && $singledata->time == '16' ? 'selected' : '' ?>>4 PM</option>
                                                <option value="17" <?= $singledata != '' && $singledata->time == '17' ? 'selected' : '' ?>>5 PM</option>
                                                <option value="18" <?= $singledata != '' && $singledata->time == '18' ? 'selected' : '' ?>>6 PM</option>
                                                <option value="19" <?= $singledata != '' && $singledata->time == '19' ? 'selected' : '' ?>>7 PM</option>
                                                <option value="20" <?= $singledata != '' && $singledata->time == '20' ? 'selected' : '' ?>>8 PM</option>
                                                <option value="21" <?= $singledata != '' && $singledata->time == '21' ? 'selected' : '' ?>>9 PM</option>
                                                <option value="22" <?= $singledata != '' && $singledata->time == '22' ? 'selected' : '' ?>>10 PM</option>
                                                <option value="23" <?= $singledata != '' && $singledata->time == '23' ? 'selected' : '' ?>>11 PM</option>
                                                <option value="24" <?= $singledata != '' && $singledata->time == '24' ? 'selected' : '' ?>>12 PM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="number" class="form-control" name="txtPass[]"
                                                value="<?= $singledata != '' ? $singledata->cl_pasword : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Window XP,7,8 Url</label>
                                                <select class="form-control" id="window78">
                                                    <option value="">Select</option>
                                                    <option value="1">File Upload</option>
                                                    <option value="2">URL</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5  window78">
                                                <div class="form-group">
                                                    <label></label>
                                                    <input type="text" class="form-control txtFile"
                                                        style="margin-top: 0.5rem" name="txtFile[]"
                                                        value="<?= $singledata != '' ? $singledata->user_window_xp_file : '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-5 window78file d-none">
                                                <div class="input-group mb-3">
                                                    <div class="custom-file mt-3">
                                                        <input type="file" class="custom-file-input" name="window78file[]"
                                                            style="padding-top: 3rem" id="window78file">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 ">
                                                <label for=""></label>
                                                <a href="javascript:void(0)" class="btn btn-xs btn-success addMore" style="margin-top: 34px;"><i class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
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
                                                        name="txt_window_ten[]"
                                                        value="<?= $singledata != '' ? $singledata->user_window_ten_file : '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 window10file d-none">
                                                <div class="input-group mb-3">
                                                    <div class="custom-file mt-3">
                                                        <input type="file" class="custom-file-input" name="window10file[]"
                                                            style="padding-top: 3rem" id="window10file">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                        name="txt_window_eleven[]"
                                                        value="<?= $singledata != '' ? $singledata->user_window_eleven_file : '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 window11file d-none">
                                                <div class="input-group mb-3">
                                                    <div class="custom-file mt-3">
                                                        <input type="file" class="custom-file-input" name="window11file[]"
                                                            style="padding-top: 3rem" id="window11file">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                        value="<?= $singledata != '' ? $singledata->user_mac_file : '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 macfile d-none">
                                                <div class="input-group mb-3">
                                                    <div class="custom-file mt-3">
                                                        <input type="file" class="custom-file-input" name="macfile"
                                                            style="padding-top: 3rem" id="macfile">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="appendded_row">
                                    <?php 
                                        foreach($alldata as $all_data_detail){
                                            $uni = uniqid();
                                    ?>
                                      <div class="col col-md-12 <?=  $uni ?>"><div class="row ">
                                   <div class="col-md-2" style="display:none">
                                        <div class="form-group">
                                            <label>Time</label>
                                            <select name="time[]" id="time" class="form-control">
                                            <option value="">Please Select</option>
                                            <option value="1"  <?= $all_data_detail != '' && $all_data_detail->time == '1' ? 'selected' : '' ?>>1 AM</option>
                                                <option value="2"  <?= $all_data_detail != '' && $all_data_detail->time == '2' ? 'selected' : '' ?>>2 AM</option>
                                                <option value="3"  <?= $all_data_detail != '' && $all_data_detail->time == '3' ? 'selected' : '' ?>>3 AM</option>
                                                <option value="4"  <?= $all_data_detail != '' && $all_data_detail->time == '4' ? 'selected' : '' ?>>4 AM</option>
                                                <option value="5"  <?= $all_data_detail != '' && $all_data_detail->time == '5' ? 'selected' : '' ?>>5 AM</option>
                                                <option value="6"  <?= $all_data_detail != '' && $all_data_detail->time == '6' ? 'selected' : '' ?>>6 AM</option>
                                                <option value="7"  <?= $all_data_detail != '' && $all_data_detail->time == '7' ? 'selected' : '' ?>>7 AM</option>
                                                <option value="8"  <?= $all_data_detail != '' && $all_data_detail->time == '8' ? 'selected' : '' ?>>8 AM</option>
                                                <option value="9"  <?= $all_data_detail != '' && $all_data_detail->time == '9' ? 'selected' : '' ?>>9 AM</option>
                                                <option value="10" <?= $all_data_detail != '' && $all_data_detail->time == '10' ? 'selected' : '' ?>>10 AM</option>
                                                <option value="11" <?= $all_data_detail != '' && $all_data_detail->time == '11' ? 'selected' : '' ?>>11 AM</option>
                                                <option value="12" <?= $all_data_detail != '' && $all_data_detail->time == '12' ? 'selected' : '' ?>>12 AM</option>
                                                <option value="13" <?= $all_data_detail != '' && $all_data_detail->time == '13' ? 'selected' : '' ?>>1 PM</option>
                                                <option value="14" <?= $all_data_detail != '' && $all_data_detail->time == '14' ? 'selected' : '' ?>>2 PM</option>
                                                <option value="15" <?= $all_data_detail != '' && $all_data_detail->time == '15' ? 'selected' : '' ?>>3 PM</option>
                                                <option value="16" <?= $all_data_detail != '' && $all_data_detail->time == '16' ? 'selected' : '' ?>>4 PM</option>
                                                <option value="17" <?= $all_data_detail != '' && $all_data_detail->time == '17' ? 'selected' : '' ?>>5 PM</option>
                                                <option value="18" <?= $all_data_detail != '' && $all_data_detail->time == '18' ? 'selected' : '' ?>>6 PM</option>
                                                <option value="19" <?= $all_data_detail != '' && $all_data_detail->time == '19' ? 'selected' : '' ?>>7 PM</option>
                                                <option value="20" <?= $all_data_detail != '' && $all_data_detail->time == '20' ? 'selected' : '' ?>>8 PM</option>
                                                <option value="21" <?= $all_data_detail != '' && $all_data_detail->time == '21' ? 'selected' : '' ?>>9 PM</option>
                                                <option value="22" <?= $all_data_detail != '' && $all_data_detail->time == '22' ? 'selected' : '' ?>>10 PM</option>
                                                <option value="23" <?= $all_data_detail != '' && $all_data_detail->time == '23' ? 'selected' : '' ?>>11 PM</option>
                                                <option value="24" <?= $all_data_detail != '' && $all_data_detail->time == '24' ? 'selected' : '' ?>>12 PM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="number" class="form-control" name="txtPass[]"  value="<?= $all_data_detail != ''? $all_data_detail->cl_pasword : '' ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Window XP,7,8 Url</label>
                                                <select class="form-control" id="window78<?=  $uni ?>">
                                                    <option value="">Select</option>
                                                    <option value="1">File Upload</option>
                                                    <option value="2">URL</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5  window78<?=  $uni ?>">
                                                <div class="form-group">
                                                    <label></label>
                                                    <input type="text" class="form-control txtFile"
                                                        style="margin-top: 0.5rem" name="txtFile[]" value="<?= $all_data_detail != '' && $all_data_detail->cl_win_url != '' ? $all_data_detail->cl_win_url : $all_data_detail->cl_win_url_file ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-5 window78file<?=  $uni ?> d-none">
                                                <div class="input-group mb-3">
                                                    <div class="custom-file mt-3">
                                                        <input type="file" class="custom-file-input" name="window78file[]"
                                                            style="padding-top: 3rem" id="window78file" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 ">
                                                <label for=""></label>
                                                <a href="javascript:void(0)" onclick="remove('<?=  $uni ?>')" class="btn btn-xs btn-danger" style="margin-top: 34px;"><i class="fa fa-minus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Window 10 Url</label>
                                                <select class="form-control" id="window10<?=  $uni ?>">
                                                    <option value="">Select</option>
                                                    <option value="1">File Upload</option>
                                                    <option value="2">URL</option>
                                                </select>
                                            </div>
                                            <div class="col-md-8 window10url<?=  $uni ?> mt-05 ">
                                                <div class="form-group">
                                                    <label></label>
                                                    <input type="text" class="form-control txt_window_ten"
                                                        name="txt_window_ten[]" value="<?= $all_data_detail != '' && $all_data_detail->cl_win_10 != ''? $all_data_detail->cl_win_10 : $all_data_detail->cl_win_10_file ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 window10file<?=  $uni ?> d-none">
                                                <div class="input-group mb-3">
                                                    <div class="custom-file mt-3">
                                                        <input type="file" class="custom-file-input" name="window10file[]"
                                                            style="padding-top: 3rem" id="window10file" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Window 11 Url</label>
                                                <select class="form-control" id="window11<?=  $uni ?>">
                                                    <option value="">Select</option>
                                                    <option value="1">File Upload</option>
                                                    <option value="2">URL</option>
                                                </select>
                                            </div>
                                            <div class="col-md-8 window11url<?=  $uni ?> mt-05">
                                                <div class="form-group">
                                                    <label></label>
                                                    <input type="text" class="form-control txt_window_eleven"
                                                        name="txt_window_eleven[]" value="<?= $all_data_detail != '' && $all_data_detail->cl_win_11 != '' ? $all_data_detail->cl_win_11 : $all_data_detail->cl_win_11_file ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 window11file<?=  $uni ?> d-none">
                                                <div class="input-group mb-3">
                                                    <div class="custom-file mt-3">
                                                        <input type="file" class="custom-file-input" name="window11file[]"
                                                            style="padding-top: 3rem" id="window11file">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div></div>
                                    <?php
                                    echo '<script>
                                    $("#window78'.$uni.'").change(function() {
                                        if (this.value === "2") {
                                            $(".window78'.$uni.'").removeClass("d-none");
                                            $(".window78file'.$uni.'").addClass("d-none");
                                        }
                                        if (this.value === "1") {
                                            $(".window78file'.$uni.'").removeClass("d-none");
                                            $(".window78'.$uni.'").addClass("d-none");
                                            
                                        }
                                        if (this.value === "") {
                                            $(".window78file'.$uni.'").addClass("d-none");
                                            $(".window78'.$uni.'").addClass("d-none");
                                        }
                                    });
                    
                                    $("#window10'.$uni.'").change(function() {
                                        if (this.value === "2") {
                                            $(".window10url'.$uni.'").removeClass("d-none");
                                            $(".window10file'.$uni.'").addClass("d-none");
                                        }
                                        if (this.value === "1") {
                                            $(".window10file'.$uni.'").removeClass("d-none");
                                            $(".window10url'.$uni.'").addClass("d-none");
                                            
                    
                                        }
                                        if (this.value === "") {
                                            $(".window10file'.$uni.'").addClass("d-none");
                                            $(".window10url'.$uni.'").addClass("d-none");
                                        }
                                    });
                    
                                    $("#window11'.$uni.'").change(function() {
                                        if (this.value === "2") {
                                            $(".window11url'.$uni.'").removeClass("d-none");
                                            $(".window11file'.$uni.'").addClass("d-none");
                                        }
                                        if (this.value === "1") {
                                            $(".window11file'.$uni.'").removeClass("d-none");
                                            $(".window11url'.$uni.'").addClass("d-none");
                                          
                                        }
                                        if (this.value === "") {
                                            $(".window11file'.$uni.'").addClass("d-none");
                                            $(".window11url'.$uni.'").addClass("d-none");
                                        }
                                    });
                                    </script>';
                                        }
                                    ?>

                                    </div>
                                    @if ($superAdmin || in_array(config('permissions.add_url.edit'), $permissions))
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <br>
                                                <input type="submit" class="btn btn-success" name=""
                                                    value="Update Link">
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                
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
    $(document).ready(function(){
        $('.addMore').click(function(){
            var uni = Date.now();
            $('#appendded_row').append(`<div class="col col-md-12 ${uni}"><div class="row ">
                                   <div class="col-md-2" style="display:none">
                                        <div class="form-group">
                                            <label>Time</label>
                                            <select name="time[]" id="time" class="form-control" >
                                                <option value="">Please Select</option>
                                                <option value="1">1 AM</option>
                                                <option value="2">2 AM</option>
                                                <option value="3">3 AM</option>
                                                <option value="4">4 AM</option>
                                                <option value="5">5 AM</option>
                                                <option value="6">6 AM</option>
                                                <option value="7">7 AM</option>
                                                <option value="8">8 AM</option>
                                                <option value="9">9 AM</option>
                                                <option value="10">10 AM</option>
                                                <option value="11">11 AM</option>
                                                <option value="12">12 AM</option>
                                                <option value="13">1 PM</option>
                                                <option value="14">2 PM</option>
                                                <option value="15">3 PM</option>
                                                <option value="16">4 PM</option>
                                                <option value="17">5 PM</option>
                                                <option value="18">6 PM</option>
                                                <option value="19">7 PM</option>
                                                <option value="20">8 PM</option>
                                                <option value="21">9 PM</option>
                                                <option value="22">10 PM</option>
                                                <option value="23">11 PM</option>
                                                <option value="24">12 PM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="number" class="form-control" name="txtPass[]" required>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Window XP,7,8 Url</label>
                                                <select class="form-control" id="window78${uni}">
                                                    <option value="">Select</option>
                                                    <option value="1">File Upload</option>
                                                    <option value="2">URL</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5  window78${uni}">
                                                <div class="form-group">
                                                    <label></label>
                                                    <input type="text" class="form-control txtFile"
                                                        style="margin-top: 0.5rem" name="txtFile[]">
                                                </div>
                                            </div>
                                            <div class="col-md-5 window78file${uni} d-none">
                                                <div class="input-group mb-3">
                                                    <div class="custom-file mt-3">
                                                        <input type="file" class="custom-file-input" name="window78file[]"
                                                            style="padding-top: 3rem" id="window78file">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 ">
                                                <label for=""></label>
                                                <a href="javascript:void(0)" onclick="remove('${uni}')" class="btn btn-xs btn-danger" style="margin-top: 34px;"><i class="fa fa-minus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Window 10 Url</label>
                                                <select class="form-control" id="window10${uni}">
                                                    <option value="">Select</option>
                                                    <option value="1">File Upload</option>
                                                    <option value="2">URL</option>
                                                </select>
                                            </div>
                                            <div class="col-md-8 window10url${uni} mt-05 ">
                                                <div class="form-group">
                                                    <label></label>
                                                    <input type="text" class="form-control txt_window_ten"
                                                        name="txt_window_ten[]">
                                                </div>
                                            </div>
                                            <div class="col-md-3 window10file${uni} d-none">
                                                <div class="input-group mb-3">
                                                    <div class="custom-file mt-3">
                                                        <input type="file" class="custom-file-input" name="window10file[]"
                                                            style="padding-top: 3rem" id="window10file">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Window 11 Url</label>
                                                <select class="form-control" id="window11${uni}">
                                                    <option value="">Select</option>
                                                    <option value="1">File Upload</option>
                                                    <option value="2">URL</option>
                                                </select>
                                            </div>
                                            <div class="col-md-8 window11url${uni} mt-05">
                                                <div class="form-group">
                                                    <label></label>
                                                    <input type="text" class="form-control txt_window_eleven"
                                                        name="txt_window_eleven[]">
                                                </div>
                                            </div>
                                            <div class="col-md-3 window11file${uni} d-none">
                                                <div class="input-group mb-3">
                                                    <div class="custom-file mt-3">
                                                        <input type="file" class="custom-file-input" name="window11file[]"
                                                            style="padding-top: 3rem" id="window11file">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div></div>`);

                $("#window78"+uni).change(function() {
                    if (this.value === '2') {
                        $(".window78"+uni).removeClass('d-none');
                        $(".window78file"+uni).addClass('d-none');
                    }
                    if (this.value === '1') {
                        $(".window78file"+uni).removeClass('d-none');
                        $(".window78"+uni).addClass('d-none');
                        // $(".txtFile").val('');
                    }
                    if (this.value === '') {
                        $(".window78file"+uni).addClass('d-none');
                        $(".window78"+uni).addClass('d-none');
                    }
                });

                $("#window10"+uni).change(function() {
                    if (this.value === '2') {
                        $(".window10url"+uni).removeClass('d-none');
                        $(".window10file"+uni).addClass('d-none');
                    }
                    if (this.value === '1') {
                        $(".window10file"+uni).removeClass('d-none');
                        $(".window10url"+uni).addClass('d-none');
                        // $(".txt_window_ten").val('');

                    }
                    if (this.value === '') {
                        $(".window10file"+uni).addClass('d-none');
                        $(".window10url"+uni).addClass('d-none');
                    }
                });

                $("#window11"+uni).change(function() {
                    if (this.value === '2') {
                        $(".window11url"+uni).removeClass('d-none');
                        $(".window11file"+uni).addClass('d-none');
                    }
                    if (this.value === '1') {
                        $(".window11file"+uni).removeClass('d-none');
                        $(".window11url"+uni).addClass('d-none');
                        // $(".txt_window_eleven").val('');
                    }
                    if (this.value === '') {
                        $(".window11file"+uni).addClass('d-none');
                        $(".window11url"+uni).addClass('d-none');
                    }
                });
        })
    })

    function remove(id){
        $('.'+id).remove();
    }

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
