    <?php $pageTitle = "Domain"; ?>
    
    <script type="text/javascript">
        function my_del_function(id){
            swal({
                title: "Are you sure?",
                text: "You want to delete!",
                type: "warning",
                confirmButtonClass: "sweet_ok",
                confirmButtonText: "Delete",
                cancelButtonClass: "sweet_cancel",
                cancelButtonText: "Cancel",
                showCancelButton: true,
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location = '<?php echo base_url('wp-network/domain/delnod/')?>'+id;
                } else {
                    // swal("Cancelled", "You canceled)", "error");
                }
            });
        }
    </script>

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
                    <div class="box box-danger">
                        <div class="box-header">
                            <a href="<?php echo base_url('wp-network/domain/add');?>" class="pull-right btn btn-success"><i class="fa fa-plus"></i> Add New Domain</a>
                            
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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        
                                        <th>Domain ID</th>
                                        <th>Title</th>
                                        <!-- <th>Redirect</th> -->
                                        <th>Version</th>
                                        <th>Host</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center" style="width: 130px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    if ($allactnod) {
                                        foreach ($allactnod as $nod) { 
                                            $hash = str_replace('{hash_code}', 951753852654, $nod->redirect_link_style);
                                            $firstlink = str_replace('{pubid}', 8, $hash);
                                            $secondlink = str_replace('{filename}', 'internet-download-manager', $firstlink);
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i; ?></td>
                                                
                                                <td><?php echo $nod->domain_web_id; ?></td>
                                                <td><a href="<?php echo "http://".ucwords(strtolower($nod->domain_name))."/".$secondlink; ?>" target="_blank"><?php echo ucwords(strtolower($nod->domain_name)); ?></a></td>
                                                <!-- <td><?php echo $nod->redirect_link_style; ?></td> -->
                                                <td><?php echo $nod->version; ?></td>
                                                <td><?php echo $nod->domain_host; ?></td>
                                                <td class="text-center"><?php echo ($nod->domain_status == 0)?'New':'Active'; ?></td>
                                                
                                                <td class="text-center menu-action">

                                                    <?php
                                                    if ($nod->domain_status == 0) {
                                                        ?>
                                                        <a href="<?php echo base_url('wp-network/domain/play/'.$nod->domain_id);?>" data-original-title="Play" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bg-green"> <i class="fa fa-play"></i> </a>
                                                        <?php
                                                    }else if($nod->domain_status == 1){
                                                        ?>
                                                        <a href="<?php echo base_url('wp-network/domain/pause/'.$nod->domain_id);?>" data-original-title="Pause" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bg-green"> <i class="fa fa-pause"></i> </a>
                                                        <?php
                                                    }
                                                    ?>                                                    

                                                    <a href="<?php echo base_url('wp-network/domain/ban/'.$nod->domain_id);?>" data-original-title="Ban" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bg-blue"> <i class="fa fa-ban"></i> </a>

                                                    <a href="<?php echo base_url().'wp-network/domain/modify/'.$nod->domain_id;?>" data-original-title="Edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bg-yellow"> <i class="fa fa-pencil"></i> </a>
                                                    <a href="javascript:void(0)" data-id="<?php echo $nod->domain_id; ?>" data-original-title="Delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bg-red" onclick="my_del_function(<?php echo $nod->domain_id; ?>)"> <i class="fa fa-times"></i> </a>
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
