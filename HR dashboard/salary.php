<?php
session_start();
error_reporting(0);
include('includes/config.php');
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
	<title>Salary - HRMS hr </title>

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
							<h3 class="page-title">Employee Salary</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Salary</li>
							</ul>
						</div>

					</div>
				</div>
				<!-- /Page Header -->

				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table datatable">
								<thead>
									<tr>
										<th>Employee</th>
										<th>Employee ID</th>
										<th>Email</th>
										<th>Join Date</th>
										<th>Role</th>
										<th>Salary</th>
										<th>Payslip</th>

									</tr>
								</thead>
								<?php
								$sql = "SELECT * FROM employees ORDER BY Salary DESC ";
								$query = $dbh->prepare($sql);
								$query->execute();
								$results = $query->fetchAll(PDO::FETCH_OBJ);
								$cnt = 1;
								if ($query->rowCount() > 0) {
									foreach ($results as $row) {
								?>
										<tbody>
											<tr>
												<td>
													<h2 class="table-avatar">
														<a href="employeedatail.php?empdatailid=<?php echo htmlentities($row->id); ?>" class="avatar"><img src="employees/<?php echo htmlentities($row->Picture); ?>" alt="picture"></a>
														<a href="employeedatail.php?empdatailid=<?php echo htmlentities($row->id); ?>"><?php echo htmlentities($row->FirstName) . " " . htmlentities($row->LastName); ?> <span><?php echo htmlentities($row->Department); ?></span></a>
													</h2>
												</td>
												<td><?php echo htmlentities($row->Employee_Id); ?></td>
												<td><?php echo htmlentities($row->Email); ?></td>
												<td><?php echo htmlentities($row->Joining_Date); ?></td>
												<td>
													<div class="dropdown">
														<a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo htmlentities($row->Designation); ?> </a>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="#"><?php echo htmlentities($row->Designation); ?></a>

														</div>
													</div>
												</td>
												<td><?php echo htmlentities($row->Salary); ?></td>
												<td><a class="btn btn-sm btn-primary" href="salary-view.php?salaryid=<?php echo htmlentities($row->id); ?>">Generate Slip</a></td>

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

			<!-- Add Salary Modal -->
			<?php include_once("includes/modals/salary/add.php"); ?>
			<!-- /Add Salary Modal -->

			<!-- Edit Salary Modal -->
			<?php include_once("includes/modals/salary/edit.php"); ?>
			<!-- /Edit Salary Modal -->

			<!-- Delete Salary Modal -->
			<?php include_once("includes/modals/salary/delete.php"); ?>
			<!-- /Delete Salary Modal -->

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

	<!-- Datetimepicker JS -->
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Datatable JS -->
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap4.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>

</body>

</html>