    <?php $pageTitle = "Yesterday Report"; ?>
    

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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    if ($allnod) {

                                        foreach ($allnod as $key => $nod) {
                                            $dt = new datetime($nod->su_date);
                                            $total = 0;
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $this->Master_m->show_name_content($nod->pub_id, "id", "username", "tbl_register"); ?></td>
                                                <td><?php echo $tot_window = $this->ReportModel->get_yesterday_total($dt->format('Y-m-d'), $nod->pub_id, "tot_windows"); ?></td>
                                                <td><?php echo $tot_android = $this->ReportModel->get_yesterday_total($dt->format('Y-m-d'), $nod->pub_id, "tot_android"); ?></td>
                                                <td><?php echo $tot_mac = $this->ReportModel->get_yesterday_total($dt->format('Y-m-d'), $nod->pub_id, "tot_mac"); ?></td>
                                                <td><?php echo $tot_other = $this->ReportModel->get_yesterday_total($dt->format('Y-m-d'), $nod->pub_id, "tot_other"); ?></td>
                                                <td><?php echo $total = $tot_window+$tot_android+$tot_mac+$tot_other; ?></td>
                                                <td><?php echo $dt->format('d-M-Y'); ?></td>
                                                <td>
                                                    <input type="hidden" id="date_<?php echo $nod->pub_id; ?>" value="<?php echo $dt->format('Y-m-d'); ?>" name="">
                                                    <input id="click_<?php echo $nod->pub_id;?>" type="text" name="" class="form-control" style="width: 70px;" value="<?php echo $total; ?>" placeholder="Click" >
                                                    <input id="dollar_<?php echo $nod->pub_id;?>" type="text" name="" class="form-control" style="width: 70px;" placeholder="$" >
                                                    <input data-id="<?php echo $nod->pub_id;?>" type="button" class="btnssave btn btn-primary" value="Update" name="">
                                                </td>
                                            </tr>
                                            <?php
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

    <script type="text/javascript">
        $(function () {
            $('.btnssave').on("click", function(){
                var pid = $(this).attr("data-id");
                var click = $("#click_"+pid).val();
                var amt = $("#dollar_"+pid).val();
                var yesdate = $("#date_"+pid).val();

                $.post("<?php echo base_url("wp-network/postyesterday");?>",{pid:pid,click:click,amt:amt, yesdate:yesdate }, function (re) {
                    
                    if(re == 1){
                        $("#showresult").html('<div class="alert alert-success">Account Updated successfully!</div>');
                    }else if(re == 2){
                        $("#showresult").html('<div class="alert alert-danger">Some error occured.</div>');
                    }else{
                        $("#showresult").html('<div class="alert alert-danger">Some error occured.</div>');
                    }
                    //console.log(re);

                });
            });
        });
    </script>