<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">  
	    <title>Jotun Nam Viet Phat</title>
        <meta name="description" content="">
        <meta name="author" content="templatemo">
        <!-- 
        Visual Admin Template
        http://www.templatemo.com/preview/templatemo_455_visual_admin
        -->
	    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
	    <link href="backend/css/font-awesome.min.css" rel="stylesheet">
	    <link href="backend/css/bootstrap.min.css" rel="stylesheet">
	    <link href="backend/css/templatemo-style.css" rel="stylesheet">
		<link href="backend/css/custom.css" rel="stylesheet">
	    
	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body class="light-gray-bg">
		<div class="templatemo-content-widget templatemo-login-widget white-bg">
			<header class="text-center">
	          <div class="square"></div>
	          <h1>Jotun Nam Việt Phát</h1>
	        </header>
	<!-- /resources/views/post/create.blade.php -->
 
  
 <!-- Create Post Form -->
	        <form method="POST"class="templatemo-login-form" role="form" action="{{route('auth.login')}}" >
			@csrf
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>	        		
		              	<input type="text" class="form-control" name='email' placeholder="Tài khoản quản trị "> 
						  @if ($errors->has('email'))
								<span class="error-message"> *{{
									$errors->first('email')}}</span>
							@endif          
		          	</div>	
	        	</div>
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>	        		
		              	<input type="password" class="form-control" name="password" placeholder="******">
						  @if ($errors->has('password'))
								<span class="error-message">*{{
									$errors->first('password')}}</span>
						@endif                
		          	</div>	
	        	</div>	          	
	          	<div class="form-group">
				    <div class="checkbox squaredTwo">
				        <input type="checkbox" id="c1" name="cc" />
						<label for="c1"><span></span>Nhớ tài khoản</label>
				    </div>				    
				</div>
				<div class="form-group">
					<button type="submit" class="templatemo-blue-button width-100">Đăng nhập</button>
				</div>
	        </form>
		</div>
		<div class="templatemo-content-widget templatemo-login-widget templatemo-register-widget white-bg">
			<p>Bạn chưa có tài khoản ? <strong><a href="#" class="blue-text">Liên hệ để đăng ký`</a></strong></p>
		</div>
	</body>
</html>