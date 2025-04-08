<?php
session_start();
error_reporting(0);
include_once('includes/config.php');
include_once('includes/functions.php');
if (strlen($_SESSION['userlogin']) == 0) {
	header('location:login.php');
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
	<title>Settings - HRMS hr </title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/zarnakalogo.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="assets/css/line-awesome.min.css">

	<!-- Select2 CSS -->
	<link rel="stylesheet" href="assets/css/select2.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>
	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->
		<?php include_once("includes/header.php"); ?>
		<!-- /Header -->

		<!-- Sidebar -->
		<?php include_once("includes/setting_sidebar.php"); ?>
		<!-- /Sidebar -->

		<!-- Page Wrapper -->
		<div class="page-wrapper">

			<!-- Page Content -->
			<div class="content container-fluid">
				<div class="row">
					<div class="col-md-8 offset-md-2">

						<!-- Page Header -->
						<div class="page-header">
							<div class="row">
								<div class="col-sm-12">
									<h3 class="page-title">Company Settings</h3>
								</div>
							</div>
						</div>
						<!-- /Page Header -->
						<?php

						$sql = "SELECT * FROM assets";
						$query = $dbh->prepare($sql);
						$query->execute();
						$result = $query->fetch(PDO::FETCH_OBJ);

						?>
						<form  method="POST">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Company Name <span class="text-danger">*</span></label>
										<input name="Cname" class="form-control" type="text" value="<?php echo htmlentities($result->CompanyName); ?>">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Contact Person</label>
										<input name="Cperson" class="form-control " value="<?php echo htmlentities($result->contact); ?>" type="text">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Address</label>
										<input name="Caddress" class="form-control " value="<?php echo htmlentities($result->Address); ?>" type="text">
									</div>
								</div>
								<div class="col-sm-6 col-md-6 col-lg-3">
									<div class="form-group">
										<label>Country</label>
										<select name="Country" class="form-control select">
											<option><?php echo htmlentities($result->Country); ?></option>
											<option>United Kingdom</option>
											<option>Japan</option>
											<option>China</option>
										</select>
									</div>
								</div>
								<div class="col-sm-6 col-md-6 col-lg-3">
									<div class="form-group">
										<label>City</label>
										<input name="city" class="form-control" value="<?php echo htmlentities($result->City); ?>" type="text">
									</div>
								</div>
								<div class="col-sm-6 col-md-6 col-lg-3">
									<div class="form-group">
										<label>State/Province</label>
										<select name="state" class="form-control select">
											<option><?php echo htmlentities($result->State); ?></option>
											<option>Shan</option>
											<option>Kachin</option>
											<option>Kayah</option>
											<option>Yangon</option>
											<option>Bago</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label>Postal Code</label>
									<input class="form-control" value="91403" type="text">
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Email</label>
										<input name="email" class="form-control" value="<?php echo htmlentities($result->Email); ?>" type="email">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Phone Number</label>
										<input name="phone" class="form-control" value="<?php echo htmlentities($result->phone); ?>" type="text">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Mobile Number</label>
										<input name="phone" class="form-control" value="<?php echo htmlentities($result->phone); ?>" type="text">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Fax</label>
										<input name="fax" class="form-control" value="<?php echo htmlentities($result->Fax); ?>" type="text">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Website Url</label>
										<input name="website" class="form-control" value="<?php echo htmlentities($result->website); ?>" type="text">
									</div>
								</div>
							</div>
							<input type="hidden" name="settingid" value="<?php echo htmlentities($result->id); ?>">
					
					<div class="submit-section">
						<button name="settingsave" class="btn btn-primary submit-btn">Save</button>
					</div>
					</div>
					</form>

				</div>
			</div>
		</div>
		<!-- /Page Content -->

	</div>
	<!-- /Page Wrapper -->

	</div>
	<!-- /Main Wrapper -->


	<!-- jQuery -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Slimscroll JS -->
	<script src="assets/js/jquery.slimscroll.min.js"></script>

	<!-- Select2 JS -->
	<script src="assets/js/select2.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>

</body>

</html>
<div class="col-sm-6 col-md-6 col-lg-3">