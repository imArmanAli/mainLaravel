<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	    <title>Log in</title>
	    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	    <!-- Bootstrap 3.3.4 -->
	    <link href="{!! url('assets/admin/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
	    <!-- Font Awesome Icons -->
	    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	    <!-- Theme style -->
	    <link href="{!! url('assets/admin/dist/css/AdminLTE.min.css" rel="stylesheet') !!}" type="text/css" />
	    <!-- iCheck -->
	    <link href="{!! url('assets/admin/plugins/iCheck/square/blue.css') !!}" rel="stylesheet" type="text/css" />
	    <link href="{!! url('assets/admin/dist/css/custom.css') !!}" rel="stylesheet" type="text/css" />

	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body class="login-page" id="loginPage">
		<div class="login-box">
		    
		    <div class="login-box-body">
		        <h3>Install USD</h3>
		        @if(isset ($errors) && count($errors) > 0)
                    <div class="alert alert-warning" role="alert">
                        <ul class="list-unstyled mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if($message = Session::get('success', false))
                        <p class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ $message  }}
                        </p>
                @endif
		        <form id="login-form" action="{{ route('adminlogin.perform') }}" method="post" >
                    @csrf
		          	<div class="form-group has-feedback">
		          		<input type="text" id="user_name" placeholder="UserName" name="username" class="form-control" required />
			            <span class="glyphicon glyphicon-user form-control-feedback"></span>
		          	</div>
		          	<div class="form-group has-feedback">
		          		<input type="password" placeholder="Password" id="user_password" name="password" class="form-control" required />
			            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		          	</div>
		          	<div class="row">
			            
			            <div class="col-xs-12">
			              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
			            </div><!-- /.col -->
			            
		          	</div>
		        </form>

		        
		     </div><!-- /.login-box-body -->
		</div><!-- /.login-box -->
		<!-- jQuery 2.1.4 -->
	    <script src="{!! url('assets/admin/plugins/jQuery/jQuery-2.1.4.min.js') !!}"></script>
	    <!-- Bootstrap 3.3.2 JS -->
	    <script src="{!! url('assets/admin/bootstrap/js/bootstrap.min.js') !!}" type="text/javascript"></script>
	    <!-- iCheck -->
	    <script src="{!! url('assets/admin/plugins/iCheck/icheck.min.js') !!}" type="text/javascript"></script>
	</body>
</html>