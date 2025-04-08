<?php
session_start();
error_reporting(0);
include_once('includes/config.php');
include_once("includes/functions.php");
if (strlen($_SESSION['userlogin']) == 0) {
	header('location:login.php');
} elseif (isset($_GET['deleteid'])) {
	$rid = intval($_GET['deleteid']);
	$sql = "DELETE FROM holidays WHERE id=:rid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':rid', $rid, PDO::PARAM_STR);
	$query->execute();
	echo "<script>alert('Holiday deleted Successfully');</script>";
	header('location:holidays.php');
}
$username = $_SESSION['userlogin'];

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
	<title>Request Vacation</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/zarnakalogo.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="assets/css/line-awesome.min.css">

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
		<?php include_once("includes/employeeheader.php"); ?>
		<!-- /Header -->

		<!-- Sidebar -->
		<?php include_once("includes/employeesidebar.php"); ?>
		<!-- /Sidebar -->

		<!-- Page Wrapper -->
		<div class="page-wrapper">

			<!-- Page Content -->
			<div class="content container-fluid">

				<!-- Page Header -->
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title"> Office holiday </h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Vacation</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_holiday"><i class="fa fa-plus"></i> Add Vacation</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				<!-- /HR and admin vaction -->
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table mb-0">
								<thead>
									<tr>
										<th>No</th>
										<th>Name</th>
										<th>Department</th>
										<th>Title </th>
										<th>Holiday Date</th>
										<th>End Date</th>
										<th class="text-right">Day</th>


									</tr>
								</thead>

								<?php
								$sql = "SELECT * FROM holidays WHERE Department='Admin' OR  Department='HR'";
								$query = $dbh->prepare($sql);
								$query->execute();
								$results = $query->fetchAll(PDO::FETCH_OBJ);
								$cnt = 1;
								if ($query->rowCount() > 0) {
									foreach ($results as $row) {
								?>
										<tbody>
											<tr class="holiday-upcoming">
												<td><?php echo $cnt; ?></td>
												<td><?php echo htmlentities($row->UserName); ?></td>
												<td><?php echo htmlentities($row->Department); ?></td>
												<td><?php echo htmlentities($row->Holiday_Name); ?></td>
												<td><?php echo htmlentities($row->Holiday_Date); ?></td>
												<td><?php echo htmlentities($row->EndDate); ?></td>
												<td class="text-right">
													<?php echo htmlentities($row->Day); ?></td>

						</div>
						</td>
						</tr>
						</tbody>
				<?php $cnt += 1;
									}
								} ?>
				</table>
					</div>
				</div>
			</div>

			<!-- /HR and admin vaction end-->

			<!-- Page Header -->
			<div style="margin-top: 60px;" class="page-header">
				<div class="row align-items-center">
					<div class="col">
						<h3 class="page-title">Employee Request Vacation </h3>

					</div>

				</div>
			</div>
			<!-- /Page Header -->


			<!-- /employee vaction start-->
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-striped custom-table mb-0">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Department</th>
									<th>Title </th>
									<th>Holiday Date</th>
									<th>End Date</th>
									<th>Day</th>
									
									<th class="text-right">Status</th>
								</tr>
							</thead>
							<?php
							$sql = "SELECT * FROM holidays WHERE UserName=:username";
							$query = $dbh->prepare($sql);
							$query->bindParam(':username', $username, PDO::PARAM_STR);
							$query->execute();
							$results = $query->fetchAll(PDO::FETCH_OBJ);
							$cnt = 1;
							if ($query->rowCount() > 0) {
								foreach ($results as $row) {
							?>

									<tbody>
										<tr class="holiday-upcoming">
											<td><?php echo $cnt; ?></td>
											<td><?php echo htmlentities($row->UserName); ?></td>
											<td><?php echo htmlentities($row->Holiday_Name); ?></td>
											<td><?php echo htmlentities($row->Department); ?></td>
											<td><?php echo htmlentities($row->Holiday_Date); ?></td>
											<td><?php echo htmlentities($row->EndDate); ?></td>
											<td><?php echo htmlentities($row->Day); ?></td>
											
											
											<td class="text-right">
												<div class="dropdown dropdown-action">
												<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
														 <?php echo htmlentities($row->State); ?>
													</a>
												</div>
											</td>
											<!-- Edit Holiday Modal -->
											<?php include 'includes/modals/holidays/edit_holiday.php'; ?>
												<!-- /Edit Holiday Modal -->
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
		<!-- /employee vaction end-->
	</div>

	<!-- /Page Content -->

	<!-- Add Holiday Modal -->
	<?php include_once("includes/modals/holidays/add_holiday.php"); ?>
	<!-- /Add Holiday Modal -->




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

	<!-- Datetimepicker JS -->
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>

</body>

</html>