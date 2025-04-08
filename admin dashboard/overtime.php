<?php
session_start();
error_reporting(0);
include_once('includes/config.php');
include_once('includes/functions.php');
if (strlen($_SESSION['userlogin']) == 0) {
	header('location:login.php');
} elseif (isset($_GET['deleteid'])) {
	$rid = intval($_GET['deleteid']);
	$sql = "DELETE FROM overtime WHERE id=:rid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':rid', $rid, PDO::PARAM_STR);
	$query->execute();
	echo "<script>alert('အချိန်ပိုအလုပ်အားဖျက်လိုက်ပါပြီ');</script>";
	header('location:overtime.php');
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
	<title>Overtime - HRMS Admin</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/zarnakalogo.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="assets/css/line-awesome.min.css">

	<!-- Datatable CSS -->
	<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

	<!-- Select2 CSS -->
	<link rel="stylesheet" href="assets/css/select2.min.css">

	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

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
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">Overtime</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Overtime</li>
							</ul>
						</div>
						
					</div>
				</div>
				<!-- /Page Header -->

				<!-- Overtime Statistics -->
				<div class="row">

					<?php
					$sql = "SELECT id from overtime";
					$query = $dbh->prepare($sql);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);
					$totalcounte = $query->rowCount();
					?>

					<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
						<div class="stats-info">
							<h6>Overtime Employee</h6>
							<h4><?php echo $totalcounte; ?><span>this month</span></h4>
						</div>
					</div>

					<?php
					$sql = "SELECT Hours FROM overtime";
					$query = $dbh->prepare($sql);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);

					$totalSeconds = 0;

					foreach ($results as $row) {
						// အချိန်ကို HH:MM:SS format အတိုင်းဖြတ်ပါ
						list($h, $m, $s) = explode(':', $row->Hours);
						$totalSeconds += $h * 3600 + $m * 60 + $s;
					}

					// စုစုပေါင်းကို HH:MM:SS အဖြစ်ပြောင်းပါ
					$hours = floor($totalSeconds / 3600);
					$remainingSeconds = $totalSeconds % 3600;
					$minutes = floor($remainingSeconds / 60);
					$seconds = $remainingSeconds % 60;

					$totalSum = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
					?>

					<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
						<div class="stats-info">
							<h6>Overtime Hours</h6>
							<h4><?php echo $totalSum; ?></h4>
						</div>
					</div>
					

					<?php
					$sql = "SELECT State from overtime WHERE State='padding'";
					$query = $dbh->prepare($sql);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);
					$totalcounte = $query->rowCount();
					?>

					<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
						<div class="stats-info">
							<h6>Pending Request</h6>
							<h4><?php echo $totalcounte; ?></h4>
						</div>
					</div>
					<?php
					$sql = "SELECT State from overtime WHERE State='rejected'";
					$query = $dbh->prepare($sql);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);
					$totalcounte = $query->rowCount();
					?>
					<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
						<div class="stats-info">
							<h6>Rejected</h6>
							<h4><?php echo $totalcounte; ?></h4>
						</div>
					</div>
				</div>
				<!-- /Overtime Statistics -->

				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table mb-0 datatable">
								<thead>
									<tr>
										<th>NO</th>
										<th>Employee Name</th>
										<th>OT Date</th>
										<th class="text-center">OT Hours</th>
										<th>OT Type</th>
										<th>Description</th>
									
										<th class="text-right">Status</th>
									</tr>
								</thead>
								<?php
								$sql = "SELECT * FROM overtime";
								$query = $dbh->prepare($sql);
								$query->execute();
								$results = $query->fetchAll(PDO::FETCH_OBJ);
								$cnt = 1;
								if ($query->rowCount() > 0) {
									foreach ($results as $row) {
								?>
										<tbody>
											<tr>
												<td><?php echo $cnt; ?></td>
												<td>
													<h2 class="table-avatar blue-link">

														<a href="#"><?php echo htmlentities($row->Employee); ?></a>
													</h2>
												</td>
												<td><?php echo htmlentities($row->OverTime_Date); ?></td>
												<td class="text-center"><?php echo htmlentities($row->Hours); ?></td>
												<td><?php echo htmlentities($row->Type); ?></td>
												<td><?php echo htmlentities($row->Description); ?></td>
												
												<td class="text-right">
													<div class="dropdown dropdown-action">
													<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
													<?php echo htmlentities($row->State); ?>
													</a>
													</div>
												</td>
												<!-- Edit Overtime Modal -->
												<?php include 'includes/modals/overtime/edit_overtime.php'; ?>
												<!-- /Edit Overtime Modal -->
											</tr>
										</tbody>
								<?php $cnt += 1;
									}
								} ?>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Content -->

			<!-- Add Overtime Modal -->
			<?php include_once("includes/modals/overtime/add_overtime.php"); ?>
			<!-- /Add Overtime Modal -->




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

	<!-- Datatable JS -->
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap4.min.js"></script>

	<!-- Datetimepicker JS -->
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>

</body>

</html>