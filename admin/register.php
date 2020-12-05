
<?php
session_start();
require 'Aconfig.php';

use Aclass\DB;
use Aclass\Register;


$db = new DB();

$register_obj = new Register($db->conn);
$login = $register_obj->Register($_POST['name'],$_POST['email'], $_POST['pass']);

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>پنل مدیریت | صفحه ثبت نام</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="plugins/iCheck/square/blue.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<!-- bootstrap rtl -->
	<link rel="stylesheet" href="dist/css/bootstrap-rtl.min.css">
	<!-- template rtl version -->
	<link rel="stylesheet" href="dist/css/custom-style.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
	<div class="register-logo">
		<b>ثبت نام در سایت</b>
	</div>

	<div class="card">
		<div class="card-body register-card-body">
			<p class="login-box-msg">ثبت نام کاربر جدید</p>

			<form action="register.php" method="post">
				<div class="input-group mb-3">
					<input type="text" name="name" class="form-control" placeholder="نام و نام خانوادگی">
					<div class="input-group-append">
						<span class="fa fa-user input-group-text"></span>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="email" name="email" class="form-control" placeholder="ایمیل">
					<div class="input-group-append">
						<span class="fa fa-envelope input-group-text"></span>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" name="pass" class="form-control" placeholder="رمز عبور">
					<div class="input-group-append">
						<span class="fa fa-lock input-group-text"></span>
					</div>
				</div>

				<!-- /.col -->
				<div class="col-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">ثبت نام</button>
				</div>
				<!-- /.col -->
		</div>
		</form>


		<a href="login.html" class="text-center">من قبلا ثبت نام کرده ام</a>
	</div>
	<!-- /.form-box -->
</div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
	$(function () {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass   : 'iradio_square-blue',
			increaseArea : '20%' // optional
		})
	})
</script>
</body>
</html>

