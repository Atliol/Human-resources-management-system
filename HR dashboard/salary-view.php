﻿<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (!isset($_SESSION['userlogin'])) {
	header('location:login.php');
	exit;
}
$did = $_GET['salaryid'];
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
	<title>Salary - HRMS HR </title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/zarnakalogo.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="assets/css/line-awesome.min.css">

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
		<?php include_once("includes/sidebar.php"); ?>
		<!-- /Sidebar -->

		<!-- Page Wrapper -->
		<div class="page-wrapper">

			<!-- Page Content -->
			<div class="content container-fluid">

				<!-- Page Header -->
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">Payslip</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Payslip</li>
							</ul>
						</div>
						
					</div>
				</div>
				<!-- /Page Header -->
				<?php
				$sql = "SELECT * from employees where Id=:did";
				$query = $dbh->prepare($sql);
				$query->bindParam(':did', $did, PDO::PARAM_STR);
				$query->execute();
				$result = $query->fetch(PDO::FETCH_OBJ);

				?>

				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<h4 class="payslip-title">Payslip for the month of Feb 2025</h4>
								<div class="row">
									<?php

									$sql = "SELECT * FROM assets";
									$query = $dbh->prepare($sql);
									$query->execute();
									$results = $query->fetchAll(PDO::FETCH_OBJ);
									$cnt = 1;
									if ($query->rowCount() > 0) {
										foreach ($results as $row) {
									?>
											<div class="col-sm-6 m-b-20">
												<img src="assets/img/zarnakalogo.png" class="inv-logo" alt="">
												<ul class="list-unstyled mb-0">
													<li><?php echo htmlentities($row->CompanyName); ?></li>
													<li></li>
													<li><?php echo htmlentities($row->Address); ?></li>
												</ul>
											</div>
									<?php $cnt += 1;
										}
									} ?>

								</div>

								<div class="row">
									<div class="col-lg-12 m-b-20">
										<ul class="list-unstyled">
											<li>
												<h5 class="mb-0"><strong><?php echo htmlentities($result->FirstName) . " " . htmlentities($result->LastName); ?></strong></h5>
											</li>
											<li><span><?php echo htmlentities($result->Department); ?></span></li>
											<li>Employee ID: <?php echo htmlentities($result->Employee_Id); ?></li>
											<li>Joining Date: <?php echo htmlentities($result->Joining_Date); ?></li>
										</ul>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-6">
										<div>
											<h4 class="m-b-10"><strong>Earnings</strong></h4>
											<table class="table table-bordered">
												<tbody>
													<tr>
														<td><strong>Basic Salary</strong> <span class="float-right"><?php echo htmlentities($result->Salary); ?>KS</span></td>
													</tr>
													

													
													
												</tbody>
											</table>
										</div>
									</div>
									
									<div class="col-sm-12">
										<p><strong>Net Salary: <?php echo htmlentities($result->Salary); ?>KS</strong> (နောက်လမှာပိုမိုကြိုးစားကြပါ)</p>
									</div>
								</div>
							</div>
						</div>
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

	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>

</body>

</html>