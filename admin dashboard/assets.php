<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['userlogin']) == 0) {
	header('location:adminlogin.php');
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
	<title>Dashboard - HRMS admin </title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/zarnakalogo.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="assets/css/line-awesome.min.css">

	<!-- Chart CSS -->
	<link rel="stylesheet" href="assets/plugins/morris/morris.css">

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
		<?php include_once("includes/adminheader.php"); ?>
		<!-- /Header -->

		<!-- Sidebar -->
		<?php include_once("includes/adminsidebar.php"); ?>

		<!-- /Sidebar -->

		<!-- Page Wrapper -->
		<div class="page-wrapper">

			<!-- Page Content -->
			<div class="content container-fluid">

				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Welcome <?php echo htmlentities(ucfirst($_SESSION['userlogin'])); ?>!</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Dashboard</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				<div class="row">
				<?php
					$sql = "SELECT id from departments";
					$query = $dbh->prepare($sql);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);
					$totalcounte = $query->rowCount();
					?>
					<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
						<div class="card dash-widget">
							<div class="card-body">
								<span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
								<div class="dash-widget-info">
									<h3><?php echo $totalcounte; ?></h3>
									<span>Department </span>
								</div>
							</div>
						</div>
					</div>
					<?php
					$sql = "SELECT id from hr";
					$query = $dbh->prepare($sql);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);
					$totalcount = $query->rowCount();
					?>
					<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
						<div class="card dash-widget">
							<div class="card-body">
								<span class="dash-widget-icon"><i class="fa fa-users"></i></span>
								<div class="dash-widget-info">
									<h3><?php echo $totalcount; ?></h3>
									<span>HR</span>
								</div>
							</div>
						</div>
					</div>

					<?php
					$sql = "SELECT id from clients";
					$query = $dbh->prepare($sql);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);
					$totalcount = $query->rowCount();
					?>
					<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
						<div class="card dash-widget">
							<div class="card-body">
								<span class="dash-widget-icon"><i class="fa fa-user"></i></span>
								<div class="dash-widget-info">
									<h3><?php echo $totalcount; ?></h3>
									<span>Admin</span>
								</div>
							</div>
						</div>
					</div>

					<?php
					$sql = "SELECT id from employees";
					$query = $dbh->prepare($sql);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);
					$totalcounte = $query->rowCount();
					?>
					<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
						<div class="card dash-widget">
							<div class="card-body">
								<span class="dash-widget-icon"><i class="fa fa-user"></i></span>
								<div class="dash-widget-info">
									<h3><?php echo $totalcounte; ?></h3>
									<span>Employees</span>
								</div>
							</div>
						</div>
					</div>
				</div>


				<!-- ံHR Page Header -->
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">HR</h3>

						</div>

					</div>
				</div>
				<!-- /HRPage Header -->
				<!-- user profiles list starts her -->

				<div class="row staff-grid-row">
					<?php
					$sql = "SELECT * FROM hr";
					$query = $dbh->prepare($sql);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);
					$cnt = 1;
					if ($query->rowCount() > 0) {
						foreach ($results as $row) {
					?>
							<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
								<div class="profile-widget">
									<div class="profile-img">
										<a href="hrdatail.php?hrdatailid=<?php echo htmlentities($row->id); ?>" class="avatar"><img src="hr_pf/<?php echo htmlentities($row->Picture); ?>" alt="picture"></a>
									</div>

									<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="hrdatail.php?hrdatailid=<?php echo htmlentities($row->id); ?>"><?php echo htmlentities($row->FirstName) . " " . htmlentities($row->LastName); ?></a></h4>
									<div class="small text-muted"><?php echo htmlentities($row->role); ?></div>
								</div>
							</div>
					<?php $cnt += 1;
						}
					} ?>
				</div>
				<!-- Page Header -->
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">Employee</h3>

						</div>

					</div>
				</div>
				<!-- /Page Header -->
				<!-- user profiles list starts her -->

				<div class="row staff-grid-row">
					<?php
					$sql = "SELECT * FROM employees";
					$query = $dbh->prepare($sql);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);
					$cnt = 1;
					if ($query->rowCount() > 0) {
						foreach ($results as $row) {
					?>
							<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
								<div class="profile-widget">
									<div class="profile-img">
										<a href="employeedatail.php?empdatailid=<?php echo htmlentities($row->id); ?>" class="avatar"><img src="../HR dashboard/employees_pf/<?php echo htmlentities($row->Picture); ?>" alt="picture"></a>
									</div>

									<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="employeedatail.php?empdatailid=<?php echo htmlentities($row->id); ?>"><?php echo htmlentities($row->FirstName) . " " . htmlentities($row->LastName); ?></a></h4>
									<div class="small text-muted"><?php echo htmlentities($row->Designation); ?></div>
								</div>
							</div>
					<?php $cnt += 1;
						}
					} ?>
				</div>

			</div>
		</div>







	</div>


	</div>
	<!-- /Main Wrapper -->

	<!-- javascript links starts here -->
	<!-- jQuery -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Slimscroll JS -->
	<script src="assets/js/jquery.slimscroll.min.js"></script>

	<!-- Chart JS -->
	<script src="assets/plugins/morris/morris.min.js"></script>
	<script src="assets/plugins/raphael/raphael.min.js"></script>
	<script src="assets/js/chart.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>
	<!-- javascript links ends here  -->
</body>

</html>