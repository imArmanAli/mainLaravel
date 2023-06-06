    <?php $pageTitle = "Expired Domain"; ?>
    
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
                            
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <?php 
                            if($this->session->flashdata('error')) : ?>
                                <p class="alert alert-success">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php echo $this->session->flashdata('error'); ?>
                                </p> <?php
                            endif;
                            ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Domain ID</th>
                                        <th>Title</th>
                                        <th>Redirect</th>
                                        <th>Version</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    if ($allexpnod) {
                                        foreach ($allexpnod as $nod) { 
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i; ?></td>
                                                <td><?php echo $nod->domain_web_id; ?></td>
                                                <td><?php echo ucwords(strtolower($nod->domain_name)); ?></td>
                                                <td><?php echo $nod->redirect_link_style; ?></td>
                                                <td><?php echo $nod->version; ?></td>
                                                <td class="text-center"><?php echo ($nod->domain_status == -1)?'Expired':'In-Active'; ?></td>
                                                <td class="text-center menu-action">
                                                    <a href="<?php echo base_url().'wp-network/expired-domain/modify/'.$nod->domain_id;?>" data-original-title="Edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bg-yellow"> <i class="fa fa-pencil"></i> </a>
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
