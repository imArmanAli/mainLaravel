@yield('content')
    <footer class="main-footer">
        <strong>Copyright &copy; {{ date('Y') }} <a href="javascript:void(0)">Install-USD</a>.</strong> All rights reserved.
    </footer>

    </div><!-- ./wrapper -->

    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>

    <!-- Bootstrap 3.3.2 JS -->
    <script src="{!! url('assets/admin/bootstrap/js/bootstrap.min.js') !!}" type="text/javascript"></script>  
    

    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

    <!-- Sparkline -->
    <script src="{!! url('assets/admin/plugins/sparkline/jquery.sparkline.min.js') !!}" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="{!! url('assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}" type="text/javascript"></script>
    <script src="{!! url('assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="{!! url('assets/admin/plugins/knob/jquery.knob.js') !!}" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <!-- bootstrap time picker -->
    <script src="{!! url('assets/admin/plugins/timepicker/bootstrap-timepicker.min.js') !!}" type="text/javascript"></script>
    <script src="{!! url('assets/admin/plugins/daterangepicker/daterangepicker.js') !!}" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="{!! url('assets/admin/plugins/datepicker/bootstrap-datepicker.js') !!}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $('.datepicker').datepicker({
                startDate: new Date(),
                format: 'mm-dd-yyyy'
            });
            // format
            $('.newdatepicker').datepicker({
                startDate: new Date(),
                format: 'dd-mm-yyyy'
            });
            $('.dbdatepicker').datepicker({
                startDate: new Date(),
                format: 'yyyy-mm-dd'
            });
            //Timepicker
            $(".timepicker").timepicker({
                showInputs: false
            });
            // TIME PICKER
            $('#reservation').daterangepicker(
                {
                    startDate: moment().subtract(29, 'days'),
                    endDate  : moment(),
                    format: 'YYYY-MM-DD'
                },
                function (start, end) {
                    var startd = start.format('YYYY-MM-DD');
                    var endd = end.format('YYYY-MM-DD');
                    var pubid = $("#txtPubid").val();

                    $("#txtstart").val(startd);
                    $("#txtend").val(endd);

                }
            );
        });
    </script>

    <!-- Bootstrap WYSIHTML5 -->
    <script src="{!! url('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="{!! url('assets/admin/plugins/slimScroll/jquery.slimscroll.min.js') !!}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{!! url('assets/admin/plugins/fastclick/fastclick.min.js') !!}"></script>
    <!-- AdminLTE App -->
    <script src="{!! url('assets/admin/dist/js/app.min.js') !!}" type="text/javascript"></script>    
    
    <!-- ChartJS 1.0.1 -->
    <script src="{!! url('assets/admin/plugins/chartjs/Chart.min.js') !!}" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{!! url('assets/admin/dist/js/demo.js') !!}" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="{!! url('assets/admin/plugins/datatables/jquery.dataTables.min.js') !!}" type="text/javascript"></script>
    <script src="{!! url('assets/admin/plugins/datatables/dataTables.bootstrap.min.js') !!}" type="text/javascript"></script>
    <!-- bootstrap color picker -->
    <script src="{!! url('assets/admin/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') !!}"></script>

    <!-- page script -->
    <script type="text/javascript">
        $(function () {
            $("#example1").dataTable();
            $("#example2").dataTable({
                "order": [[ 0, "desc" ]]
            });
            $("#example3").dataTable({
                "order": [[ 5, "DESC" ]],
                "columns":[
                    { "sortable": false },
                    { "sortable": false },
                    { "sortable": false },
                    { "sortable": false },
                    { "sortable": false },
                    { "sortable": true },
                    { "sortable": false }
                ]
            });

            //Colorpicker
            $(".my-colorpicker1").colorpicker()
            //color picker with addon
            $(".my-colorpicker2").colorpicker()
        });
    </script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{!! url('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $(".textarea").wysihtml5({
                "image": false
            });
        });
    </script>
    
</body>
</html>