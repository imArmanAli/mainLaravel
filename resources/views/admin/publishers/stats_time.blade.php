  <?php
  if ($this->session->userdata('AdminId')) {
    $userid = $this->session->userdata('AdminId');
  }else{
    $userid = 0;
  }
$id = $this->uri->segment(4);
  ?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
    .daterangepicker_start_input,.daterangepicker_end_input{
        display:none;
    }
</style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Stats
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url().'wp-network/publisher';?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Stats</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
       
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            Tracking
                        </div><!-- /.box-header -->
                        <div class="box-body">

                            <div class="form-group">
                                <form method="post" id="submit_form" action="<?php echo base_url().'wp-network/publishers/stats-hourly/'.$id; ?>">
                                <input type="text" name="dates" class="form-control" value="<?= date('m/d/Y'); ?> - <?= date('m/d/Y'); ?>" />
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 40px;">Sr.No</th>
                                            <th>Publisher Id</th>
                                            <th>Windows</th>
                                            <th>Android</th>
                                            <th>Mac</th>
                                            <th>Others</th>
                                            <th>Total</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        if ($todaypublisher) {
                                            $time = ['00:00 - 01:00','01:00 - 02:00','02:00 - 03:00','03:00 - 04:00','04:00 - 05:00','05:00 - 06:00','06:00 - 07:00','07:00 - 08:00','08:00 - 09:00','09:00 - 10:00','10:00 - 11:00','11:00 - 12:00','12:00 - 13:00','13:00 - 14:00','14:00 - 15:00','15:00 - 16:00','16:00 - 17:00','17:00 - 18:00','18:00 - 19:00','19:00 - 20:00','20:00 - 21:00','21:00 - 22:00','22:00 - 23:00','23:00 - 24:00'];
                                            foreach ($todaypublisher as $key => $nod) {
                                                $dt = new datetime($nod->stat_date);
                                                foreach($time as $time_data){
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $this->Master_m->show_name_content($nod->pub_id, "id", "username", "tbl_register"); ?></td>
                                                    <td><?php echo $tot_window = $this->ReportModel->get_today_total_unique_time($dt->format('Y-m-d'), $nod->pub_id, "windows",$time_data); ?></td>
                                                    <td><?php echo $tot_android = $this->ReportModel->get_today_total_unique_time($dt->format('Y-m-d'), $nod->pub_id, "android",$time_data); ?></td>
                                                    <td><?php echo $tot_mac = $this->ReportModel->get_today_total_unique_time($dt->format('Y-m-d'), $nod->pub_id, "mac",$time_data); ?></td>
                                                    <td><?php echo $tot_other = $this->ReportModel->get_today_total_other_unique_time($dt->format('Y-m-d'), $nod->pub_id,$time_data); ?></td>
                                                    <td><?php echo $tot_window+$tot_android+$tot_mac+$tot_other; ?></td>
                                                    <td><?php echo $dt->format('d-M-Y'); ?></td>
                                                    <td><?php echo $time_data; ?></td>
                                                </tr>
                                                <?php
                                                $i++;
                                                }
                                            }
                                        }
                                        ?>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
           
        </section>
    </div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(document).ready(function(){
        //$('input[name="dates"]').daterangepicker();
        $('input[name="dates"]').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            "showCustomRangeLabel": false,
            "alwaysShowCalendars": true,
            "startDate": "<?= date('m/d/Y'); ?>",
            "endDate": "<?= date('m/d/Y'); ?>"
        }, function(start, end, label) {
            
        });
        
        $('.applyBtn ').click(function(){
            setTimeout(function() {$('#submit_form').submit();}, 1000);
            
        })
    })
</script>