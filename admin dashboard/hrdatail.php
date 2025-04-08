<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (!isset($_SESSION['userlogin'])) {
	header('location:adminlogin.php');
	exit;
}
$did = $_GET['hrdatailid'];
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
	<title>Employee Profile </title>

	<!-- Fav if(strlen($_SESSION['userlogin'])==0){
		header('location:login.php');
		exit;
	}icon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/zarnakalogo.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="assets/css/line-awesome.min.css">

	<!-- Select2 CSS -->
	<link rel="stylesheet" href="assets/css/select2.min.css">

	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

	<!-- Tagsinput CSS -->
	<link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">

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
						</div>
					</div>
				</div>
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">HR Profile</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="hr.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Profile</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /;Page Header -->



				<?php
				$sql = "SELECT * from hr where Id=:did";
				$query = $dbh->prepare($sql);
				$query->bindParam(':did', $did, PDO::PARAM_STR);
				$query->execute();
				$result = $query->fetch(PDO::FETCH_OBJ);

				?>

				<div class="card mb-0">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<div class="profile-view">
									<div class="profile-img-wrap">
										<div class="profile-img">

											<a href="#" class="avatar"><img alt="picture" src="../HR dashboard/profiles/<?php echo htmlentities($result->Picture); ?>"></a>

										</div>
									</div>

									<div class="profile-basic">
										<div class="row">
											<div class="col-md-5">
												<div class="profile-info-left">
													<h3 class="user-name m-t-0 mb-0"><?php echo htmlentities($result->FirstName) . " " . htmlentities($result->LastName); ?></h3>
													<h6 class="text-muted"><?php echo htmlentities($result->Department); ?></h6>
													<small class="text-muted"><?php echo htmlentities($result->role); ?></small>
													<div class="staff-id"><?php echo htmlentities($result->HR_id); ?></div>
													<div class="small doj text-muted"><?php echo htmlentities($result->dateTime); ?></div>
													<div class="staff-msg"><a class="btn btn-custom" href="message.php">Send Message</a></div>
												</div>
											</div>
											<div class="col-md-7">
												<ul class="personal-info">
													<li>
														<div class="title">Phone:</div>
														<div class="text"><?php echo htmlentities(string: $result->Phone); ?></div>
													</li>
													<li>
														<div class="title">Email:</div>
														<div class="text"><?php echo htmlentities($result->Email); ?></div>
													</li>
													<li>
														<div class="title">Birthday:</div>
														<div class="text"><?php echo htmlentities($result->birthday); ?></div>
													</li>
													<li>
														<div class="title">Gender:</div>
														<div class="text"><?php echo htmlentities($result->gender); ?></div>
													</li>
													<li>
														<div class="title">Address:</div>
														<div class="text"><?php echo htmlentities($result->Address); ?></div>
													</li>


												</ul>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

					<div class="card tab-box">
						<div class="row user-tabs">
							<div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
								<ul class="nav nav-tabs nav-tabs-bottom">
									<li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a></li>
									
								</ul>
							</div>
						</div>
					</div>

					<div class="tab-content">

						<!-- Profile Info Tab -->
						<div id="emp_profile" class="pro-overview tab-pane fade show active">
							<div class="row">
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Personal Informations </h3>
											<ul class="personal-info">
												<li>
													<div class="title">Passport No.</div>
													<div class="text"><?php echo htmlentities($result->Passportno); ?></div>
												</li>

												<li>
													<div class="title">Tel</div>
													<div class="text"><a href=""><?php echo htmlentities($result->Phone); ?></a></div>
												</li>
												<li>
													<div class="title">Nationality</div>
													<div class="text"><?php echo htmlentities($result->Nationality); ?></div>
												</li>
												<li>
													<div class="title">Religion</div>
													<div class="text"><?php echo htmlentities($result->Religion); ?></div>
												</li>
												<li>
													<div class="title">Marital status</div>
													<div class="text"><?php echo htmlentities($result->Relation); ?></div>
												</li>

												<li>
													<div class="title">No. of children</div>
													<div class="text"><?php echo htmlentities($result->children); ?></div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Emergency Contact </h3>
											<h5 class="section-title">Primary</h5>
											<ul class="personal-info">
												<li>
													<div class="title">Name</div>
													<div class="text"><?php echo htmlentities($result->Fathern); ?></div>
												</li>
												<li>
													<div class="title">Relationship</div>
													<div class="text">Father</div>
												</li>
												<li>
													<div class="title">Phone </div>
													<div class="text"><?php echo htmlentities($result->fatherph); ?></div>
												</li>
											</ul>
											<hr>
											<h5 class="section-title">Secondary</h5>
											<ul class="personal-info">
												<li>
													<div class="title">Name</div>
													<div class="text"><?php echo htmlentities($result->brothern); ?></div>
												</li>
												<li>
													<div class="title">Relationship</div>
													<div class="text">Brother</div>
												</li>
												<li>
													<div class="title">Phone </div>
													<div class="text"><?php echo htmlentities($result->brotherph); ?></div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							



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

					<!-- Tagsinput JS -->
					<script src="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

					<!-- Custom JS -->
					<script src="assets/js/app.js"></script>

</body>

</html>