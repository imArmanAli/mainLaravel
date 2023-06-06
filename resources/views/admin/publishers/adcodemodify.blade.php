@include('internal_layout.header')
@include('internal_layout.leftbar')
@section('content')
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-select@1.12.4/dist/css/bootstrap-select.min.css"
        type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-select-country@4.0.0/dist/css/bootstrap-select-country.min.css"
        type="text/css" />
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ $content_title }} <small>(Ad Code)</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.show') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('publishers.show') }}"> {{ $content_title }}</a></li>
                <li class="active">Ad Code</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    @include('admin.publishers.menu')
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Step 1 (Copy Meta Code)</h3>
                        </div>
                        <div class="box-body">
                            <input type="hidden" id="copy-paste-area">

                            <div id="js-section" class="mb-30" style="">
                                <div class="alert alert-warning alert-dismissable"
                                    style="background-color:transparent!important;border: 1px solid #eee;">

                                    <i class="fa fa-exclamation-triangle" style="color: #F00;"></i> <strong
                                        style="color:red;">Hi! Users having large traffic are advised to ask their manager
                                        for dedicated ads domains.</strong>
                                </div>

                                <p class="text-muted">You must add this meta tag in your site head section for your site
                                    security.</p>

                                <div id="header-js-code" class="form-control filled-input pt-10 mb-10 text-info"
                                    style="margin-bottom: 15px;">
                                    &lt;meta name="referrer" content="no-referrer" /&gt;
                                </div>
                                <button class="copy_any_text btn btn-success btn-lable-wrap left-label"
                                    data-section-id="#header-js-code"> <span class="btn-label"><i class="fa fa-copy"></i>
                                    </span><span class="btn-text">Copy Meta Code</span></button>
                            </div>
                        </div>
                    </div>

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Button Preview</h3>
                        </div>
                        <div class="box-body">

                            <center><button
                                    style="font-weight: {{ $sinads->button_font_weight }};font-size: {{ $sinads->button_font_size }}px;color: <?php echo $sinads->button_font_color; ?>;background-color: <?php echo $sinads->button_color; ?>;padding:12px;border-radius: 3px;padding: 0px 20px;border-color: transparent;"><?php echo $sinads->button_label; ?></button>
                            </center>
                        </div>
                    </div>

                    @if ($superAdmin || in_array(config('permissions.wordpress_button_code.view'), $permissions))
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <div class="box-title col-md-12" style="padding: 0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3 class="box-title">Step 2-1 (
                                                <?php
                                                    if ($sinads->platform == '1') {
                                                        echo 'Wordpress';
                                                    }
                                                    if ($sinads->platform == '2') {
                                                        echo 'Blogspot';
                                                    }
                                                    if ($sinads->platform == '3') {
                                                        echo 'Forum';
                                                    }
                                                    if ($sinads->platform == '4') {
                                                        echo 'PHP';
                                                    }
                                                ?>
                                                Button Code)
                                            </h3>
                                        </div>



                                                     <!-- Modal -->
                                         <div id="wordpress_setting" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"><?php
                                                    if ($sinads->platform == '1') {
                                                        echo 'Wordpress';
                                                    }
                                                    if ($sinads->platform == '2') {
                                                        echo 'Blogspot';
                                                    }
                                                    if ($sinads->platform == '3') {
                                                        echo 'Forum';
                                                    }
                                                    if ($sinads->platform == '4') {
                                                        echo 'PHP';
                                                    }
                                                ?> Setting</h4>
                                                </div>
                                                <div class="modal-body">
                                                <form method="post" id="formButtonCode" action="{{ route('ad_code_link.save') }}">
                                                     @csrf
                                                <div >
                                                    <input type="hidden" name="id" value="<?php echo $detail1['id']; ?>">
                                                    <input type="hidden" name="pubid" value="<?php echo $singnod->id; ?>">
                                                    <input type="hidden" name="sid" value="<?php echo $sid; ?>">
                                                    <input type="hidden" name="adid" value="<?php echo $sinads->id; ?>">
                                                    <input type="hidden" name="adlink" value="1">
                                                <div class="form-group row">
                                                    <label for="tmp_type" class="col-sm-4 col-form-label">Template Type</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="linkCode" id="linkCode">
                                                            <option value="0" <?php echo ($detail1['link_code'] == 0)?'selected':''; ?> >HTML</option>
                                                            <option value="1" <?php echo ($detail1['link_code'] == 1)?'selected':''; ?> >PHP</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="tmp_type" class="col-sm-4 col-form-label">Template Type</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="tmp_type" id="tmp_type">
                                                            <option value="1" <?php echo ($detail1['tmp_type'] == 1)?'selected':''; ?> >MP4</option>

                                                            <option value="2" <?php echo ($detail1['tmp_type'] == 2)?'selected':''; ?> >MP3</option>

                                                            <option value="3" <?php echo ($detail1['tmp_type'] == 3)?'selected':''; ?> >PDF</option>

                                                            <option value="4" <?php echo ($detail1['tmp_type'] == 4)?'selected':''; ?> >ZIP</option>

                                                            <option value="5" <?php echo ($detail1['tmp_type'] == 5 || $detail1['tmp_type'] == '')?'selected':''; ?> >Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="tmp_type" class="col-sm-4 col-form-label">Link Type</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="linkType" id="linkType">
                                                            <option value="0" <?php echo ($detail1['link_type'] == 0)?'selected':''; ?> >Copy Link</option>
                                                            <option value="1" <?php echo ($detail1['link_type'] == 1)?'selected':''; ?> >Download Link</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="tmp_type" class="col-sm-4 col-form-label">Captcha</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="isCaptcha" id="isCaptcha">
                                                            <option value="0" <?php echo ($detail1['isCaptcha'] == 0)?'selected':''; ?> >Disable</option>
                                                            <option value="1" <?php echo ($detail1['isCaptcha'] == 1)?'selected':''; ?> >Enable</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                    @if ($superAdmin || in_array(config('permissions.wordpress_button_code.add'), $permissions))
                                                        <button type="submit" name="wpCodeSave" class="btn btn-primary btn-block wpCodeSave">
                                                            <i class="spinner"></i>Save
                                                        </button>
                                                    @endif
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a type="button" class="btn btn-danger  btn-block" data-dismiss="modal">Cancel</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </form>
                                                    
                                                </div>
                                                
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                                <button class="pull-right btn btn-xs btn-success" data-toggle="modal" data-target="#wordpress_setting"><i class="fa fa-cogs"></i>Settings</button>                                        
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="box-body">
                                <?php
                            if($sinads->platform == '2'){
                            ?>
                                <b>Important Note:-<br></b>
                                <p>Edit your blogger template and add this line on your template head tag</p>
                                <code>&#x3C;meta expr:content=&#x27;data:blog.title&#x27;
                                    property=&#x27;og:site_name&#x27;/&#x3E;</code>
                                <?php

                            }
                            $aduid = $sinads->id;
                            $admarket = "installusd6";
                            $pid = $sinads->pubid;
                            $hashcod = md5($aduid.'-'.$admarket.'-'.$pid);
                            ?>
                                <div class="htmlLink">
                                    <textarea id="textarea-adcode" style="border: 1px solid #CCCCCC;width: 100%;" readonly="readonly" rows="7">&lt;center&gt;
                                        &lt;style&gt;
                                            .button {
                                            background-color: #4CAF50; /* Green */
                                            border: none;
                                            color: white;
                                            padding: 15px 32px;
                                            text-align: center;
                                            text-decoration: none;
                                            display: inline-block;
                                            font-size: 16px;
                                            margin: 4px 2px;
                                            cursor: pointer;
                                            -webkit-transition-duration: 0.4s; /* Safari */
                                            transition-duration: 0.4s;
                                            }
                                            .button:hover {
                                            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
                                            }
                                        &lt;/style&gt;
                                        &lt;button class="buttonPress-<?php echo $sinads->pubid; ?>" style="font-weight: {{ $sinads->button_font_weight }};font-size: <?php echo $sinads->button_font_size; ?>px;color: <?php echo $sinads->button_font_color; ?>;background-color: <?php echo $sinads->button_color; ?>;height: 40px;border-radius: 3px;padding: 0px 20px;border-color: transparent;" &gt;<?php echo $sinads->button_label; ?>&lt;/button&gt;
                                        &lt;script data-cfasync="false" async type="text/javascript" src="https://{DOMAIN.COM}/?<?php echo base64_encode('h='.$hashcod.'&user='.$sinads->pubid.'&sid='.$sinads->sid.'&type=c&tmp='.$detail1['tmp_type'].'&adcode=1'); ?>"&gt;&lt;/script&gt;
                                        &lt;/center&gt;
                                    </textarea>
                                </div>
                                <div class="phpLink" style="display: none">
                                    <input type="text" id="php_link_code" class="form-control"
                                        value="https://{DOMAIN.COM}/?<?php echo base64_encode('h='.$hashcod.'&user='.$sinads->pubid.'&sid='.$sinads->sid.'&type=c&adcode=1&tmp='.$detail1['tmp_type']).'&file=&lt;?php echo the_title();?&gt;'?>"
                                        name="" readonly>
                                </div>

                            </div>
                        </div>
                    @endif


                    <?php

                     if($sinads->platform == '1'){

                    ?>
                    @if ($superAdmin || in_array(config('permissions.ad_code_smart_link.view'), $permissions))
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <div class="box-title col-md-12" style="padding: 0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3 class="box-title">Step 2-4 (Smart Link)</h3>
                                        </div>
                                         <!-- Modal -->
                                         <div id="smartlink_setting" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Smartlink Setting</h4>
                                                </div>
                                                <div class="modal-body">
                                                <form method="post" id="formsmartLink" action="{{ route('ad_code_link.save') }}">
                                                     @csrf
                                                <div >
                                                    <input type="hidden" name="id" value="<?php echo $detail2['id']; ?>">
                                                    <input type="hidden" name="pubid" value="<?php echo $singnod->id; ?>">
                                                    <input type="hidden" name="sid" value="<?php echo $sid; ?>">
                                                    <input type="hidden" name="adid" value="<?php echo $sinads->id; ?>">
                                                    <input type="hidden" name="adlink" value="2">
                                                    <input type="hidden" name="linkCode" value="1">
                                                <div class="form-group row">
                                                    <label for="tmp_type" class="col-sm-4 col-form-label">Template Type</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="tmp_type" id="tmp_type">
                                                            
                                                            <option value="1" <?php echo ($detail2['tmp_type'] == 1)?'selected':''; ?> >MP4</option>

                                                            <option value="2" <?php echo ($detail2['tmp_type'] == 2)?'selected':''; ?> >MP3</option>

                                                            <option value="3" <?php echo ($detail2['tmp_type'] == 3)?'selected':''; ?> >PDF</option>

                                                            <option value="4" <?php echo ($detail2['tmp_type'] == 4)?'selected':''; ?> >ZIP</option>

                                                            <option value="5" <?php echo ($detail2['tmp_type'] == 5 || $detail2['tmp_type'] == '')?'selected':''; ?> >Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="tmp_type" class="col-sm-4 col-form-label">Link Type</label>
                                                    <div class="col-md-8">
                                                         <select class="form-control" name="linkType" id="linkSmartType">
                                                            <option value="0" <?php echo ($detail2['link_type'] == 0)?'selected':''; ?> >Copy Link</option>
                                                            <option value="1" <?php echo ($detail2['link_type'] == 1)?'selected':''; ?> >Download Link</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="tmp_type" class="col-sm-4 col-form-label">Captcha</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="isCaptcha" id="isCaptcha">
                                                            <option value="0" <?php echo ($detail2['isCaptcha'] == 0)?'selected':''; ?> >Disable</option>
                                                            <option value="1" <?php echo ($detail2['isCaptcha'] == 1)?'selected':''; ?> >Enable</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                    @if ($superAdmin || in_array(config('permissions.ad_code_smart_link.add'), $permissions))
                                                        <button type="submit" name="wpCodeSave" class="btn btn-primary btn-block wpCodeSave">
                                                            <i class="spinner"></i>Save
                                                        </button>
                                                    @endif
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a type="button" class="btn btn-danger  btn-block" data-dismiss="modal">Cancel</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </form>
                                                    
                                                </div>
                                                
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                                <button class="pull-right btn btn-xs btn-success" data-toggle="modal" data-target="#smartlink_setting"><i class="fa fa-cogs"></i>Settings</button>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <?php
                                $aduid = $sinads->id;
                                $admarket = 'installusd3';
                                $pid = $sinads->pubid;
                                $hashcod = md5($aduid . '-' . $admarket . '-' . $pid);
                                ?>
                                <input type="text" id="smartLink" class="form-control"
                                    value="https://{DOMAIN.COM}/?<?php echo base64_encode('h='.$hashcod.'&user='.$sinads->pubid.'&sid='.$sinads->sid.'&type=c&adcode=2&tmp='.$detail2['tmp_type']).'&file=&lt;?php echo the_title();?&gt;' ?>"
                                    name="" readonly>


                            </div>
                        </div>
                    @endif
                    <?php } ?>
                    @if ($superAdmin || in_array(config('permissions.ad_code_popup_link.view'), $permissions))
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <div class="box-title col-md-12" style="padding: 0">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h3 class="box-title">Step 3-4 (Popup Link)</h3>
                                        </div>

                                         <!-- Modal -->
                                         <div id="popup_setting" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Popup Setting</h4>
                                                </div>
                                                <div class="modal-body">
                                                <form method="post" id="formPopupLink" action="{{ route('ad_code_link.save') }}">
                                                     @csrf
                                                <div >
                                                <input type="hidden" name="id" value="<?php echo $detail3['id']; ?>">
                                                <input type="hidden" name="pubid" value="<?php echo $singnod->id; ?>">
                                                <input type="hidden" name="sid" value="<?php echo $sid; ?>">
                                                <input type="hidden" name="adid" value="<?php echo $sinads->id; ?>">
                                                <input type="hidden" name="adlink" value="3">
                                                <input type="hidden" name="linkCode" value="1">
                                                <input type="hidden" name="template_code" value="<?= htmlspecialchars($detail3['template_code']); ?>" id="template_code_pop">
                                                <div class="form-group row">
                                                    <label for="tmp_type" class="col-sm-4 col-form-label">Template Type</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="tmp_type" id="tmp_type">
                                                            
                                                            <option value="1" <?php echo ($detail3['tmp_type'] == 1)?'selected':''; ?> >MP4</option>

                                                            <option value="2" <?php echo ($detail3['tmp_type'] == 2)?'selected':''; ?> >MP3</option>

                                                            <option value="3" <?php echo ($detail3['tmp_type'] == 3)?'selected':''; ?> >PDF</option>

                                                            <option value="4" <?php echo ($detail3['tmp_type'] == 4)?'selected':''; ?> >ZIP</option>

                                                            <option value="5" <?php echo ($detail3['tmp_type'] == 5 || $detail3['tmp_type'] == '')?'selected':''; ?> >Others</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="tmp_type" class="col-sm-4 col-form-label">Link Type</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="linkType" id="linkPopupInlineType">
                                                            <option value="0" <?php echo ($detail3['link_type'] == 0)?'selected':''; ?> >Copy Link</option>
                                                            <option value="1" <?php echo ($detail3['link_type'] == 1)?'selected':''; ?> >Download Link</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                

                                                <div class="form-group row">
                                                    <label for="tmp_type" class="col-sm-4 col-form-label">Captcha</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="isCaptcha" id="isCaptcha">
                                                            <option value="0" <?php echo ($detail3['isCaptcha'] == 0)?'selected':''; ?> >Disable</option>
                                                            <option value="1" <?php echo ($detail3['isCaptcha'] == 1)?'selected':''; ?> >Enable</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                    @if ($superAdmin || in_array(config('permissions.ad_code_popup_link.add'), $permissions))
                                                        <button type="submit" name="wpCodeSave" class="btn btn-primary btn-block wpCodeSave">
                                                            <i class="spinner"></i>Save
                                                        </button>
                                                    @endif
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a type="button" class="btn btn-danger  btn-block" data-dismiss="modal">Cancel</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </form>
                                                    
                                                </div>
                                                
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                                <button class="pull-right btn btn-xs btn-success" data-toggle="modal" data-target="#popup_setting"><i class="fa fa-cogs"></i>Settings</button>
                                                <a href="javascript:void(0);" style="margin-right:10px;"  onclick="modal_open('template_code_pop','formPopupLink')" class="pull-right btn btn-xs btn-warning"><i class="fa fa-code">Code</i></a>                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="col-md-12" style="padding: 0; margin-bottom: 20px">
                                    <input type="text" id="popupLink" class="form-control"
                                        value="&lt;script data-cfasync=&quot;false&quot; async type=&quot;text/javascript&quot; src=&quot;https://{DOMAIN.COM}/?<?php echo base64_encode('h='.$hashcod.'&user='.$sinads->pubid.'&sid='.$sinads->sid.'&type=c&adcode=3&tmp='.$detail3['tmp_type']).'&file=&lt;?php echo the_title();?&gt;&quot;'?> &gt;&lt;/script&gt;"
                                        name="" readonly>
                                </div>
                                <div class="col-md-12" style="padding: 0;">
                                    <form method="post" action="{{ route('pop_adcode.save')}}">
                                    @csrf
                                        <div class="row popupLinkCapping">
                                            <div class="col-md-3">
                                                        <input type="hidden" name="pubid" value="<?php echo $singnod->id; ?>">
                                                        <input type="hidden" name="sid" value="<?php echo $sid; ?>">
                                                        <input type="hidden" name="adid" value="<?php echo $sinads->id; ?>">
                                                <div class="form-group">
                                                    <select class="selectpicker form-control country_pop" data-flag="true" data-live-search="true"  data-actions-box="true" name="pop_countries[1][]" style="height: auto;" data-actions-box="true" required>
                                                        <option value="">Select Country</option>
                                                        @foreach ($countries as $countries_data)
                                                            <option value="{{$countries_data->code}}" <?=
                                                         (($countries_data->code == $cappingPopLink[0]['country'])?"selected":"") ?>>{{$countries_data->name}}</option>
                                                        @endforeach
                                                     </select>
                                                </div>
                                            </div>
                                            <?php 
                                                   
                                                    $states = App\Models\States::where('country_code',$cappingPopLink[0]['country'])->get();
                                                    
                                                    ?>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <select class="selectpicker form-control states_pop_1" data-flag="true" data-live-search="true"  data-actions-box="true" name="pop_states[1][]" style="height: auto;" data-actions-box="true" multiple required>
                                                    
                                                        @foreach ($states as $states_data)
                                                      
                                                            <option value="{{$states_data->states_name}}" <?=
                                                            
                                                         (in_array($states_data->states_name,explode(",",$cappingPopLink[0]['states']))?"selected":"") ?>>{{$states_data->states_name}}</option>
                                                        @endforeach 
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <select class="selectpicker form-control " data-flag="true" data-live-search="true"  data-actions-box="true" name="pop_os[1][]" style="height: auto;" data-actions-box="true" required>
                                                        @foreach ($OSDevice as $device)
                                                            <option value="{{$device['code']}}" <?= (($device['code'] == $cappingPopLink[0]['os'])?"selected":"") ?>>{{$device['name']}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-2" style="float: right">
                                                <button type="button" name="" class="btn btn-primary btn-block addPopLink">
                                                    Add More
                                                </button>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Link 1" name="pop_link1[1][]" value="{{ $cappingPopLink[0]['link1'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Link 2" name="pop_link2[1][]" value="{{ $cappingPopLink[0]['link2'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Link 3" name="pop_link3[1][]" value="{{ $cappingPopLink[0]['link3'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Link 4" name="pop_link4[1][]" value="{{ $cappingPopLink[0]['link4'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Link 5" name="pop_link5[1][]" value="{{ $cappingPopLink[0]['link5'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 appendPopLink" style="padding: 0">
                                            <?php
                                                foreach($cappingPopLink as $win_key => $capp_poplink){

                                                    if($win_key != 0){

                                            ?>
                                                <div class="row popupLinkCapping popLink_{{$win_key+1}}">
                                                    <div class="col-md-3">
                                                                <input type="hidden" name="pubid" value="<?php echo $singnod->id; ?>">
                                                                <input type="hidden" name="sid" value="<?php echo $sid; ?>">
                                                                <input type="hidden" name="adid" value="<?php echo $sinads->id; ?>">
                                                        <div class="form-group">
                                                            <select class="selectpicker form-control country_pop" data-flag="true" data-live-search="true"  data-actions-box="true" name="pop_countries[<?= ($win_key+1) ?>][]" style="height: auto;" data-actions-box="true" required>
                                                                @foreach ($countries as $countries_data)
                                                                    <option value="{{$countries_data->code}}" <?=
                                                                (($countries_data->code == $cappingPopLink[$win_key]['country'])?"selected":"") ?>>{{$countries_data->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <?php
                                                            $statesPop = App\Models\States::where('country_code',$cappingPopLink[$win_key]['country'])->get();
                                                            ?>
                                                            <select class="selectpicker form-control " data-flag="true" data-live-search="true"  data-actions-box="true" name="pop_states[<?= ($win_key+1) ?>][]" style="height: auto;" data-actions-box="true" multiple required>
                                                            @foreach ($statesPop as $states_data)
                                                                    
                                                                    <option value="{{$states_data->states_name}}" <?=
                                                                (in_array($states_data->states_name,explode(",",$cappingPopLink[$win_key]['states']))?"selected":"") ?>>{{$states_data->states_name}}</option>
                                                                @endforeach 
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <select class="selectpicker form-control " data-flag="true" data-live-search="true"  data-actions-box="true" name="pop_os[<?= ($win_key+1) ?>][]" style="height: auto;" data-actions-box="true" required>
                                                                @foreach ($OSDevice as $device)
                                                                    <option value="{{$device['code']}}" <?= (($device['code'] == $cappingPopLink[$win_key]['os'])?"selected":"") ?>>{{$device['name']}}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-2" style="float: right">
                                                        <button type="button" name="" class="btn btn-danger btn-block removePopLink" onclick="remove('popLink_{{ $win_key+1 }}')">
                                                            Remove
                                                        </button>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Link 1" name="pop_link1[<?= ($win_key+1) ?>][]" value="{{ $cappingPopLink[$win_key]['link1'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Link 2" name="pop_link2[<?= ($win_key+1) ?>][]" value="{{ $cappingPopLink[$win_key]['link2'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Link 3" name="pop_link3[<?= ($win_key+1) ?>][]" value="{{ $cappingPopLink[$win_key]['link3'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Link 4" name="pop_link4[<?= ($win_key+1) ?>][]" value="{{ $cappingPopLink[$win_key]['link4'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Link 5" name="pop_link5[<?= ($win_key+1) ?>][]" value="{{ $cappingPopLink[$win_key]['link5'] }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } } ?>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-2" style="padding: 0">
                                                    <button type="submit" class="btn btn-success">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($superAdmin || in_array(config('permissions.ad_code_popup_inline.view'), $permissions))
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <div class="box-title col-md-12" style="padding: 0">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h3 class="box-title">Step 4-4 (Popup Inline)</h3>
                                        </div>
                                         <!-- Modal -->
                                        <div id="popup_inline_setting" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Popup inline Setting</h4>
                                                </div>
                                                <div class="modal-body">
                                                <form method="post" id="formPopupInline" action="{{ route('ad_code_link.save') }}" enctype="multipart/form-data">
                                            @csrf
                                           
                                                <div >
                                                
                                                <input type="hidden" name="template_code" value="<?= htmlspecialchars($detail4['template_code']); ?>" id="template_code">
                                                <div class="form-group row">
                                                <label for="banner_image_file" class="col-sm-4 col-form-label">Banner Image</label>
                                                    <div class="col-md-8">
                                                        <input type="file" name="banner_image" class="form-control" id="banner_image_file" accept="image/*" >
                                                        <?php
                                                    
                                                        if($detail4['banner_image'] != ''):?>
                                                        <a href="<?= $detail4['banner_image']; ?>" target="_blank" id="view_banner_img" style="font-size:12px">Click here to view image</a>
                                                        <?php endif;?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                <label for="banner_type" class="col-sm-4 col-form-label">Banner Type <br><small style="font-size: 12px;color: green;">Banner Text </small><input type="checkbox" value="<?= (($detail4['banner_text'] == 1)?"1":"0") ?>" <?= (($detail4['banner_text'] == 1)?"checked":"") ?> name="banner_text" id="banner_text"></label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="banner_type" id="banner_type">
                                                            <option value="0" <?php echo ($detail4['banner_type'] == 0)?'selected':''; ?> >Banner</option>
                                                            <option value="1" <?php echo ($detail4['banner_type'] == 1)?'selected':''; ?> >Sidebar</option>
                                                        </select>
                                                        <input type="hidden" name="id" value="<?php echo $detail4['id']; ?>">
                                                        <input type="hidden" name="pubid" value="<?php echo $singnod->id; ?>">
                                                        <input type="hidden" name="sid" value="<?php echo $sid; ?>">
                                                        <input type="hidden" name="adid" value="<?php echo $sinads->id; ?>">
                                                        <input type="hidden" name="adlink" value="4">
                                                        <input type="hidden" name="linkCode" value="1">
                                                        <input type="hidden" name="banner_width" id="banner_width" value="<?= $detail4['banner_width']; ?>">
                                                        <input type="hidden" name="banner_height" id="banner_height" value="<?= $detail4['banner_height']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="tmp_type" class="col-sm-4 col-form-label">Banner Size <br><small style="font-size: 12px;color: green;">Custom Size </small><input type="checkbox" value="<?= (($detail4['custom_banner'] == 1)?"1":"0") ?>" <?= (($detail4['custom_banner'] == 1)?"checked":"") ?> name="custom_banner" id="custom_banner"></label>
                                                    <div class="col-md-8">
                                                        <input type="number" id="customBannerwidth" value="<?= $detail4['banner_width']; ?>" class="form-control" style="display:<?= (($detail4['custom_banner'] == 1)?"inline-block":"none") ?>;width: 183px;" placeholder="Banner Width">
                                                        <input type="number" id="customBannerheight" value="<?= $detail4['banner_height']; ?>" class="form-control" style="display:<?= (($detail4['custom_banner'] == 1)?"inline-block":"none") ?>;width: 182px;" placeholder="Banner Height">
                                                        <select class="form-control" name="BannerSizes" id="BannerSizes" style="display:<?= (($detail4['custom_banner'] == 0)?"block":"none") ?>">
                                                            <?php 
                                                                foreach($banner_sizes as $banner_sizes_detail){
                                                            ?>       
                                                                    <option data-width="<?= $banner_sizes_detail['width']; ?>" data-height="<?= $banner_sizes_detail['height']; ?>" <?php echo ($detail4['banner_width'] == $banner_sizes_detail['width'] && $detail4['banner_height'] == $banner_sizes_detail['height'])?'selected':''; ?> ><?= $banner_sizes_detail['title'] ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="tmp_type" class="col-sm-4 col-form-label">Template Type</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="tmp_type" id="tmp_type">
                                                            
                                                            <option value="1" <?php echo ($detail4['tmp_type'] == 1)?'selected':''; ?> >MP4</option>

                                                            <option value="2" <?php echo ($detail4['tmp_type'] == 2)?'selected':''; ?> >MP3</option>

                                                            <option value="3" <?php echo ($detail4['tmp_type'] == 3)?'selected':''; ?> >PDF</option>

                                                            <option value="4" <?php echo ($detail4['tmp_type'] == 4)?'selected':''; ?> >ZIP</option>

                                                            <option value="5" <?php echo ($detail4['tmp_type'] == 5 || $detail4['tmp_type'] == '')?'selected':''; ?> >Others</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="tmp_type" class="col-sm-4 col-form-label">Link Type</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="linkType" id="linkPopupInlineType">
                                                            <option value="0" <?php echo ($detail4['link_type'] == 0)?'selected':''; ?> >Copy Link</option>
                                                            <option value="1" <?php echo ($detail4['link_type'] == 1)?'selected':''; ?> >Download Link</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="tmp_type" class="col-sm-4 col-form-label">Unique IP</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="isUnique" id="linkPopupInlineType">
                                                            <option value="0" <?php echo ($detail4['isUnique'] == 0)?'selected':''; ?> >No</option>
                                                            <option value="1" <?php echo ($detail4['isUnique'] == 1)?'selected':''; ?> >Yes</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="tmp_type" class="col-sm-4 col-form-label">Interval Time</label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="interval_time" value="<?php echo $detail4['interval_time']; ?>" class="form-control" placeholder="1000 = 1sec">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="tmp_type" class="col-sm-4 col-form-label">Captcha</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="isCaptcha" id="isCaptcha">
                                                            <option value="0" <?php echo ($detail4['isCaptcha'] == 0)?'selected':''; ?> >Disable</option>
                                                            <option value="1" <?php echo ($detail4['isCaptcha'] == 1)?'selected':''; ?> >Enable</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                    @if ($superAdmin || in_array(config('permissions.ad_code_popup_inline.add'), $permissions))
                                                        <button type="submit" name="wpCodeSave" class="btn btn-primary btn-block wpCodeSave">
                                                            <i class="spinner"></i>Save
                                                        </button>
                                                    @endif
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a type="button" class="btn btn-danger  btn-block" data-dismiss="modal">Cancel</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </form>
                                                    
                                                </div>
                                                
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            
                                            <button class="pull-right btn btn-xs btn-success" data-toggle="modal" data-target="#popup_inline_setting"><i class="fa fa-cogs"></i>Settings</button>
                                            <a href="javascript:void(0);" style="margin-right:10px;" onclick="modal_open('template_code','formPopupInline')" class="pull-right btn btn-xs btn-warning"><i class="fa fa-code">Code</i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="col-md-12" style="padding: 0; margin-bottom: 20px">
                                    <input type="text" id="popupInline" class="form-control" value="&lt;script data-cfasync=&quot;false&quot; id=&quot;popup_inline&quot; async type=&quot;text/javascript&quot; src=&quot;https://{DOMAIN.COM}/?<?php echo base64_encode('h='.$hashcod.'&user='.$sinads->pubid.'&sid='.$sinads->sid.'&type=c&tmp='.$detail4['tmp_type'].'&adcode=4')?>&quot;&gt;&lt;/script&gt;" name="" readonly>
                                </div>
                                <div class="col-md-12" style="padding: 0;">
                                    <form method="post" action="{{ route('popinline_adcode.save')}}">
                                    @csrf
                                        <div class="row popupInlineCapping">
                                            <div class="col-md-3">
                                                        <input type="hidden" name="pubid" value="<?php echo $singnod->id; ?>">
                                                        <input type="hidden" name="sid" value="<?php echo $sid; ?>">
                                                        <input type="hidden" name="adid" value="<?php echo $sinads->id; ?>">
                                                <div class="form-group">
                                                    <select class="selectpicker form-control country_pop" data-flag="true" data-live-search="true"  data-actions-box="true" name="popinline_countries[1][]" style="height: auto;" data-actions-box="true" required>
                                                        <option value="">Select Country</option>

                                                        @foreach ($countries as $countries_data)
                                                            <option value="{{$countries_data->code}}" <?=
                                                         (($countries_data->code == $cappingPopInline[0]['country'])?"selected":"") ?>>{{$countries_data->name}}</option>
                                                        @endforeach
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <?php
                                                $statesPopinline = App\Models\States::where('country_code',$cappingPopInline[0]['country'])->get();
                                                ?>
                                                    <select class="selectpicker form-control " data-flag="true" data-live-search="true"  data-actions-box="true" name="popinline_states[1][]" style="height: auto;" data-actions-box="true" multiple required>
                                                    @foreach ($statesPopinline as $states_data)
                                                      
                                                            <option value="{{$states_data->states_name}}" <?=
                                                            
                                                         (in_array($states_data->states_name,explode(",",$cappingPopInline[0]['states']))?"selected":"") ?>>{{$states_data->states_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <select class="selectpicker form-control " data-flag="true" data-live-search="true"  data-actions-box="true" name="popinline_os[1][]" style="height: auto;" data-actions-box="true" required>
                                                        @foreach ($OSDevice as $device)
                                                            <option value="{{$device['code']}}" <?= (($device['code'] == $cappingPopInline[0]['os'])?"selected":"") ?>>{{$device['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-2" style="float: right">
                                                <button type="button" name="" class="btn btn-primary btn-block addPopInline">
                                                    Add More
                                                </button>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Link 1" name="popinline_link1[1][]" value="{{ $cappingPopInline[0]['link1'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Link 2" name="popinline_link2[1][]" value="{{ $cappingPopInline[0]['link2'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Link 3" name="popinline_link3[1][]" value="{{ $cappingPopInline[0]['link3'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Link 4" name="popinline_link4[1][]" value="{{ $cappingPopInline[0]['link4'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Link 5" name="popinline_link5[1][]" value="{{ $cappingPopInline[0]['link5'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 appendPopInline" style="padding: 0">
                                            <?php
                                                foreach($cappingPopInline as $win_key => $capp_popinline){

                                                    if($win_key != 0){


                                            ?>
                                                <div class="row popupInlineCapping popInline_<?= ($win_key+1) ?>">
                                                    <div class="col-md-3">
                                                        <input type="hidden" name="pubid" value="<?php echo $singnod->id; ?>">
                                                        <input type="hidden" name="sid" value="<?php echo $sid; ?>">
                                                        <input type="hidden" name="adid" value="<?php echo $sinads->id; ?>">
                                                        <div class="form-group">
                                                            <select class="selectpicker form-control country_pop" data-flag="true" data-live-search="true"  data-actions-box="true" name="popinline_countries[<?= ($win_key+1) ?>][]" style="height: auto;" data-actions-box="true" required>
                                                                @foreach ($countries as $countries_data)
                                                                    <option value="{{$countries_data->code}}" <?=
                                                                (($countries_data->code == $cappingPopInline[$win_key]['country'])?"selected":"") ?>>{{$countries_data->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                        <?php
                                                            $statesPopinlineTwo = App\Models\States::where('country_code',$cappingPopInline[0]['country'])->get();
                                                            ?>
                                                            <select class="selectpicker form-control " data-flag="true" data-live-search="true"  data-actions-box="true" name="popinline_states[<?= ($win_key+1) ?>][]" style="height: auto;" data-actions-box="true" multiple required>
                                                            @foreach ($statesPopinlineTwo as $states_data)
                                                      
                                                                <option value="{{$states_data->states_name}}" <?=
                                                                    
                                                                (in_array($states_data->states_name,explode(",",$cappingPopInline[$win_key]['states']))?"selected":"") ?>>{{$states_data->states_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <select class="selectpicker form-control " data-flag="true" data-live-search="true"  data-actions-box="true" name="popinline_os[<?= ($win_key+1) ?>][]" style="height: auto;" data-actions-box="true" required>
                                                                @foreach ($OSDevice as $device)
                                                                    <option value="{{$device['code']}}" <?= (($device['code'] == $cappingPopInline[$win_key]['os'])?"selected":"") ?>>{{$device['name']}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-2" style="float: right">
                                                        <button type="button" name="" class="btn btn-danger btn-block removePopInline" onclick="remove('popInline_{{ $win_key+1 }}')">
                                                            Remove
                                                        </button>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Link 1" name="popinline_link1[<?= ($win_key+1) ?>][]" value="{{ $cappingPopInline[$win_key]['link1'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Link 2" name="popinline_link2[<?= ($win_key+1) ?>][]" value="{{ $cappingPopInline[$win_key]['link2'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Link 3" name="popinline_link3[<?= ($win_key+1) ?>][]" value="{{ $cappingPopInline[$win_key]['link3'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Link 4" name="popinline_link4[<?= ($win_key+1) ?>][]" value="{{ $cappingPopInline[$win_key]['link4'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Link 5" name="popinline_link5[<?= ($win_key+1) ?>][]" value="{{ $cappingPopInline[$win_key]['link5'] }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } } ?>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-2" style="padding: 0">
                                                    <button type="submit" class="btn btn-success">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    @endif
                    @if ($superAdmin || in_array(config('permissions.wordpress_button_code.view'), $permissions))
                        <div class="box box-primary">
                            <form method="post" id="adcodeForm" action="{{ route('publishers_adcode_detail.update') }}">
                                <input type="hidden" value="<?php echo $sinads->id; ?>" name="adid">
                                <input type="hidden" value="<?php echo $sinads->sid; ?>" name="siteid">
                                <input type="hidden" value="<?php echo $sinads->pubid; ?>" name="pid">
                                @csrf
                                <div class="box-header with-border">
                                    <h3 class="box-title">BASIC SETTINGS</h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Button Name</label>
                                                <input type="text" class="form-control" name="txtbtnName"
                                                    value="<?php echo $sinads->name; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Button Label</label>
                                                <input type="text" class="form-control" name="txtBtnlbl"
                                                    value="<?php echo $sinads->button_label; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Targeting Site </label>
                                                <select class="form-control" name="txtTargetSite">
                                                    <?php
                                                if ($myallsite) {
                                                    foreach ($myallsite as $key => $nod) {
                                                        ?>
                                                    <option value="<?php echo $nod->site_id; ?>" <?php echo $sinads->sid == $nod->site_id ? 'selected' : ''; ?>>
                                                        <?php echo $nod->url; ?></option>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group" style="margin-bottom: 25px;">
                                                <label>Font Weight</label><br>
                                                <label>
                                                    <input type="radio" name="radfontweight" value="bold"
                                                        {{ $sinads->button_font_weight == 'bold' ? 'checked' : '' }}>Bold
                                                </label>
                                                <label>
                                                    <input type="radio" name="radfontweight" value="normal"
                                                        {{ $sinads->button_font_weight == 'normal' ? 'checked' : '' }}>Normal
                                                </label>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Font Size (PX)</label>
                                                <input type="text" class="form-control" name="txtFontsize"
                                                    value="<?php echo $sinads->button_font_size; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Font Color</label>
                                                <div class="input-group my-colorpicker2">
                                                    <input type="text" class="form-control" name="txtbtnColor"
                                                        value="<?php echo $sinads->button_font_color; ?>">
                                                    <div class="input-group-addon">
                                                        <i style="background: <?php echo $sinads->button_font_color; ?>;"></i>
                                                    </div>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Background Color</label>
                                                <div class="input-group my-colorpicker2">
                                                    <input type="text" class="form-control" name="txtbgcolor"
                                                        value="<?php echo $sinads->button_color; ?>">
                                                    <div class="input-group-addon">
                                                        <i style="background: <?php echo $sinads->button_color; ?>;"></i>
                                                    </div>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>


                                    </div>


                                </div>
                                @if ($superAdmin || in_array(config('permissions.wordpress_button_code.edit'), $permissions))
                                    <div class="box-footer">
                                        <input type="submit" name="btnButton" value="Update"
                                            class="btn vd_btn vd_bg-green finish"> &nbsp;
                                        <input type="button" name="btnButton" value="Cancel"
                                            class="btn vd_btn vd_bg-yellow"
                                            onclick="window.location.href='{{ route('publishers_adcode.view', '$sinads->pubid') }}'">
                                        &nbsp;
                                    </div>
                                @endif
                            </form>

                            <div style="padding: 15px;">
                                <div id="instructions-section" style="">
                                    <h2 class="mb-10">Instructions</h2>

                                    <p class="mt-10"><strong>Note:</strong> Please ask your manager for ads domain and
                                        code
                                        placement on your site.</p>
                                </div>
                            </div>
                        </div>
                    @endif



                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->


    <!-- Modal -->
    <div id="code_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Code</h4>
        </div>
        <div class="modal-body">
            <label>Template</label>
            <textarea name="template_code_modal" id="template_code_modal" class="form-control" cols="70" rows="10"></textarea>
        </div>
        <div class="modal-footer">
            
        </div>
        </div>

    </div>
    </div>

    </div>
    <script src="https://unpkg.com/bootstrap-select@1.12.4/dist/js/bootstrap-select.min.js"></script>
    <script src="https://unpkg.com/bootstrap-select-country@4.0.0/dist/js/bootstrap-select-country.min.js"></script>
    <script type="text/javascript">

        function modal_open(template_code_id,form_id){
            $('#code_modal').modal('show');
            var template_code = $('#'+template_code_id).val();
            $('#template_code_modal').val(template_code);
            $('.modal-footer').html('<button class="btn btn-success" onclick="submit_form(\''+template_code_id+'\',\''+form_id+'\')">Save</button><button class="btn btn-default" data-dismiss="modal">Close</button>');
        }
        function submit_form(template_code_id,form_id){
            var template_code = $('#template_code_modal').val();
            $('#'+template_code_id).val(template_code);
            $('#code_modal').modal('hide');
            $('#'+form_id).submit();
        }
        // JavaScript Document
        (function($) {

            $('.countrypicker').countrypicker();


            $(document).ready(function(e) {
                const detail1LC = '<?php echo $detail1['link_code']; ?>';
                const detail1LT = '<?php echo $detail1['link_type']; ?>';
                const detail2LT = '<?php echo $detail2['link_type']; ?>';
                const detail3LT = '<?php echo $detail3['link_type']; ?>';
                const detail4LT = '<?php echo $detail4['link_type']; ?>';


                const cappingPopLinkArray = <?php echo json_encode($cappingPopLink); ?>;
                const cappingPopInlineArray = <?php echo json_encode($cappingPopInline); ?>;
                console.log({ cappingPopLinkArray });
                //-----------------------------------------------
                $(document).on('click', '.copy_any_text', function(e) {

                    var this_section_id = $(this).data('section-id');

                    var this_text = $.trim($(this_section_id).text());
                    $("#copy-paste-area").attr("data-clipboard-text", this_text).trigger('change');
                    var copy_data = new Clipboard('#copy-paste-area');
                    var ee = $.Event("click");
                    $("#copy-paste-area").trigger(ee);

                    swal({
                        position: 'top-right',
                        type: 'success',
                        title: 'Copied',
                        showConfirmButton: false,
                        timer: 800
                    });

                });
                $('.countrypicker').countrypicker();
                //--------------------------------------------------------

                $("#adcodeForm").submit(function(e) {

                    e.preventDefault();
                    var form = $(this);
                    var actionUrl = form.attr('action');

                    $.ajax({
                        type: "POST",
                        url: actionUrl,
                        data: form.serialize(),
                        success: function(data) {
                            window.location.reload();
                        }
                    });

                });

                function changeCodeType(value) {
                    if (value == 0) {
                        $('.htmlLink').show();
                        $('.phpLink').hide();
                    } else {
                        $('.htmlLink').hide();
                        $('.phpLink').show();
                    }
                }

                function changeLinkType(type, link) {
                    if (link == 1) {
                        if (type == 0) {
                            let code1 = $('#textarea-adcode').val();
                            code1 = code1.replace('type=d', 'type=c');
                            $('#textarea-adcode').val(code1);

                            let code2 = $('#php_link_code').val();
                            code2 = code2.replace('type=d', 'type=c');
                            $('#php_link_code').val(code2);
                        } else {
                            let code1 = $('#textarea-adcode').val();
                            code1 = code1.replace('type=c', 'type=d');
                            $('#textarea-adcode').val(code1);

                            let code2 = $('#php_link_code').val();
                            code2 = code2.replace('type=c', 'type=d');
                            $('#php_link_code').val(code2);
                        }
                    } else if (link == 2) {
                        if (type == 0) {
                            let code = $('#smartLink').val();
                            code = code.replace('type=d', 'type=c');
                            $('#smartLink').val(code);
                        } else {
                            let code = $('#smartLink').val();
                            code = code.replace('type=c', 'type=d');
                            $('#smartLink').val(code);
                        }
                    } else if (link == 3) {
                        if (type == 0) {
                            let code = $('#popupLink').val();
                            code = code.replace('type=d', 'type=c');
                            $('#popupLink').val(code);
                        } else {
                            let code = $('#popupLink').val();
                            code = code.replace('type=c', 'type=d');
                            $('#popupLink').val(code);
                        }
                    } else if (link == 4) {
                        if (type == 0) {
                            let code = $('#popupInline').val();
                            code = code.replace('type=d', 'type=c');
                            $('#popupInline').val(code);
                        } else {
                            let code = $('#popupInline').val();
                            code = code.replace('type=c', 'type=d');
                            $('#popupInline').val(code);
                        }
                    }
                }

                changeCodeType(detail1LC);
                changeLinkType(detail1LT, 1);
                changeLinkType(detail2LT, 2);
                changeLinkType(detail3LT, 3);
                changeLinkType(detail4LT, 4);

                $(document).on('change', '#linkCode', function(e) {
                    const value = this.value;
                    changeCodeType(value);
                });
                $(document).on('change', '#linkType', function(e) {
                    const type = this.value;
                    changeLinkType(type, 1);
                });

                $(document).on('change', '#linkSmartType', function(e) {
                    const type = this.value;
                    changeLinkType(type, 2);
                });

                $(document).on('change', '#linkPopupType', function(e) {
                    const type = this.value;
                    changeLinkType(type, 3);
                });

                $(document).on('change', '#linkPopupInlineType', function(e) {
                    const type = this.value;
                    changeLinkType(type, 4);
                });



                function ajaxCalling(form, actionUrl) {
                    
                    $.ajax({
                        type: "POST",
                        url: actionUrl,
                        data: form.serialize(),
                        success: function(data){
                            console.log({ data });
                            swal({
                                title: "Data Successfully Updated...",
                                type: "success",
                            }, function() {
                                location.reload();
                            });
                        },
                        error: function()
                        {
                            // $('button .spinner').removeClass(' fa fa-refresh fa-spin');
                            swal({
                                title: "Something went wrong",
                                type: "error",
                            });
                        }
                    });
                }

                function ajaxCallingFile(form, actionUrl) {
                    
                    $.ajax({
                        type: "POST",
                        url: actionUrl,
                        data: form,
                        cache:false,
                        contentType: false,
                        processData: false,
                        success: function(data){
                            console.log({ data });
                            swal({
                                title: "Data Successfully Updated...",
                                type: "success",
                            }, function() {
                                location.reload();
                            });
                        },
                        error: function()
                        {
                            // $('button .spinner').removeClass(' fa fa-refresh fa-spin');
                            swal({
                                title: "Something went wrong",
                                type: "error",
                            });
                        }
                    });
                }

                $("#formButtonCode").submit(function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var actionUrl = form.attr('action');
                    console.log('form', form.serialize());
                    // $('button .spinner').addClass(' fa fa-refresh fa-spin');
                    ajaxCalling(form, actionUrl);
                });

                $("#formsmartLink").submit(function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var actionUrl = form.attr('action');
                    console.log('form', form.serialize());
                    // $('button .spinner').addClass(' fa fa-refresh fa-spin');
                    ajaxCalling(form, actionUrl);
                });

                $("#formPopupLink").submit(function(e) {
                    e.preventDefault();
                    var form = $(this);
                   var actionUrl = form.attr('action');
                    console.log('form', form.serialize());
                    // $('button .spinner').addClass(' fa fa-refresh fa-spin');
                    ajaxCalling(form, actionUrl);
                });

                $("#formPopupInline").submit(function(e) {
                    e.preventDefault();
                    var form = new FormData(this);
                    var actionUrl = $(this).attr('action');
                   // console.log('form', form.serialize());
                    // $('button .spinner').addClass(' fa fa-refresh fa-spin');
                    //form.append("File", $("input[name=banner_image]").files[0]);
                    ajaxCallingFile(form, actionUrl);
                });


                function appendPopHtml(count) {
                    $('.appendPopLink').append(`<div class="row popupLinkCapping popLink_${count}">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <select class="selectpicker form-control getcountry_pop" data-flag="true" data-live-search="true"  data-actions-box="true" name="pop_countries[${count}][]" style="height: auto;" data-actions-box="true" required>
                                                        <option value="">Select Country</option>

                                                        @foreach ($countries as $countries_data)
                                                            <option value="{{$countries_data->code}}">{{$countries_data->name}}</option>
                                                        @endforeach
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <select class="selectpicker form-control " data-flag="true" data-live-search="true"  data-actions-box="true" name="pop_states[${count}][]" style="height: auto;" data-actions-box="true" multiple required>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <select class="selectpicker form-control " data-flag="true" data-live-search="true"  data-actions-box="true" name="pop_os[${count}][]" style="height: auto;" data-actions-box="true" required>
                                                        @foreach ($OSDevice as $device)
                                                            <option value="{{$device['code']}}" >{{$device['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-2" style="float: right">
                                                <button type="button" name="" class="btn btn-danger btn-block removePopLink" onclick="remove('popLink_${count}')">
                                                    Remove
                                                </button>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Link 1" name="pop_link1[${count}][]" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Link 2" name="pop_link2[${count}][]" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Link 3" name="pop_link3[${count}][]" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Link 4" name="pop_link4[${count}][]" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Link 5" name="pop_link5[${count}][]" value="">
                                                </div>
                                            </div>
                                        </div>`);
                                        $('.selectpicker').selectpicker('render');
                }

                $('.addPopLink').click(function(){
                    var count = $('.popupLinkCapping').length;
                    count = count + 1;
                    appendPopHtml(count);
                });



                function appendPopInlineHtml(count) {
                    $('.appendPopInline').append(`<div class="row popupInlineCapping popInline_${count}">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <select class="selectpicker form-control getcountry_pop" data-flag="true" data-live-search="true"  data-actions-box="true" name="popinline_countries[${count}][]" style="height: auto;" data-actions-box="true" required>
                                                        <option value="">Select Country</option>

                                                        @foreach ($countries as $countries_data)
                                                            <option value="{{$countries_data->code}}">{{$countries_data->name}}</option>
                                                        @endforeach
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <select class="selectpicker form-control " data-flag="true" data-live-search="true"  data-actions-box="true" name="popinline_states[${count}][]" style="height: auto;" data-actions-box="true" multiple required>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <select class="selectpicker form-control " data-flag="true" data-live-search="true"  data-actions-box="true" name="popinline_os[${count}][]" style="height: auto;" data-actions-box="true" required>
                                                        @foreach ($OSDevice as $device)
                                                            <option value="{{$device['code']}}" >{{$device['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-2" style="float: right">
                                                <button type="button" name="" class="btn btn-danger btn-block removePopInline" onclick="remove('popInline_${count}')">
                                                    Remove
                                                </button>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Link 1" name="popinline_link1[${count}][]" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Link 2" name="popinline_link2[${count}][]" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Link 3" name="popinline_link3[${count}][]" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Link 4" name="popinline_link4[${count}][]" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Link 5" name="popinline_link5[${count}][]" value="">
                                                </div>
                                            </div>
                                        </div>`);
                                        $('.selectpicker').selectpicker('render');
                }

                $('.addPopInline').click(function(){
                    var count = $('.popupInlineCapping').length;
                    console.log({ count });
                    count = count + 1;
                    appendPopInlineHtml(count);
                });

                $(".country_pop").change(function () {
                    const countryCode = this.value;
                    console.log({ countryCode });

                    const countryName = $(this).attr('name');
                    console.log({ countryName });

                    const statesName = countryName.replace('countries', 'states');
                    console.log({ statesName });

                    url = '{{ route('states.get', ':countryCode') }}';
                    url = url.replace(':countryCode', countryCode);
                    console.log('select[name="'+statesName+'"]');

                    // $('select[name="'+statesName+'"]').selectpicker('refresh');
                    $('select[name="'+statesName+'"]').find('option')
                        .remove()
                        .end()
                        .val('whatever');
                    $('select[name="'+statesName+'"]').selectpicker('refresh');


                    $.ajax({
                        type: "GET",
                        url: url,
                        success: function(data) {
                            console.log({ data });
                            data.forEach(state => {
                                $('select[name="'+statesName+'"]').append($('<option>', {
                                    value: state.states_code,
                                    text: state.states_name
                                }));
                            });
                            $('select[name="'+statesName+'"]').selectpicker('refresh');

                            // window.location.reload();
                        }
                    });
                });

                function fetchCappingPop(cappingPopLink, name)
                {
                    cappingPopLink.forEach((pop, key) => {
                        const countryCode = pop.country;
                        url = '{{ route('states.get', ':countryCode') }}';
                        url = url.replace(':countryCode', countryCode);

                        const statesName = `${name}${key+1}][]`;
                        $.ajax({
                            type: "GET",
                            url: url,
                            success: function(data) {
                                if( $($('select[name="'+statesName+'"]')).has('option').length == 0 ) {
                                    data.forEach(state => {
                                        if (pop.states === state.states_code) {
                                            $('select[name="'+statesName+'"]').append(`<option value="${state.states_code}" selected>${state.states_name}</option>`);
                                        } else {
                                            $('select[name="'+statesName+'"]').append($('<option>', {
                                                value: state.states_code,
                                                text: state.states_name
                                            }));
                                        }
                                    });
                                }
                                $('select[name="'+statesName+'"]').selectpicker('refresh');

                                // window.location.reload();
                            }
                        });
                    });
                }
                fetchCappingPop(cappingPopLinkArray, 'pop_states[');

                fetchCappingPop(cappingPopInlineArray, 'popinline_states[');



            });
        })(jQuery);

        function remove(id){
            $('.'+id).remove();
        }


        $(document).on('change',".getcountry_pop", function () {
            const countryCode = this.value;
            console.log({ countryCode });

            const countryName = $(this).attr('name');
            console.log({ countryName });

            const statesName = countryName.replace('countries', 'states');
            console.log({ statesName });

            url = '{{ route('states.get', ':countryCode') }}';
            url = url.replace(':countryCode', countryCode);
            console.log('select[name="'+statesName+'"]');

            // $('select[name="'+statesName+'"]').selectpicker('refresh');
            $('select[name="'+statesName+'"]').find('option')
                .remove()
                .end()
                .val('whatever');
            $('select[name="'+statesName+'"]').selectpicker('refresh');


            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    console.log({ data });
                    data.forEach(state => {
                        $('select[name="'+statesName+'"]').append($('<option>', {
                            value: state.states_code,
                            text: state.states_name
                        }));
                    });
                    $('select[name="'+statesName+'"]').selectpicker('refresh');

                    // window.location.reload();
                }
            });
        });
        $(document).ready(function(){
            $('#BannerSizes').on('change', function(){
                var selectedOption = $(this).find('option:selected');
                var width = selectedOption.data('width');
                var height = selectedOption.data('height');
                $('#banner_width').val(width);
                $('#banner_height').val(height);
            });

            $('#customBannerwidth').on('keyup', function(){
                $('#banner_width').val($(this).val());
            });
            $('#customBannerheight').on('keyup', function(){
                $('#banner_height').val($(this).val());
            });

            $('#custom_banner').change(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('value', 1);
                    $('#BannerSizes').hide();
                    $('#customBannerwidth').show();
                    $('#customBannerheight').show();
                    $('#customBannerwidth').css('display','inline-block');
                    $('#customBannerheight').css('display','inline-block');
                } else {
                    $(this).prop('value', 0);
                    $('#BannerSizes').show();
                    $('#customBannerwidth').hide();
                    $('#customBannerheight').hide();
                }
            });
            $('#banner_text').change(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('value', 1);
                } else {
                    $(this).prop('value', 0);
                }
            });
        })
    </script>
    <script type="text/javascript" src="{!! url('assets/admin/dist/js/clipboard.min.js') !!}"></script>
@endsection
@include('internal_layout.footer')
