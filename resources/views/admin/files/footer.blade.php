
<footer class="main-footer">
    <strong>Copyright &copy; @php(date('Y')) <a href="javascript:void(0)">Install USD</a>.</strong> All rights reserved.
</footer>

</div><!-- ./wrapper -->

<!-- jQuery UI 1.11.2 -->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    //$.widget.bridge('uibutton', $.ui.button);
</script>
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
        $('.olddatepicker').datepicker({
            format: 'dd-mm-yyyy'
        });
        
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
        // DATE RANGE PICKER
        $('#reservation').daterangepicker(
            {
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                var startd = start.format('YYYY-MM-DD');
                var endd = end.format('YYYY-MM-DD');
                //var pubid = $("#txtPubdual").val();
                var pubid = $("#txtPubdual").children("option:selected").val();

                $("#txtstart").val(startd);
                $("#txtend").val(endd);
                if (pubid > 0) {
                    $.post("{!! url('wp-network/report/fetchdualreport') !!}",
                    {startd:startd, endd:endd, pubid:pubid }, function (re) {
                        //console.log(re);
                        $("#inrecordsearch").html(re);
                    });
                }else{
                    alert('kindly select publisher first.');
                }
                
            }
        );
    });
</script>

<!-- Bootstrap WYSIHTML5 -->
<script src="{!! url('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}" type="text/javascript"></script>
<!-- Slimscroll -->
<script src="{!! url('assets/admin/plugins/slimScroll/jquery.slimscroll.min.js') !!}" type="text/javascript"></script>
<!-- FastClick -->
<script src='{!! url('assets/admin/plugins/fastclick/fastclick.min.js') !!}'></script>
<!-- AdminLTE App -->
<script src="{!! url('assets/admin/dist/js/app.min.js') !!}" type="text/javascript"></script>      

<!-- ChartJS 1.0.1 -->
<script src="{!! url('assets/admin/plugins/chartjs/Chart.min.js') !!}" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="{!! url('assets/admin/dist/js/demo.js') !!}" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="{!! url('assets/admin/plugins/datatables/jquery.dataTables.min.js') !!}" type="text/javascript"></script>
<script src="{!! url('assets/admin/plugins/datatables/dataTables.bootstrap.min.js') !!}" type="text/javascript"></script>


<!-- page script -->
<script type="text/javascript">
    $(function () {

        
        $("#example1").dataTable();
        // custom table
        // end
        $('#example2').dataTable({
            // "bPaginate": true,
            // "bLengthChange": false,
            // "bFilter": false,
            // "bSort"	:true,
            // "bInfo": true,
            // "bAutoWidth": false,
            "order": [[ 0, "desc" ]]
            //  	"columns":[
            //     { "sortable": false },
            //     { "sortable": false },
            //     { "sortable": false },
            //     { "sortable": false },
            //     { "sortable": false },
            //     { "sortable": false },
            //     { "sortable": false },
            //     { "sortable": false },
            //     { "sortable": false },
            //     { "sortable": false },
            //     { "sortable": false }
            // ]
        });
        $('#example3').dataTable({
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
    });
</script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{!! url('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        //CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        //$(".textarea").wysihtml5();
        $('.textarea').wysihtml5({
            "image": false
        });
    });
</script>




@if (isset($pagescript) && $pagescript != '')
    <script src="{!! url('assets/admin/dist/js/module/') !!}{{$pagescript}}.js"></script>
@endif

@if (isset($activepage) && $activepage == 1)
        <script>
            $(function () {
            /* ChartJS
                * -------
                * Here we will create a few charts using ChartJS
                */

            

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
            var pieChart = new Chart(pieChartCanvas);
            var PieData = [
                {
                value: '',
                color: "#f56954",
                highlight: "#f56954",
                label: "My Assign Quotations"
                },
                {
                value: '',
                color: "#00a65a",
                highlight: "#00a65a",
                label: "In Progress Quotation"
                },
                {
                value: '',
                color: "#f39c12",
                highlight: "#f39c12",
                label: "Latest Quotation"
                }
            ];
            var pieOptions = {
                //Boolean - Whether we should show a stroke on each segment
                segmentShowStroke: true,
                //String - The colour of each segment stroke
                segmentStrokeColor: "#fff",
                //Number - The width of each segment stroke
                segmentStrokeWidth: 2,
                //Number - The percentage of the chart that we cut out of the middle
                percentageInnerCutout: 50, // This is 0 for Pie charts
                //Number - Amount of animation steps
                animationSteps: 100,
                //String - Animation easing effect
                animationEasing: "easeOutBounce",
                //Boolean - Whether we animate the rotation of the Doughnut
                animateRotate: true,
                //Boolean - Whether we animate scaling the Doughnut from the centre
                animateScale: false,
                //Boolean - whether to make the chart responsive to window resizing
                responsive: true,
                // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                maintainAspectRatio: false,
                //String - A legend template
                legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
            };
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            pieChart.Doughnut(PieData, pieOptions);

            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $("#barChart").get(0).getContext("2d");
            var barChart = new Chart(barChartCanvas);
            var barChartData = areaChartData;
            barChartData.datasets[1].fillColor = "#00a65a";
            barChartData.datasets[1].strokeColor = "#00a65a";
            barChartData.datasets[1].pointColor = "#00a65a";
            var barChartOptions = {
                //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                scaleBeginAtZero: true,
                //Boolean - Whether grid lines are shown across the chart
                scaleShowGridLines: true,
                //String - Colour of the grid lines
                scaleGridLineColor: "rgba(0,0,0,.05)",
                //Number - Width of the grid lines
                scaleGridLineWidth: 1,
                //Boolean - Whether to show horizontal lines (except X axis)
                scaleShowHorizontalLines: true,
                //Boolean - Whether to show vertical lines (except Y axis)
                scaleShowVerticalLines: true,
                //Boolean - If there is a stroke on each bar
                barShowStroke: true,
                //Number - Pixel width of the bar stroke
                barStrokeWidth: 2,
                //Number - Spacing between each of the X value sets
                barValueSpacing: 5,
                //Number - Spacing between data sets within X values
                barDatasetSpacing: 1,
                //String - A legend template
                legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
                //Boolean - whether to make the chart responsive
                responsive: true,
                maintainAspectRatio: false
            };

            barChartOptions.datasetFill = false;
            barChart.Bar(barChartData, barChartOptions);
            });
        </script>
@endif


    


</body>
</html>