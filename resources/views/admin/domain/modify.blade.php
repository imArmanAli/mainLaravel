    <?php $pageTitle = "Domain"; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><?php echo $pageTitle; ?> <small>(Modify)</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url().'wp-network/dashboard';?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url().'wp-network/domain';?>"> <?php echo $pageTitle; ?></a></li>
                <li class="active">Modify</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-danger">
                        <div class="box-body">
                            <form action="<?php echo base_url('wp-network/domain/modifynode'); ?>" method="POST" enctype="multipart/form-data" >
                                <input type="hidden" name="hidId" value="<?php echo $catmod->domain_id; ?>" />
                                <div class="row ">
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Domain Id<span class="red">*&nbsp;</span><span class="error err_title"></span></label>
                                            <input type="text" name="txtDomainId" id="txtDomainId" class="form-control removespecl"  value="<?php echo $catmod->domain_web_id;?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Domain Name<span class="red">*&nbsp;</span><span class="error err_title"></span></label>
                                            <input type="text" name="txtTitle" id="txtTitle" class="form-control removespecl"  value="<?php echo $catmod->domain_name;?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Version</label>
                                            <input type="text" name="txtVersion" id="txtVersion" class="form-control"  value="<?php echo $catmod->version; ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Redirect Style</label>
                                            <input type="text" name="txtredirect" id="txtredirect" class="form-control"  value="<?php echo $catmod->redirect_link_style; ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Host</label>
                                            <input type="text" name="txtHost" id="txtHost" class="form-control"  value="<?php echo $catmod->domain_host; ?>" />
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Status :</label><br>
                                            <input type="radio" name="radStatus" id="radStatus" value="1" <?php if($catmod->domain_status == 1){echo "checked";}?> checked="checked" required />
                                            <span class="txtDarkGray14">Active</span> &nbsp;
                                            <input type="radio" name="radStatus" id="radStatus" value="0" <?php if($catmod->domain_status == 0){echo "checked";}?> />
                                            <span class="txtDarkGray14">In Active</span>
                                        </div>
                                    </div> 
                                    
                                    
                                    <div class="col-md-12">
                                        <div class="box-footer"> 
                                            <input type="submit" name="btnButton" value="Update" class="btn vd_btn vd_bg-green finish" /> &nbsp;
                                            <input type="button" name="btnButton" value="Back" class="btn vd_btn vd_bg-yellow" onclick="window.location.href='<?php echo base_url('wp-network/domain');?>'" /> &nbsp;
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

