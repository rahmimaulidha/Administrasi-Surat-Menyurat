<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title> Login SIAS | Sign in</title>
		<!-- Bootstrap -->
		<link href="assets/template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="assets/template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<!-- NProgress -->
		<link href="assets/template/vendors/nprogress/nprogress.css" rel="stylesheet">
		<!-- Animate.css -->
		<link href="assets./template/vendors/animate.css/animate.min.css" rel="stylesheet">

		<!-- Custom Theme Style -->
		<link href="assets/template/build/css/custom.min.css" rel="stylesheet">
	</head>

	<body class="login">
		<div>
			<a class="hiddenanchor" id="signup"></a>
			<a class="hiddenanchor" id="signin"></a> 
			
			<div class="login_wrapper">
			<?php
			if(isset($_GET['pesan'])){
				if($_GET['pesan'] == "gagal"){
					echo "<div style='margin-bottom:-55px' class='alert alert-danger' role='alert'><span class=' glyphicon glyphicon-warning-sign'></span> Login gagal! username dan password salah! </div>";
					 }
				}
			?>
				<div class="animate form login_form">
					
					
						<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-body">
						<p style="text-align: center; font-size: 18px"><strong>SISTEM INFORMASI ARSIP SURAT<br>(SIAS)</strong></p>

						<form action="act_login.php" method="post">
							
							<div>
								<input type="text" class="form-control" name="username"  required="" />
							</div><br>
							<div>
								<input type="password" class="form-control" name="password"  required="" />
							</div><br>
							<div class="pull-right" style="margin-right: -5px">
								
								<button class="btn btn-primary" type="submit" name="login">Login</button>
							</div>
							<div class="clearfix"></div>
							
							
						</form>
					
				</div>

			</div>
		</div>
	</body>
</html>
