     <link rel="stylesheet" href="https://unpkg.com/bootstrap-select@1.12.4/dist/css/bootstrap-select.min.css" type="text/css" />
     <link rel="stylesheet" href="https://unpkg.com/bootstrap-select-country@4.0.0/dist/css/bootstrap-select-country.min.css" type="text/css" />        
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Publisher <small>(Ad Code)</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url().'wp-network/dashboard';?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url().'wp-network/publishers';?>"> Publisher</a></li>
                <li class="active">Ad Code</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <?php $this->load->view('admin/publishers/menu'); ?>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-header with-border" >
                            <h3 class="box-title">Step 1 (Copy Meta Code)</h3>
                        </div>
                        <div class="box-body">
                            <input type="hidden" id="copy-paste-area">

                            <div id="js-section" class="mb-30" style="">
                                <div class="alert alert-warning alert-dismissable" style="background-color:transparent!important;border: 1px solid #eee;">
                                    
                                    <i class="fa fa-exclamation-triangle" style="color: #F00;"></i> <strong style="color:red;">Hi! Users having large traffic are advised to ask their manager for dedicated ads domains.</strong>
                                </div>

                                <p class="text-muted">You must add this meta tag in your site head section for your site security.</p> 

                                <div id="header-js-code" class="form-control filled-input pt-10 mb-10 text-info" style="margin-bottom: 15px;">
                                    &lt;meta name="referrer" content="no-referrer" /&gt;                        
                                </div>
                                <button class="copy_any_text btn btn-success btn-lable-wrap left-label" data-section-id="#header-js-code"> <span class="btn-label"><i class="fa fa-copy"></i> </span><span class="btn-text">Copy Meta Code</span></button>
                            </div>
                        </div>
                    </div>

                    <div class="box box-primary">
                        <div class="box-header with-border" >
                            <h3 class="box-title">Button Preview</h3>
                        </div>
                        <div class="box-body">
                            <center><button style="font-weight: <?php echo $sinads->button_font_weight?>;font-size: <?php echo $sinads->button_font_size;?>px;color: <?php echo $sinads->button_font_color; ?>;background-color: <?php echo $sinads->button_color; ?>;padding:12px;border-radius: 3px;padding: 0px 20px;border-color: transparent;"><?php echo $sinads->button_label; ?></button></center>
                        </div>
                    </div>

                    <div class="box box-primary">
                        <div class="box-header with-border" >
                            <h3 class="box-title">Step 2-1 (<?php
                            if($sinads->platform == '1'){
                                echo 'Wordpress';
                            }
                            if($sinads->platform == '2'){
                                echo 'Blogspot';
                            }
                            if($sinads->platform == '3'){
                                echo 'Forum';
                            }
                            if($sinads->platform == '4'){
                                echo 'PHP';
                            }
                            ?> Button Code)</h3>
                        </div>
                        <div class="box-body">
                            <?php
                            $aduid = $sinads->id;
                            $admarket = "installusd6";
                            $pid = $sinads->pubid;
                            $hashcod = md5($aduid.'-'.$admarket.'-'.$pid);
                            ?>
                            <textarea id="textarea-adcode" style="border: 1px solid #CCCCCC;width: 100%;" readonly="readonly" rows="7" >&lt;center&gt;
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
        &lt;button class="buttonPress-<?php echo $sinads->pubid; ?>" style="font-weight: <?php echo $sinads->button_font_weight?>;font-size: <?php echo $sinads->button_font_size;?>px;color: <?php echo $sinads->button_font_color; ?>;background-color: <?php echo $sinads->button_color; ?>;height: 40px;border-radius: 3px;padding: 0px 20px;border-color: transparent;" &gt;<?php echo $sinads->button_label; ?>&lt;/button&gt;
        &lt;script data-cfasync="false" async type="text/javascript" src="https://{DOMAIN.COM}/?h=<?php echo $hashcod; ?>&amp;user=<?php echo $sinads->pubid; ?>&amp;adcode=1"&gt;&lt;/script&gt;
    &lt;/center&gt;
                            </textarea>
                            <?php
                            
                                $whereC = array(
                		           'button_id'      => '1',
                		           'button_hash'    => $hashcod,
                		           'pubid'          => $sinads->pubid,
                		           'type'           => 'link',
                		           );
                		        $resultC = $this->Master_m->select_single_records('tbl_country_restriction', $whereC);
                		        $uniqidC = uniqid();
                            ?>
                            <form method="POST" action="<?= base_url() ?>wp-network/publishers/adcode_country_restriction" id="">
                                <div class="row" style="margin-left:0px;">
                                    <label>Copy Link Template</label>
                                    <div class="col col-md-12">
                                        
                                          <div class="col col-md-4">      
                                            <select class="selectpicker countrypicker" id="<?= $uniqidC; ?>" name="copy_link_country[]" data-actions-box="true" data-flag="true" data-live-search="true"  multiple required></select>
                                        </div>
                                        <div class="col col-md-8">
                                            <input type="text" name="copy_link_template_window" class="form-control" placeholder="Window Copy Link Template" value="<?= (($resultC !='')?$resultC['win_link']:"")?>" required>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id[]" value="<?= (($resultC !='')?$resultC['id']:"")?>">
                                </div>
                                <?php 
                                    if($resultC != ''){
                                ?>
                                <script>
                                (function ($){
                                    $(document).ready(function(e) {
                                        $('.countrypicker').countrypicker();
                                        setTimeout(function() {
                                             $('#<?= $uniqidC; ?>').selectpicker('val', [<?php 
                                             $expldoe_country_c = explode(',',$resultC['country']);
                                             echo "'".implode("','",$expldoe_country_c),"'";
                                             ?>]);
                                        }, 1000);
                                        
                                    });
                                })(jQuery);
                                </script>
                                <?php } ?>
                                <?php
                            
                                $whereZ = array(
                		           'button_id'      => '1',
                		           'button_hash'    => $hashcod,
                		           'pubid'          => $sinads->pubid,
                		           'type'           => 'zip',
                		           );
                		        $resultZ = $this->Master_m->select_single_records('tbl_country_restriction', $whereZ);
                		        $uniqidZ = uniqid();
                            ?>
                                <div class="row" style="margin-left:0px;">
                                    <label>Zip Link Template</label>
                                    <div class="col col-md-12">
                                        
                                          <div class="col col-md-4">      
                                            <select class="selectpicker countrypicker" name="zip_link_country[]" id="<?= $uniqidZ ?>" data-actions-box="true" data-flag="true" data-live-search="true"  multiple required></select>
                                        </div>
                                        <div class="col col-md-8">
                                            <input type="text" name="zip_link_template_window" class="form-control" placeholder="Window Zip Link Template" value="<?= (($resultZ !='')?$resultZ['win_link']:"")?>" required>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id[]" value="<?= (($resultZ !='')?$resultZ['id']:"")?>">
                                </div>
                                <div class="row" style="margin-left:0px;margin-top:15px;">
                                    <input type="hidden" name="button_id" value="1">
                                    <input type="hidden" name="button_hashcode" value="<?php echo $hashcod; ?>">
                                    <input type="hidden" name="pubid" value="<?php echo $sinads->pubid; ?>">
                                    <button class="btn btn-success">Save</button>
                                </div>
                                 <?php 
                                    if($resultZ != ''){
                                ?>
                                <script>
                                (function ($){
                                    $(document).ready(function(e) {
                                        $('.countrypicker').countrypicker();
                                        setTimeout(function() {
                                             $('#<?= $uniqidZ; ?>').selectpicker('val', [<?php 
                                             $expldoe_country_Z = explode(',',$resultZ['country']);
                                             echo "'".implode("','",$expldoe_country_Z),"'";
                                             ?>]);
                                        }, 1000);
                                        
                                    });
                                })(jQuery);
                                </script>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                    <?php
                    
                     if($sinads->platform == '1'){
                            
                    ?>   
                    <div class="box box-primary">
                        <div class="box-header with-border" >
                            <h3 class="box-title">Step 2-4 (Smart Link)</h3>
                        </div>
                        <div class="box-body">
                            <?php
                            $aduid = $sinads->id;
                            $admarket = "installusd3";
                            $pid = $sinads->pubid;
                            $hashcod = md5($aduid.'-'.$admarket.'-'.$pid);
                            ?>
                            <input type="text" class="form-control" value="https://{DOMAIN.COM}/smartlink/?h=<?php echo $hashcod; ?>&amp;user=<?php echo $sinads->pubid; ?>&amp;adcode=2&amp;file=&lt;?php echo the_title();?&gt;" name="">
                        </div>
                    </div>
                    <?php } ?>
                    <div class="box box-primary">
                        <div class="box-header with-border" >
                            <h3 class="box-title">Step 3-4 (Popup Link)</h3>
                        </div>
                        <div class="box-body">
                           
                            <input type="text" class="form-control" value="&lt;?php echo file_get_contents(&#39;https://{DOMAIN.COM}/popup&#39;);?&gt;" name="">
                        </div>
                    </div>
                    
                    <div class="box box-primary">
                        <div class="box-header with-border" >
                            <h3 class="box-title">Step 4-4 (Popup Inline)</h3>
                        </div>
                        <div class="box-body">
                           
                            <input type="text" class="form-control" value="&lt;script data-cfasync=&quot;false&quot; async type=&quot;text/javascript&quot; src=&quot;https://{DOMAIN.COM}/popup_inline?h=<?php echo $hashcod; ?>&amp;user=<?php echo $sinads->pubid; ?>&amp;adcode=4&quot;&gt;&lt;/script&gt;" name="">
                        </div>
                    </div>
                    <div class="box box-primary">
                        <form method="post" action="<?php echo base_url('wp-network/publishers/nodmodify'); ?>">
                            <input type="hidden" value="<?php echo $sinads->id;?>" name="adid">
                            <input type="hidden" value="<?php echo $sinads->sid; ?>" name="siteid">
                            <input type="hidden" value="<?php echo $sinads->pubid; ?>" name="pid">

                            <div class="box-header with-border" >
                                <h3 class="box-title">BASIC SETTINGS</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Button Name</label>
                                            <input type="text" class="form-control" name="txtbtnName" value="<?php echo $sinads->name; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Button Label</label>
                                            <input type="text" class="form-control" name="txtBtnlbl" value="<?php echo $sinads->button_label; ?>" >
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
                                                        <option value="<?php echo $nod->site_id; ?>" <?php echo ($sinads->sid == $nod->site_id)?'selected':''; ?> ><?php echo $nod->url; ?></option>
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
                                                <input type="radio" name="radfontweight" value="bold" <?php echo ($sinads->button_font_weight == "bold")?'checked':''; ?> >Bold
                                            </label>
                                            <label>
                                                <input type="radio" name="radfontweight" value="normal" <?php echo ($sinads->button_font_weight == "normal")?'checked':''; ?> >Normal
                                            </label>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Font Size (PX)</label>
                                            <input type="text" class="form-control" name="txtFontsize" value="<?php echo $sinads->button_font_size; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Font Color</label>
                                            <div class="input-group my-colorpicker2">
                                                <input type="text" class="form-control" name="txtbtnColor" value="<?php echo $sinads->button_font_color; ?>"  >
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
                                                <input type="text" class="form-control" name="txtbgcolor" value="<?php echo $sinads->button_color; ?>"  >
                                                <div class="input-group-addon">
                                                    <i style="background: <?php echo $sinads->button_color; ?>;"></i>
                                                </div>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                
                                
                            </div>
                            <div class="box-footer"> 
                                <input type="submit" name="btnButton" value="Update" class="btn vd_btn vd_bg-green finish"> &nbsp;
                                <input type="button" name="btnButton" value="Cancel" class="btn vd_btn vd_bg-yellow" onclick="window.location.href='<?php echo base_url('wp-network/publishers/adcode/'.$sinads->pubid); ?>'"> &nbsp;
                            </div>
                        </form>

                        <div style="padding: 15px;">
                            <div id="instructions-section" style="">
                                <h2 class="mb-10">Instructions</h2>
                                
                                <p class="mt-10"><strong>Note:</strong> Please ask your manager for ads domain and code placement on your site.</p>
                            </div>
                        </div>
                    </div>




                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->



    </div>
    <script src="https://unpkg.com/bootstrap-select@1.12.4/dist/js/bootstrap-select.min.js"></script>
    <script src="https://unpkg.com/bootstrap-select-country@4.0.0/dist/js/bootstrap-select-country.min.js"></script>
    <script type="text/javascript">
        
        // JavaScript Document
        (function ($){
            $(document).ready(function(e) {
                //-----------------------------------------------
                $(document).on('click', '.copy_any_text', function (e){
                        
                        var this_section_id = $(this).data('section-id');

                        var this_text = $.trim($(this_section_id).text());
                        $("#copy-paste-area").attr("data-clipboard-text",this_text).trigger('change');
                        var copy_data = new Clipboard('#copy-paste-area');
                        var ee = $.Event("click");
                        $("#copy-paste-area").trigger(ee);
                            
                        swal({position: 'top-right',type: 'success',title: 'Copied',showConfirmButton: false,timer: 800});
                        
                });
                $('.countrypicker').countrypicker();
            //--------------------------------------------------------
            
                $("form").submit(function(e) {

                    e.preventDefault(); 
                    var form = $(this);
                    var actionUrl = form.attr('action');
            
                    $.ajax({
                        type: "POST",
                        url: actionUrl,
                        data: form.serialize(), 
                        success: function(data){
                          window.location.reload();
                        }
                    });
                    
                });
            });
        })(jQuery);

    </script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin/dist/js/clipboard.min.js');?>"></script>