<?php
session_start();
error_reporting(0);
include_once("includes/config.php");
if ($_SESSION['userlogin'] > 0) {
	header('location:index.php');
} elseif (isset($_POST['login'])) {
	$_SESSION['userlogin'] = $_POST['username'];
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	$sql = "SELECT UserName,Password from clients where UserName=:username";
	$query = $dbh->prepare($sql);
	$query->bindParam(':username', $username, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	if ($query->rowCount() > 0) {
		foreach ($results as $row) {
			$hashpass = $row->Password;
		} //verifying Password
		if (password_verify($password, $hashpass)) {
			$_SESSION['userlogin'] = $_POST['username'];
			echo "<script>window.location.href= 'index.php'; </script>";
		} else {
			$wrongpassword = '
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>ပြန်စစ်ဆေးပါ!😕</strong> Alert <b class="alert-link"></b>Adminဧ။် passwordမှာ မှားယွင်းနေပါသည်..
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>';
		}
	}
	//if username or email not found in database
	else {
		$wrongusername = '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>ပြန်စစ်ဆေးပါ!🙃</strong> Alert <b class="alert-link"></b>Adminဧ။် usernameမှာ မှားယွင်းနေပါသည်..
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Login - HRMS Admin</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/zarnakalogo.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body class="account-page">

	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<div class="account-content">
			<div class="container">
				<!-- Account Logo -->
				<div style=" margin-left: 130px;" >
					<a href="index.php"><img style="width: 200px; height: 200px; " src="assets/img/hrlogo.png" alt="Company Logo"></a>
					</div>
				<!-- /Account Logo -->

				<div class="account-box">
					<div class="account-wrapper">
						<h3 class="account-title">Admin Login</h3>
						<!-- Account Form -->
						<form method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label>User Name</label>
								<input class="form-control" name="username" placeholder="Enter your UserName" required type="text">
							</div>
							<?php if ($wrongusername) {
								echo $wrongusername;
							} ?>
							<div class="form-group">
								<div class="row">
									<div class="col">
										<label>Password</label>
									</div>
								</div>
								<input class="form-control" name="password" placeholder="Enter Your Password" required type="password">
							</div>
							<?php if ($wrongpassword) {
								echo $wrongpassword;
							} ?>

							<div class="form-group text-center">
								<button class="btn btn-primary account-btn" name="login" type="submit">Login</button>
								<div class="col-auto pt-2">

								</div>
								<div style="margin-top:10px; margin-left: 290px;" class="dropdown action-label">
							<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="../admin dashboard/adminlogin.php" data-toggle="dropdown" aria-expanded="false">
							<i class="fa fa-dot-circle-o text-success"></i> Admin Login</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="../Employee dashboard/login.php"><i class="fa fa-dot-circle-o text-danger"></i>Employee Login</a>
								<a class="dropdown-item" href="../HR dashboard/login.php"><i class="fa fa-dot-circle-o text-danger"></i> HR Login</a>
							</div>
						</div>
							</div>
							
							<div class="account-footer">
						<p>အဆင်ပြေရဲ့လား? ပျော်စရာနေ့လေးဖြစ်ပါစေဗျာ... </p>
					</div>
					</form>
					<!-- /Account Form -->
					
					
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>
	

</body>

</html>