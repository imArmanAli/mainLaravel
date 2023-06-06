<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>{{ $content_title }} | Admin</title>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{!! url('assets/admin/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="{!! url('assets/admin/dist/css/AdminLTE.min.css') !!}" rel="stylesheet" type="text/css" />
    <!-- custom css -->
    <link href="{!! url('assets/admin/dist/css/custom.css') !!}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="{!! url('assets/admin/dist/css/skins/_all-skins.min.css') !!}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{!! url('assets/admin/plugins/iCheck/flat/blue.css') !!}" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="{!! url('assets/admin/plugins/morris/morris.css') !!}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{!! url('assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="{!! url('assets/admin/plugins/datepicker/datepicker3.css') !!}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap time Picker -->
    <link href="{!! url('assets/admin/plugins/timepicker/bootstrap-timepicker.min.css') !!}" rel="stylesheet"/>
    <!-- Daterange picker -->
    <link href="{!! url('assets/admin/plugins/daterangepicker/daterangepicker-bs3.css') !!}" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{!! url('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="{!! url('assets/admin/plugins/datatables/dataTables.bootstrap.css') !!}" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{!! url('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        function showDay(){
            var max_fields  = 10;
            var wrapper     = $(".customDay"); 
            var x = document.getElementById("countiing").value; 
            if(x < max_fields){ 
                x++; 
                $(wrapper).append('<div class="col-md-4"> <div class="form-group"><label>Gallery Image '+ x +'</label><input type="file" name="gallImg[]" class="form-control" value="" /> </div></div>'); //add input box
                $("#countiing").val(x);
            }else{
                alert('You Reached the limits')
            }
        }
    </script>
    <!-- jQuery 2.1.4 -->
    <script src="{!! url('assets/admin/plugins/jQuery/jQuery-2.1.4.min.js') !!}"></script>


    <!-- multiple -->
     <link href="{!! url('assets/admin/dist/multiple/bootstrap-multiselect.css') !!}" rel="stylesheet" type="text/css" />
     <script src="{!! url('assets/admin/dist/multiple/bootstrap-multiselect.js') !!}" type="text/javascript"></script>
     <script type="text/javascript">
        //USER ONE
        $(function () {
            $('#txtNeCat').multiselect({
                includeSelectAllOption: true
            });
            
        });
        
    </script>
    
    <!--   Sweetalert popup -->
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
                                                                      
</head>
<body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
        <header class="main-header">
            <!-- Logo -->
            <a href="javascript:void(0)" class="logo">
                 <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>I-U</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Install USD</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{!! url('assets/admin/dist/img/blank.png') !!}" class="user-image" alt="User Image"/>
                                <span class="hidden-xs">
                                    <?php
                                    if ($this->session->userdata('AdminName')) {
                                        echo ucwords(strtolower($this->session->userdata('AdminName')));
                                    }
                                    ?>
                                </span>
                            </a>

                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{!! url('assets/admin/dist/img/blank.png') !!}" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php
                                        if ($this->session->userdata('AdminName')) {
                                            echo ucwords(strtolower($this->session->userdata('AdminName')));
                                            echo "<small>Member since ".$this->session->userdata('AdminRegDate')."</small>";
                                        }
                                        ?>
                                        
                                    </p>
                                </li>
                               
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                       
                    </ul>
                </div>
            </nav>
        </header>
