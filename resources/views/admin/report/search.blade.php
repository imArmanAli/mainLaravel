    <?php $pageTitle = "Search Report"; ?>
    

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><?php echo $pageTitle; ?></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url().'wp-network/dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><?php echo $pageTitle; ?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <div id="showresult"></div>
                            
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <?php 
                            if($this->session->flashdata('error')) : ?>
                                <p class="alert alert-success">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php 
                                    echo $this->session->flashdata('error'); 
                                    unset($_SESSION['error']);
                                    ?>
                                </p> <?php
                            endif;
                            ?>
                            
                            <?php include('search_form.php'); ?>

                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">Sr.No</th>
                                        <th>Publisher Id</th>
                                        <th>Windows</th>
                                        <th>Android</th>
                                        <th>Mac</th>
                                        <th>Others</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Traffic | Revenue</th>
                                    </tr>
                                </thead>
                                <tbody id="inrecordsearch">
                                    
                                        
                                    
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    