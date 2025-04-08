<div class="header">
	<?php
	session_start();
	error_reporting(0);
	include('includes/config.php');
	if (!isset($_SESSION['userlogin'])) {
		header('location:login.php');
		exit;
	}
	$username = $_SESSION['userlogin'];
	?>
	<!-- Logo -->

	<div class="header-left">
		<a href="index.php" class="logo">
			<img src="assets/img/zarnakalogo.png" width="40" height="40" alt="">
		</a>
	</div>
	<!-- /Logo -->

	<a id="toggle_btn" href="javascript:void(0);">
		<span class="bar-icon">
			<span></span>
			<span></span>
			<span></span>
		</span>
	</a>

	<!-- Header Title -->
	<?php

	$sql = "SELECT * FROM assets";
	$query = $dbh->prepare($sql);
	$query->execute();
	$result = $query->fetch(PDO::FETCH_OBJ);

	?>
	<div class="page-title-box">
		<h3><?php echo htmlentities($result->CompanyName); ?></h3>
	</div>
	<!-- /Header Title -->

	<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

	<!-- Header Menu -->
	<ul class="nav user-menu">


		<!-- Message Notifications -->
		<li class="nav-item dropdown">
			<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
				<i class="fa fa-comment-o"></i> <span class="badge badge-pill"></span>
			</a>
			<div class="dropdown-menu notifications">
				<div class="topnav-dropdown-header">
					<span class="notification-title">Messages</span>
					<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
				</div>

				<div class="noti-content">
					<ul class="notification-list">
						<li class="notification-message">
							<a href="#">
								<?php

								$sql = "SELECT * FROM messages Where role='employee'";
								$query = $dbh->prepare($sql);

								$query->execute();
								$results = $query->fetchAll(PDO::FETCH_OBJ);
								$cnt = 1;
								if ($query->rowCount() > 0) {
									foreach ($results as $row) {


								?>
										<div class="list-item">
											<div class="list-left">
											</div>
											<div class="list-body">
												<span class="message-author"><?php echo htmlentities($row->UserName); ?></span>
												<span class="message-time"><?php echo htmlentities($row->time); ?></span>
												<div class="clearfix"></div>
												<span class="message-content"> <?php echo htmlentities($row->messagetext); ?>
												</span>
											</div>
									<?php $cnt += 1;
									}
								} ?>
										</div>
							</a>
						</li>
						<div class="topnav-dropdown-footer">
							<a href="message.php">View all Messages</a>
						</div>
				</div>
		</li>
		<!-- /Message Notifications -->


		<?php
		$sql = "SELECT * from clients where UserName=:username";
		$query = $dbh->prepare($sql);
		$query->bindParam(':username', $username, PDO::PARAM_STR);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);

		?>

		<li class="nav-item dropdown has-arrow main-drop">
			<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
				<span class="user-img"><img src="../HR dashboard/clients/<?php echo htmlentities($result->Picture); ?>" alt="User Picture">
					<span class="status online"></span></span>
				<span><?php echo htmlentities(ucfirst($_SESSION['userlogin'])); ?></span>
			</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="adminprofile.php">My Profile</a>
				<a class="dropdown-item" href="settings.php">Settings</a>
				<a class="dropdown-item" href="logout.php">Logout</a>
			</div>
		</li>
	</ul>
	<!-- /Header Menu -->

	<!-- Mobile Menu -->
	<div class="dropdown mobile-user-menu">
		<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
		<div class="dropdown-menu dropdown-menu-right">
			<a class="dropdown-item" href="profile.php">My Profile</a>
			<a class="dropdown-item" href="settings.php">Settings</a>
			<a class="dropdown-item" href="login.php">Logout</a>
		</div>
	</div>
	<!-- /Mobile Menu -->

</div>