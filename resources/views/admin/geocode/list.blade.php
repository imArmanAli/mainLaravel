@include('internal_layout.header')
@include('internal_layout.leftbar')
@section('content')

<link rel="stylesheet" href="https://unpkg.com/bootstrap-select@1.12.4/dist/css/bootstrap-select.min.css" type="text/css" />
<link rel="stylesheet" href="https://unpkg.com/bootstrap-select-country@4.0.0/dist/css/bootstrap-select-country.min.css" type="text/css" />
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
                    <div class="box box-danger">
                        <div class="box-body">
                            <div class="row" >
                                <div class="col-md-4">
                                    <label for="">Window</label>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Mac</label>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Android</label>
                                </div>
                            </div>

                            <form method="post" action="{{ route('geocode.save')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row" >
                                    <div class="col-md-4">
                                      <div class="win_row" style="box-shadow: 3px 4px #b5a9a9;padding:7px;">


                                        <div class="row">
                                            <div class="col-md-4">
                                                <select class="form-control windowtargetingurl">
                                                    <option value=""  index="1">Select</option>
                                                    <option value="1" index="1">File Upload</option>
                                                    <option value="2" index="1">URL</option>
                                                </select>

                                            </div>
                                            <div class="col-md-8 ">
                                            <div class="form-group">
                                                <div class="window_targeting_url " name="window_url[1][]">
                                                    <input type="text" name="window_url[1][]" placeholder="Window Url" class="form-control"
                                                    value="<?php
                                                        if(count($geocode_win) > 0){
                                                            echo $geocode_win[0]['window_url_file'];
                                                        }
                                                    ?>" >
                                                </div>

                                                <div class="window_targeting_url_file d-none"  name="window_url_file[1][]">
                                                    <div class="input-group">
                                                        <div class="custom-file ">
                                                            <input type="file" class="custom-file-input" name="window_url_file[1][]" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>

                                        </div>


                                        <div class="col-md-6" style="padding:0px">
                                            <div class="form-group">
                                                <input type="text" name="window_pass[1][]" placeholder="Window Password" class="form-control" value="<?php
                                                if(count($geocode_win) > 0){
                                                    echo $geocode_win[0]['cl_win_url_pass'];
                                                }
                                            ?>">
                                            </div>
                                        </div>
                                        <?php
                                            if(count($geocode_win) > 0){
                                                $selected_win_count_first = explode(',',$geocode_win[0]['cl_win_url_countries']);
                                            }else{
                                                $selected_win_count_first = [];
                                            }
                                        ?>
                                        <div class="col-md-6" style="padding-right:0px">
                                            <div class="form-group">
                                                <select class="selectpicker form-control " data-flag="true" data-live-search="true"  data-actions-box="true" name="win_countries[1][]" style="height: auto;" data-actions-box="true" multiple required>
                                                    @foreach ($countries as $countries_data)
                                                        <option value="{{ $countries_data->code }}" <?=
                                                         (in_array($countries_data->code,$selected_win_count_first)?"selected":"") ?>>{{ $countries_data->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div id="win_rotation_div">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <select class="form-control windowtargetingrotation" >
                                                        <option value=""  index="1">Select</option>
                                                        <option value="1"  index="1">File Upload</option>
                                                        <option value="2" index="1">URL</option>
                                                    </select>

                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                    <div class="window_rotation_url" name="window_rotation[1][]">
                                                        <input type="text" name="window_rotation[1][]" placeholder="Window Rotation Url" class="form-control" value="<?php
                                                        if(count($geocode_win) > 0){
                                                            echo $geocode_win[0]['window_rotation_file'];
                                                        }
                                                    ?>">
                                                </div>
                                                <div class="window_rotation_file d-none" name="window_rotation_file[1][]">
                                                        <div class="input-group ">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="window_rotation_file[1][]"
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6" style="padding:0px">
                                                <div class="form-group">
                                                    <input type="text" name="window_rotation_pass[1][]" placeholder="Rotation Password" class="form-control" value="<?php
                                                   if(count($geocode_win) > 0){
                                                        echo $geocode_win[0]['cl_win_url_rotation_pass'];
                                                    }
                                                ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="padding-right:0px">
                                                <div class="form-group">
                                                    <input type="text" name="window_rotation_ratio[1][]" placeholder="Rotation Ratio" class="form-control" value="<?php
                                                    if(count($geocode_win) > 0){
                                                        echo $geocode_win[0]['cl_win_url_rotation'];
                                                    }
                                                ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <a class="btn btn-xs btn-success appendWindow">Add More</a>
                                        </div>
                                      </div>
                                        <div class="appended_window" style="padding-top: 10px;">

                                            <?php
                                                foreach($geocode_win as $win_key => $geocode_win_data){

                                                    if($win_key != 0){

                                                        $uni = uniqid();
                                                        $key_win = $win_key + 1;
                                            ?>
                                            <div class="win_row <?= $uni ?>" style="box-shadow: 3px 4px #b5a9a9;padding:7px 10px 1px 0px;margin-top:10px">
                                              
                                                
                                                <div class="row"> <div class="col-md-4">  <select class="form-control windowtargetingurl"> <option value="" index="'<?= $key_win ?>'">Select</option><option value="1" index="'<?= $key_win ?>'">File Upload</option><option value="2" index="'<?= $key_win ?>'">URL</option> </select> </div><div class="col-md-8 "><div class="form-group"><div class="window_targeting_url " name="window_url['<?= $key_win ?>'][]">
                                                    <input type="text" name="window_url['<?= $key_win ?>'][]" placeholder="Window Url" class="form-control" value="<?= $geocode_win_data['window_url_file'] ?>"> </div> <div class="window_targeting_url_file d-none" name="window_url_file['<?= $key_win ?>'][]"> <div class="input-group"> <div class="custom-file "><input type="file" class="custom-file-input" name="window_url_file['<?= $key_win ?>'][]"> </div></div> </div> </div> </div>  </div> 

                                                <div class="col-md-6" style="padding:0px"> <div class="form-group"> <input type="text" name="window_pass['<?= $key_win ?>'][]" placeholder="Window Password" class="form-control" value="<?= $geocode_win_data['cl_win_url_pass'] ?>"> </div></div>
                                            <?php
                                            $selected_win_count = explode(',',$geocode_win_data['cl_win_url_countries']);
                                            ?>
                                            <div class="col-md-6" style="padding-right:0px"> <div class="form-group"> <select class="selectpicker form-control " data-flag="true" data-live-search="true" name="win_countries['<?= $key_win ?>'][]" style="height: auto;" data-actions-box="true" multiple required> @foreach ($countries as $countries_data) <option value="{{$countries_data->code}}" <?=
                                                (in_array($countries_data->code,$selected_win_count)?"selected":"") ?>>{{$countries_data->name}}</option> @endforeach </select> </div></div><div id="win_rotation_div"> 
                                                    
                                                    
                                                    <div class="row"><div class="col-md-4"><select class="form-control windowtargetingrotation"><option value="" index="'<?= $key_win ?>'">Select</option><option value="1" index="'<?= $key_win ?>'">File Upload</option><option value="2" index="'<?= $key_win ?>'">URL</option></select></div><div class="col-md-8"><div class="form-group"><div class="window_rotation_url" name="window_rotation['<?= $key_win ?>'][]">
                                                        <input type="text" name="window_rotation['<?= $key_win ?>'][]" placeholder="Window Rotation Url" class="form-control" value="<?= $geocode_win_data['window_rotation_file'] ?>"></div> <div class="window_rotation_file d-none" name="window_rotation_file['<?= $key_win ?>'][]"><div class="input-group "><div class="custom-file"><input type="file" class="custom-file-input" name="window_rotation_file['<?= $key_win ?>'][]"></div></div></div></div></div></div>
                                                    
                                                    
                                                    <div class="col-md-6" style="padding:0px"> <div class="form-group"> <input type="text" name="window_rotation_pass['<?= $key_win ?>'][]" placeholder="Rotation Password" class="form-control" value="<?= $geocode_win_data['cl_win_url_rotation_pass'] ?>"> </div></div><div class="col-md-6" style="padding-right:0px"> <div class="form-group"> <input type="text" name="window_rotation_ratio['<?= $key_win ?>'][]" placeholder="Rotation Ratio" class="form-control" value="<?= $geocode_win_data['cl_win_url_rotation'] ?>"> </div></div></div><div class="form-group"> <a class="btn btn-xs btn-danger" onclick="remove('<?= $uni ?>')">Remove</a> </div></div>
                                             <?php
                                                    }
                                                }
                                            ?>

                                        </div>
                                    </div>





                                    <div class="col-md-4">
                                    <div class="mac_row" style="box-shadow: 3px 4px #b5a9a9;padding:7px;">
                                        <div class="row">
                                                <div class="col-md-4">
                                                    <select class="form-control mactargetingurl">
                                                        <option value="" index="1">Select</option>
                                                        <option value="1"index="1">File Upload</option>
                                                        <option value="2"index="1">URL</option>
                                                    </select>

                                                </div>
                                           <div class="col-md-8">
                                               <div class="form-group">
                                                   <div class="mac_url" name="mac_url[1][]">
                                                   <input type="text" name="mac_url[1][]" placeholder="Mac Url" class="form-control" value="<?php
                                            if(count($geocode_mac) > 0){
                                                echo $geocode_mac[0]['mac_url_file'];
                                            }
                                            ?>">
                                            </div>
                                            <div class="mac_url_file d-none" name="mac_url_file[1][]">
                                                <div class="input-group ">
                                                    <div class="custom-file" >
                                                        <input type="file" class="custom-file-input" name="mac_url_file[1][]"
                                                        >
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    </div>

                                        <div class="col-md-6" style="padding:0px">
                                            <div class="form-group">
                                                <input type="text" name="mac_pass[1][]" placeholder="Mac Password" class="form-control" value="<?php
                                                if(count($geocode_mac) > 0){
                                                    echo $geocode_mac[0]['cl_mac_url_pass'];
                                                }
                                            ?>">
                                            </div>
                                        </div>
                                        <?php
                                            if(count($geocode_mac) > 0){
                                                $selected_mac_count_first = explode(',',$geocode_mac[0]['cl_mac_url_countries']);
                                            }else{
                                                $selected_mac_count_first = [];
                                            }
                                        ?>
                                        <div class="col-md-6" style="padding-right:0px">
                                            <div class="form-group">
                                                <select class="selectpicker form-control " data-flag="true" data-live-search="true" name="mac_countries[1][]" style="height: auto;" data-actions-box="true" multiple required>
                                                    @foreach ($countries as $countries_data)
                                                        <option value="{{ $countries_data->code }}" <?=
                                                            (in_array($countries_data->code,$selected_win_count_first)?"selected":"") ?>>{{ $countries_data->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div id="mac_rotation_div">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <select class="form-control macTargetingRotation">
                                                    <option value=""  index="1">Select</option>
                                                    <option value="1" index="1">File Upload</option>
                                                    <option value="2" index="1">URL</option>
                                                </select>
                                            </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="mac_rotation" name="mac_rotation[1][]">
                                                        <input type="text" name="mac_rotation[1][]" placeholder="Mac Rotation Url" class="form-control" value="<?php
                                                        if(count($geocode_mac) > 0){
                                                            echo $geocode_mac[0]['mac_rotation_file'];
                                                        }
                                                    ?>">

                                                    </div>
                                                        <div class="mac_rotation_file d-none" name="mac_rotation_file[1][]">
                                                            <div class="input-group ">
                                                                <div class="custom-file ">
                                                                    <input type="file" class="custom-file-input" name="mac_rotation_file[1][]"
                                                                    >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6" style="padding:0px">
                                                <div class="form-group">
                                                    <input type="text" name="mac_rotation_pass[1][]" placeholder="Rotation Password" class="form-control" value="<?php
                                                    if(count($geocode_mac) > 0){
                                                        echo $geocode_mac[0]['cl_mac_url_rotation_pass'];
                                                    }
                                                ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="padding-right:0px">
                                                <div class="form-group">
                                                    <input type="text" name="mac_rotation_ratio[1][]" placeholder="Rotation Ratio" class="form-control" value="<?php
                                                    if(count($geocode_mac) > 0){
                                                        echo $geocode_mac[0]['cl_mac_url_rotation'];
                                                    }
                                                ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <a class="btn btn-xs btn-success appendMac">Add More</a>
                                        </div>
                                    </div>
                                        <div class="appended_mac" style="padding-top: 10px;">
                                            <?php
                                                foreach($geocode_mac as $mac_key => $geocode_mac_data){

                                                     if($mac_key != 0){
                                                         $uni = uniqid();
                                                         $key_mac = $mac_key + 1;
                                                ?>

                                                <div class="mac_row <?= $uni ?>" style="box-shadow: 3px 4px #b5a9a9;padding:7px 10px 1px 0px;margin-top:10px">


                                                    <div class="row"><div class="col-md-4"><select class="form-control mactargetingurl"><option value="" index="'<?= $key_mac ?>'">Select</option><option value="1" index="'<?= $key_mac ?>'">File Upload</option><option value="2" index="'<?= $key_mac ?>'">URL</option></select></div>
                                                    <div class="col-md-8"> <div class="form-group"><div class="mac_url" name="mac_url['<?= $key_mac ?>'][]"><input type="text" name="mac_url['<?= $key_mac ?>'][]" placeholder="Mac Url" class="form-control" value="<?= $geocode_mac_data['mac_url_file'] ?>">
                                                    </div><div class="mac_url_file d-none" name="mac_url_file['<?= $key_mac ?>'][]"><div class="input-group "><div class="custom-file" ><input type="file" class="custom-file-input" name="mac_url_file['<?= $key_mac ?>'][]"></div></div></div></div></div>  </div>

                                                    <div class="col-md-6" style="padding:0px"> <div class="form-group"> <input type="text" name="mac_pass['<?= $key_mac ?>'][]" placeholder="Mac Password" class="form-control" value="<?= $geocode_mac_data['cl_mac_url_pass'] ?>"> </div></div>



                                                <?php
                                                    $selected_mac_count = explode(',',$geocode_mac_data['cl_mac_url_countries']);
                                                ?>
                                                <div class="col-md-6" style="padding-right:0px"> <div class="form-group"> <select class="selectpicker form-control " data-flag="true" data-live-search="true" name="mac_countries['<?= $key_mac ?>'][]" style="height: auto;" data-actions-box="true" multiple required> @foreach ($countries as $countries_data) <option value="{{$countries_data->code}}" <?=
                                                    (in_array($countries_data->code,$selected_mac_count)?"selected":"") ?>>{{$countries_data->name}}</option> @endforeach </select> </div></div><div id="mac_rotation_div">


                                            <div class="row"><div class="col-md-4"><select class="form-control macTargetingRotation"><option value=""  index="'<?= $key_mac ?>'">Select</option><option value="1" index="'<?= $key_mac ?>'">File Upload</option><option value="2" index="'<?= $key_mac ?>'">URL</option> </select></div><div class="col-md-8"><div class="form-group"><div class="mac_rotation" name="mac_rotation['<?= $key_mac ?>'][]"><input type="text" name="mac_rotation['<?= $key_mac ?>'][]" placeholder="Mac Rotation Url" class="form-control"
                                                value="<?= $geocode_mac_data['mac_rotation_file'] ?>"></div><div class="mac_rotation_file d-none" name="mac_rotation_file['<?= $key_mac ?>'][]"><div class="input-group "><div class="custom-file "> <input type="file" class="custom-file-input" name="mac_rotation_file['<?= $key_mac ?>'][]"></div></div></div></div></div></div>

                                            <div class="col-md-6" style="padding:0px"> <div class="form-group"> <input type="text" name="mac_rotation_pass['<?= $key_mac ?>'][]" placeholder="Rotation Password" class="form-control" value="<?= $geocode_mac_data['cl_mac_url_rotation_pass'] ?>"> </div></div><div class="col-md-6" style="padding-right:0px"> <div class="form-group"> <input type="text" name="mac_rotation_ratio['<?= $key_mac ?>'][]" placeholder="Rotation Ratio" class="form-control" value="<?= $geocode_mac_data['cl_mac_url_rotation'] ?>"> </div></div></div><div class="form-group"> <a class="btn btn-xs btn-danger" onclick="remove('<?= $uni ?>')">Remove</a> </div></div>
                                            <?php

                                                    }
                                                }

                                            ?>

                                        </div>
                                    </div>




                                    <div class="col-md-4">
                                        <div class="and_row" style="box-shadow: 3px 4px #b5a9a9;padding:7px;">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <select class="form-control andTargetUrl">
                                                        <option value=""  index="1">Select</option>
                                                        <option value="1" index="1">File Upload</option>
                                                        <option value="2" index="1">URL</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="and_url" name="and_url[1][]">
                                                        <input type="text" name="and_url[1][]" placeholder="Android Url" class="form-control" value="<?php
                                                        if(count($geocode_and) > 0){
                                                            echo $geocode_and[0]['android_url_file'];
                                                        }
                                                        ?>">
                                                        </div>
                                                        <div class="and_url_file d-none" name="and_url_file[1][]">
                                                            <div class="input-group ">
                                                                <div class="custom-file ">
                                                                    <input type="file" class="custom-file-input" name="and_url_file[1][]"
                                                                    >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6" style="padding:0px">
                                                <div class="form-group">
                                                    <input type="text" name="and_pass[1][]" placeholder="Android Password" class="form-control" value="<?php
                                                    if(count($geocode_and) > 0){
                                                        echo $geocode_and[0]['cl_and_url_pass'];
                                                    }
                                                ?>">
                                                </div>
                                            </div>
                                            <?php
                                                if(count($geocode_and) > 0){
                                                    $selected_and_count_first = explode(',',$geocode_and[0]['cl_and_url_countries']);
                                                }else{
                                                    $selected_and_count_first = [];
                                                }
                                            ?>
                                            <div class="col-md-6" style="padding-right:0px">
                                                <div class="form-group">
                                                    <select class="selectpicker form-control " data-flag="true" data-live-search="true" name="and_countries[1][]" style="height: auto;" data-actions-box="true" multiple required>
                                                        @foreach ($countries as $countries_data)
                                                            <option value="{{ $countries_data->code }}" <?=
                                                                (in_array($countries_data->code,$selected_and_count_first)?"selected":"") ?>>{{ $countries_data->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="and_rotation_div">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <select class="form-control andTargetRotation">
                                                            <option value=""  index="1">Select</option>
                                                            <option value="1" index="1">File Upload</option>
                                                            <option value="2" index="1">URL</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="and_rotation" name="and_rotation[1][]">
                                                                <input type="text" name="and_rotation[1][]" placeholder="Android Rotation Url" class="form-control" value="<?php
                                                            if(count($geocode_and) > 0){
                                                                echo $geocode_and[0]['android_rotation_file'];
                                                            }
                                                            ?>">
                                                            </div>
                                                            <div>
                                                                <div class="and_rotation_file d-none" name="and_rotation_file[1][]">
                                                                    <div class="input-group ">
                                                                        <div class="custom-file ">
                                                                            <input type="file" class="custom-file-input" name="and_rotation_file[1][]"
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>

                                                <div class="col-md-6" style="padding:0px">
                                                    <div class="form-group">
                                                        <input type="text" name="and_rotation_pass[1][]" placeholder="Rotation Password" class="form-control" value="<?php
                                                        if(count($geocode_and) > 0){
                                                            echo $geocode_and[0]['cl_and_url_rotation_pass'];
                                                        }
                                                    ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6" style="padding-right:0px">
                                                    <div class="form-group">
                                                        <input type="text" name="and_rotation_ratio[1][]" placeholder="Rotation Ratio" class="form-control" value="<?php
                                                        if(count($geocode_and) > 0){
                                                            echo $geocode_and[0]['cl_and_url_rotation'];
                                                        }
                                                    ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <a class="btn btn-xs btn-success appendAnd">Add More</a>
                                            </div>
                                        </div>
                                            <div class="appended_and" style="padding-top: 10px;">
                                               <?php
                                                   foreach($geocode_and as $and_key => $geocode_and_data){
                                                        if($and_key != 0){
                                                            $uni = uniqid();
                                                            $key_and = $and_key + 1;
                                                ?>
                                                <div class="and_row <?= $uni ?>" style="box-shadow: 3px 4px #b5a9a9;padding:7px 10px 1px 0px;margin-top:10px">

                                                    <div class="row"><div class="col-md-4"><select class="form-control andTargetUrl"><option value=""  index="'<?= $key_and ?>'">Select</option><option value="1" index="'<?= $key_and ?>'">File Upload</option> <option value="2" index="'<?= $key_and ?>'">URL</option> </select></div><div class="col-md-8">
                                                        <div class="form-group"> <div class="and_url " name="and_url['<?= $key_and ?>'][]"><input type="text" name="and_url['<?= $key_and ?>'][]" placeholder="Android Url" class="form-control" value="<?= $geocode_and_data['android_url_file'] ?> "> </div><div class="and_url_file d-none" name="and_url_file['<?= $key_and ?>'][]"> <div class="input-group "><div class="custom-file "><input type="file" class="custom-file-input" name="and_url_file['<?= $key_and ?>'][]" > </div> </div></div></div></div></div>

                                                    <div class="col-md-6" style="padding:0px"> <div class="form-group"> <input type="text" name="and_pass['<?= $key_and ?>'][]" placeholder="Android Password" class="form-control" value="<?= $geocode_and_data['cl_and_url_pass'] ?>"> </div></div>
                                                <?php
                                                $selected_and_count = explode(',',$geocode_and_data['cl_and_url_countries']);
                                                ?>
                                                <div class="col-md-6" style="padding-right:0px"> <div class="form-group"> <select class="selectpicker form-control " data-flag="true" data-live-search="true" name="and_countries['<?= $key_and ?>'][]" style="height: auto;" data-actions-box="true" multiple required> @foreach ($countries as $countries_data) <option value="{{$countries_data->code}}" <?=
                                                    (in_array($countries_data->code,$selected_and_count)?"selected":"") ?>>{{$countries_data->name}}</option> @endforeach </select> </div></div><div id="and_rotation_div">

                                            <div class="row"><div class="col-md-4"><select class="form-control andTargetRotation">
                                                <option value=""  index="'<?= $key_and ?>'">Select</option><option value="1" index="'<?= $key_and ?>'">File Upload</option><option value="2" index="'<?= $key_and ?>">URL</option></select></div>
                                                <div class="col-md-8"><div class="form-group"><div class="and_rotation" name="and_rotation['<?= $key_and ?>'][]"><input type="text" name="and_rotation['<?= $key_and ?>'][]" placeholder="Android Rotation Url" class="form-control" value=" <?= $geocode_and_data['android_rotation_file'] ?>"></div><div><div class="and_rotation_file d-none" name="and_rotation_file['<?= $key_and ?>'][]"><div class="input-group "><div class="custom-file "> <input type="file" class="custom-file-input" name="and_rotation_file['<?= $key_and ?>'][]"></div></div> </div> </div> </div></div></div>

                                                        <div class="col-md-6" style="padding:0px"> <div class="form-group"> <input type="text" name="and_rotation_pass['<?= $key_and ?>'][]" placeholder="Rotation Password" class="form-control" value="<?= $geocode_and_data['cl_and_url_rotation_pass'] ?>"> </div></div><div class="col-md-6" style="padding-right:0px"> <div class="form-group"> <input type="text" name="and_rotation_ratio['<?= $key_and ?>'][]" placeholder="Rotation Ratio" class="form-control" value="<?= $geocode_and_data['cl_and_url_rotation'] ?>"> </div></div></div><div class="form-group"> <a class="btn btn-xs btn-danger" onclick="remove('<?= $uni ?>')">Remove</a> </div></div>
                                                <?php

                                                        }
                                                    }

                                                ?>
                                            </div>
                                        </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <br>
                                    @if ($superAdmin || in_array(config('permissions.geo_targeting.edit'), $permissions))
                                        <input type="submit" class="btn btn-success" name="" value="Save">
                                        @endif
                                        @if ($superAdmin || in_array(config('permissions.geo_targeting.delete'), $permissions))

                                        <a href="{{route('geocode.delete')}}" class="btn btn-danger">Delete</a>
                                        @endif

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://unpkg.com/bootstrap-select@1.12.4/dist/js/bootstrap-select.min.js"></script>
    <script src="https://unpkg.com/bootstrap-select-country@4.0.0/dist/js/bootstrap-select-country.min.js"></script>
    <script>
        (function ($){
            $(document).ready(function(e) {
                $('.countrypicker').countrypicker();
            });







            $('.appendWindow').click(function(){
                var uni = new Date().valueOf();
                var count = $('.win_row').length;
                count = count + 1;

             $('.appended_window').append('<div class="win_row '+uni+'" style="box-shadow: 3px 4px #b5a9a9;padding:7px 10px 1px 0px;margin-top:10px">  <div class="row"> <div class="col-md-4">  <select class="form-control windowtargetingurl"> <option value="" index="'+count+'">Select</option><option value="1" index="'+count+'">File Upload</option><option value="2" index="'+count+'">URL</option> </select> </div><div class="col-md-8 "><div class="form-group"><div class="window_targeting_url" name="window_url['+count+'][]"><input type="text" name="window_url['+count+'][]" placeholder="Window Url" class="form-control" value="<?php if (count($geocode_win) > 0) { echo $geocode_win[0]['cl_win_url']; }?>"> </div> <div class="window_targeting_url_file d-none" name="window_url_file['+count+'][]"> <div class="input-group"> <div class="custom-file "><input type="file" class="custom-file-input" name="window_url_file['+count+'][]"> </div></div> </div> </div> </div>  </div> <div class="col-md-6" style="padding:0px"> <div class="form-group"> <input type="text" name="window_pass['+count+'][]" placeholder="Window Password" class="form-control"> </div></div><div class="col-md-6" style="padding-right:0px"> <div class="form-group"> <select class="selectpicker form-control " data-flag="true" data-live-search="true" name="win_countries['+count+'][]" style="height: auto;" data-actions-box="true" multiple required> @foreach ($countries as $countries_data) <option value="{{$countries_data->code}}">{{$countries_data->name}}</option> @endforeach </select> </div></div><div id="win_rotation_div"><div class="row"><div class="col-md-4"><select class="form-control windowtargetingrotation"><option value="" index="'+count+'">Select</option><option value="1" index="'+count+'">File Upload</option><option value="2" index="'+count+'">URL</option></select></div><div class="col-md-8"><div class="form-group"><div class="window_rotation_url" name="window_rotation['+count+'][]"><input type="text" name="window_rotation['+count+'][]" placeholder="Window Rotation Url" class="form-control" value="<?php if (count($geocode_win) > 0) {echo $geocode_win[0]['cl_win_rotation_url']; }?>"></div> <div class="window_rotation_file d-none" name="window_rotation_file['+count+'][]"><div class="input-group "><div class="custom-file"><input type="file" class="custom-file-input" name="window_rotation_file['+count+'][]"></div></div></div></div></div></div></div><div class="col-md-6" style="padding:0px"> <div class="form-group"> <input type="text" name="window_rotation_pass['+count+'][]" placeholder="Rotation Password" class="form-control"> </div></div><div class="col-md-6" style="padding-right:0px"> <div class="form-group"> <input type="text" name="window_rotation_ratio['+count+'][]" placeholder="Rotation Ratio" class="form-control"> </div></div><div class="form-group"> <a class="btn btn-xs btn-danger" onclick="remove(\''+uni+'\')">Remove</a> </div></div>');
                // $('.appended_window').append(windowTargetingUrl);
                $('.selectpicker').selectpicker();
            })


            $('.appendMac').click(function(){
                var uni = new Date().valueOf();
                var count = $('.mac_row').length;
                count = count + 1;
                $('.appended_mac').append('<div class="mac_row '+uni+'" style="box-shadow: 3px 4px #b5a9a9;padding:7px 10px 1px 0px;margin-top:10px"> <div class="row"><div class="col-md-4"><select class="form-control mactargetingurl"><option value="" index="'+count+'">Select</option><option value="1"index="'+count+'">File Upload</option><option value="2" index="'+count+'">URL</option></select></div><div class="col-md-8"> <div class="form-group"><div class="mac_url" name="mac_url['+count+'][]"><input type="text" name="mac_url['+count+'][]" placeholder="Mac Url" class="form-control" value="<?php if(count($geocode_mac) > 0){ echo $geocode_mac[0]['cl_mac_url'];}?>"></div><div class="mac_url_file d-none" name="mac_url_file['+count+'][]"><div class="input-group "><div class="custom-file" ><input type="file" class="custom-file-input" name="mac_url_file['+count+'][]"></div></div></div></div></div>  </div><div class="col-md-6" style="padding:0px"> <div class="form-group"> <input type="text" name="mac_pass['+count+'][]" placeholder="Mac Password" class="form-control"> </div></div><div class="col-md-6" style="padding-right:0px"> <div class="form-group"> <select class="selectpicker form-control " data-flag="true" data-live-search="true" name="mac_countries['+count+'][]" style="height: auto;" data-actions-box="true" multiple required> @foreach ($countries as $countries_data) <option value="{{$countries_data->code}}">{{$countries_data->name}}</option> @endforeach </select> </div></div><div id="mac_rotation_div">  <div class="row"><div class="col-md-4"><select class="form-control macTargetingRotation"><option value=""  index="'+count+'">Select</option><option value="1" index="'+count+'">File Upload</option><option value="2" index="'+count+'">URL</option> </select></div><div class="col-md-8"><div class="form-group"><div class="mac_rotation d-none" name="mac_rotation['+count+'][]"><input type="text" name="mac_rotation['+count+'][]" placeholder="Mac Rotation Url" class="form-control" value="<?php if(count($geocode_mac) > 0){ echo $geocode_mac[0]['cl_mac_rotation_url'];  }?>"></div><div class="mac_rotation_file " name="mac_rotation_file['+count+'][]"><div class="input-group "><div class="custom-file "> <input type="file" class="custom-file-input" name="mac_rotation_file['+count+'][]"></div></div></div></div></div></div>  <div class="col-md-6" style="padding:0px"> <div class="form-group"> <input type="text" name="mac_rotation_pass['+count+'][]" placeholder="Rotation Password" class="form-control"> </div></div><div class="col-md-6" style="padding-right:0px"> <div class="form-group"> <input type="text" name="mac_rotation_ratio['+count+'][]" placeholder="Rotation Ratio" class="form-control"> </div></div></div><div class="form-group"> <a class="btn btn-xs btn-danger" onclick="remove(\''+uni+'\')">Remove</a> </div></div>');

                $('.selectpicker').selectpicker();
            })

            $('.appendAnd').click(function(){
                var uni = new Date().valueOf();
                var count = $('.and_row').length;
                count = count + 1;
                $('.appended_and').append('<div class="and_row '+uni+'" style="box-shadow: 3px 4px #b5a9a9;padding:7px 10px 1px 0px;margin-top:10px">   <div class="row"><div class="col-md-4"><select class="form-control andTargetUrl"><option value=""  index="'+count+'">Select</option><option value="1" index="'+count+'">File Upload</option> <option value="2" index="'+count+'">URL</option> </select></div><div class="col-md-8"><div class="form-group"> <div class="and_url d-none" name="and_url['+count+'][]"><input type="text" name="and_url['+count+'][]" placeholder="Android Url" class="form-control" value="<?php if(count($geocode_and) > 0){ echo $geocode_and[0]['cl_and_url'];  } ?>"> </div><div class="and_url_file " name="and_url_file['+count+'][]"> <div class="input-group "><div class="custom-file "><input type="file" class="custom-file-input" name="and_url_file['+count+'][]" > </div> </div></div></div></div></div>  <div class="col-md-6" style="padding:0px"> <div class="form-group"> <input type="text" name="and_pass['+count+'][]" placeholder="Android Password" class="form-control"> </div></div><div class="col-md-6" style="padding-right:0px"> <div class="form-group"> <select class="selectpicker form-control " data-flag="true" data-live-search="true" name="and_countries['+count+'][]" style="height: auto;" data-actions-box="true" multiple required> @foreach ($countries as $countries_data) <option value="{{$countries_data->code}}">{{$countries_data->name}}</option> @endforeach </select> </div></div><div id="and_rotation_div"><div class="row"><div class="col-md-4"><select class="form-control andTargetRotation"> <option value=""  index="'+count+'">Select</option><option value="1" index="'+count+'">File Upload</option><option value="2" index="'+count+'">URL</option></select></div><div class="col-md-8"><div class="form-group"><div class="and_rotation" name="and_rotation['+count+'][]"><input type="text" name="and_rotation['+count+'][]" placeholder="Android Rotation Url" class="form-control" value="<?php if(count($geocode_and) > 0){echo $geocode_and[0]['cl_and_url_rotation']; }?>"></div><div><div class="and_rotation_file d-none" name="and_rotation_file['+count+'][]"><div class="input-group "><div class="custom-file "> <input type="file" class="custom-file-input" name="and_rotation_file['+count+'][]"></div></div> </div> </div> </div></div></div>  <div class="col-md-6" style="padding:0px"> <div class="form-group"> <input type="text" name="and_rotation_pass['+count+'][]" placeholder="Rotation Password" class="form-control"> </div></div><div class="col-md-6" style="padding-right:0px"> <div class="form-group"> <input type="text" name="and_rotation_ratio['+count+'][]" placeholder="Rotation Ratio" class="form-control"> </div></div></div><div class="form-group"> <a class="btn btn-xs btn-danger" onclick="remove(\''+uni+'\')">Remove</a> </div></div>');

                $('.selectpicker').selectpicker();
            })
        })(jQuery);

        function remove(id){
            $('.'+id).remove();
        }

        </script>

        <script>
// $("").on("change", function(){
//     alert("sdfkfskjk");
// });

$(document).on("change", ".windowtargetingurl", function(){
   if (this.value === '2') {
          let index =  $('option:selected', this).attr('index');
          $('div[name="window_url_file['+index+'][]"]').addClass('d-none');
          $('div[name="window_url['+index+'][]"]').removeClass('d-none');

        }
        if (this.value === '1') {

            let index =  $('option:selected', this).attr('index');
            $('div[name="window_url_file['+index+'][]"]').removeClass('d-none');
            $('div[name="window_url['+index+'][]"]').addClass('d-none');

            // $('div').find([name="window_url['+urlNo+'][]"]) .addClass('d-none');

        }
        if (this.value === '') {
            let index =  $('option:selected', this).attr('index');
            $('div[name="window_url_file['+index+'][]"]').addClass('d-none');
            $('div[name="window_url['+index+'][]"]').addClass('d-none');
        }
});

$(document).on("change", ".windowtargetingrotation", function(){
    if (this.value === '2') {
          let index =  $('option:selected', this).attr('index');
          $('div[name="window_rotation_file['+index+'][]"]').addClass('d-none');
          $('div[name="window_rotation['+index+'][]"]').removeClass('d-none');

        }
        if (this.value === '1') {

            let index =  $('option:selected', this).attr('index');
            $('div[name="window_rotation_file['+index+'][]"]').removeClass('d-none');
            $('div[name="window_rotation['+index+'][]"]').addClass('d-none');

        }
        if (this.value === '') {
            let index =  $('option:selected', this).attr('index');
            $('div[name="window_rotation_file['+index+'][]"]').addClass('d-none');
            $('div[name="window_rotation['+index+'][]"]').addClass('d-none');
        }
});
$(document).on("change", ".mactargetingurl", function(){
    if (this.value === '2') {
          let index =  $('option:selected', this).attr('index');
          $('div[name="mac_url_file['+index+'][]"]').addClass('d-none');
          $('div[name="mac_url['+index+'][]"]').removeClass('d-none');

        }
        if (this.value === '1') {

            let index =  $('option:selected', this).attr('index');
            $('div[name="mac_url_file['+index+'][]"]').removeClass('d-none');
            $('div[name="mac_url['+index+'][]"]').addClass('d-none');

            // $('div').find([name="window_url['+urlNo+'][]"]) .addClass('d-none');

        }
        if (this.value === '') {
            let index =  $('option:selected', this).attr('index');
            $('div[name="mac_url_file['+index+'][]"]').addClass('d-none');
            $('div[name="mac_url['+index+'][]"]').addClass('d-none');
        }
});
$(document).on("change", ".macTargetingRotation", function(){

          if (this.value === '2') {
          let index =  $('option:selected', this).attr('index');
          $('div[name="mac_rotation_file['+index+'][]"]').addClass('d-none');
          $('div[name="mac_rotation['+index+'][]"]').removeClass('d-none');

        }
        if (this.value === '1') {

            let index =  $('option:selected', this).attr('index');
            $('div[name="mac_rotation_file['+index+'][]"]').removeClass('d-none');
            $('div[name="mac_rotation['+index+'][]"]').addClass('d-none');

            // $('div').find([name="window_url['+urlNo+'][]"]) .addClass('d-none');

        }
        if (this.value === '') {
            let index =  $('option:selected', this).attr('index');
            $('div[name="mac_rotation_file['+index+'][]"]').addClass('d-none');
            $('div[name="mac_rotation['+index+'][]"]').addClass('d-none');
        }

});

$(document).on("change", ".andTargetUrl", function(){

          if (this.value === '2') {
          let index =  $('option:selected', this).attr('index');
          $('div[name="and_url_file['+index+'][]"]').addClass('d-none');
          $('div[name="and_url['+index+'][]"]').removeClass('d-none');

        }
        if (this.value === '1') {

            let index =  $('option:selected', this).attr('index');
            $('div[name="and_url_file['+index+'][]"]').removeClass('d-none');
            $('div[name="and_url['+index+'][]"]').addClass('d-none');

            // $('div').find([name="window_url['+urlNo+'][]"]) .addClass('d-none');

        }
        if (this.value === '') {
            let index =  $('option:selected', this).attr('index');
            $('div[name="and_url_file['+index+'][]"]').addClass('d-none');
            $('div[name="and_url['+index+'][]"]').addClass('d-none');
        }
});

$(document).on("change", ".andTargetRotation", function(){

    if (this.value === '2') {
          let index =  $('option:selected', this).attr('index');
          $('div[name="and_rotation_file['+index+'][]"]').addClass('d-none');
          $('div[name="and_rotation['+index+'][]"]').removeClass('d-none');

        }
        if (this.value === '1') {

            let index =  $('option:selected', this).attr('index');
            $('div[name="and_rotation_file['+index+'][]"]').removeClass('d-none');
            $('div[name="and_rotation['+index+'][]"]').addClass('d-none');

            // $('div').find([name="window_url['+urlNo+'][]"]) .addClass('d-none');

        }
        if (this.value === '') {
            let index =  $('option:selected', this).attr('index');
            $('div[name="and_rotation_file['+index+'][]"]').addClass('d-none');
            $('div[name="and_rotation['+index+'][]"]').addClass('d-none');
        }
});

          $(".windowtargetingurl").change(function() {
            if (this.value === '2') {
          let index =  $('option:selected', this).attr('index');
          $('div[name="window_rotation_file['+index+'][]"]').addClass('d-none');
          $('div[name="window_rotation['+index+'][]"]').removeClass('d-none');

        }
        if (this.value === '1') {

            let index =  $('option:selected', this).attr('index');
            $('div[name="window_rotation_file['+index+'][]"]').removeClass('d-none');
            $('div[name="window_rotation['+index+'][]"]').addClass('d-none');

            // $('div').find([name="window_url['+urlNo+'][]"]) .addClass('d-none');

        }
        if (this.value === '') {
            let index =  $('option:selected', this).attr('index');
            $('div[name="window_rotation_file['+index+'][]"]').addClass('d-none');
            $('div[name="window_rotation['+index+'][]"]').addClass('d-none');
        }
    });



    $(".windowtargetingrotation").change(function() {
          if (this.value === '2') {
          let index =  $('option:selected', this).attr('index');
          $('div[name="window_rotation_file['+index+'][]"]').addClass('d-none');
          $('div[name="window_rotation['+index+'][]"]').removeClass('d-none');

        }
        if (this.value === '1') {

            let index =  $('option:selected', this).attr('index');
            $('div[name="window_rotation_file['+index+'][]"]').removeClass('d-none');
            $('div[name="window_rotation['+index+'][]"]').addClass('d-none');

            // $('div').find([name="window_url['+urlNo+'][]"]) .addClass('d-none');

        }
        if (this.value === '') {
            let index =  $('option:selected', this).attr('index');
            $('div[name="window_rotation_file['+index+'][]"]').addClass('d-none');
            $('div[name="window_rotation['+index+'][]"]').addClass('d-none');
        }
    });

    $(".mactargetingurl").change(function() {
          if (this.value === '2') {
          let index =  $('option:selected', this).attr('index');
          $('div[name="mac_url_file['+index+'][]"]').addClass('d-none');
          $('div[name="mac_url['+index+'][]"]').removeClass('d-none');

        }
        if (this.value === '1') {

            let index =  $('option:selected', this).attr('index');
            $('div[name="mac_url_file['+index+'][]"]').removeClass('d-none');
            $('div[name="mac_url['+index+'][]"]').addClass('d-none');

            // $('div').find([name="window_url['+urlNo+'][]"]) .addClass('d-none');

        }
        if (this.value === '') {
            let index =  $('option:selected', this).attr('index');
            $('div[name="mac_url_file['+index+'][]"]').addClass('d-none');
            $('div[name="mac_url['+index+'][]"]').addClass('d-none');
        }
    });

    $(".macTargetingRotation").change(function() {
          if (this.value === '2') {
          let index =  $('option:selected', this).attr('index');
          $('div[name="mac_rotation_file['+index+'][]"]').addClass('d-none');
          $('div[name="mac_rotation['+index+'][]"]').removeClass('d-none');

        }
        if (this.value === '1') {

            let index =  $('option:selected', this).attr('index');
            $('div[name="mac_rotation_file['+index+'][]"]').removeClass('d-none');
            $('div[name="mac_rotation['+index+'][]"]').addClass('d-none');

            // $('div').find([name="window_url['+urlNo+'][]"]) .addClass('d-none');

        }
        if (this.value === '') {
            let index =  $('option:selected', this).attr('index');
            $('div[name="mac_rotation_file['+index+'][]"]').addClass('d-none');
            $('div[name="mac_rotation['+index+'][]"]').addClass('d-none');
        }
    });

    $(".andTargetUrl").change(function() {
          if (this.value === '2') {
          let index =  $('option:selected', this).attr('index');
          $('div[name="and_url_file['+index+'][]"]').addClass('d-none');
          $('div[name="and_url['+index+'][]"]').removeClass('d-none');

        }
        if (this.value === '1') {

            let index =  $('option:selected', this).attr('index');
            $('div[name="and_url_file['+index+'][]"]').removeClass('d-none');
            $('div[name="and_url['+index+'][]"]').addClass('d-none');

            // $('div').find([name="window_url['+urlNo+'][]"]) .addClass('d-none');

        }
        if (this.value === '') {
            let index =  $('option:selected', this).attr('index');
            $('div[name="and_url_file['+index+'][]"]').addClass('d-none');
            $('div[name="and_url['+index+'][]"]').addClass('d-none');
        }
    });

    $(".andTargetRotation").change(function() {
          if (this.value === '2') {
          let index =  $('option:selected', this).attr('index');
          $('div[name="and_rotation_file['+index+'][]"]').addClass('d-none');
          $('div[name="and_rotation['+index+'][]"]').removeClass('d-none');

        }
        if (this.value === '1') {

            let index =  $('option:selected', this).attr('index');
            $('div[name="and_rotation_file['+index+'][]"]').removeClass('d-none');
            $('div[name="and_rotation['+index+'][]"]').addClass('d-none');

            // $('div').find([name="window_url['+urlNo+'][]"]) .addClass('d-none');

        }
        if (this.value === '') {
            let index =  $('option:selected', this).attr('index');
            $('div[name="and_rotation_file['+index+'][]"]').addClass('d-none');
            $('div[name="and_rotation['+index+'][]"]').addClass('d-none');
        }
    });


        </script>
    @endsection
    @include('internal_layout.footer')
