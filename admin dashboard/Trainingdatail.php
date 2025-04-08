<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (!isset($_SESSION['userlogin'])) {
    header('location:adminlogin.php');
    exit;
}
$did = $_GET['trainingdatailid'];
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
                            <h3 class="page-title">Trainer Profile</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="employees.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /;Page Header -->



                <?php
                $sql = "SELECT * from training where Id=:did";
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

                                            <a href="#" class="avatar"><img alt="picture" src="../HR dashboard/employees/<?php echo htmlentities($result->Picture); ?>"></a>

                                        </div>
                                    </div>

                                    <div class="profile-basic">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="profile-info-left">
                                                    <h3 class="user-name m-t-0 mb-0"><?php echo htmlentities($result->Name); ?></h3>
                                                    <h6 class="text-muted"><?php echo htmlentities($result->Department); ?></h6>
                                                    <small class="text-muted"><?php echo htmlentities($result->Type); ?></small>
                                                    <div class="staff-id"><?php echo htmlentities($result->TrainerId); ?></div>
                                                    <div class="small doj text-muted"><?php echo htmlentities($result->date); ?></div>
                                                    <div class="staff-msg"><a class="btn btn-custom" href="chat.php">Send Message</a></div>
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
                                                        <div class="title">Company Name:</div>
                                                        <div class="text"><?php echo htmlentities($result->Company); ?></div>
                                                    </li>
                                                    
                                                    <li>
                                                        <div class="title">Address:</div>
                                                        <div class="text"><?php echo htmlentities($result->Address); ?></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Description:</div>
                                                        <div class="text"><?php echo htmlentities($result->Description); ?></div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                                <!-- /Profile Info Tab -->
                            </div>
                            <!-- /Page Wrapper -->
                            <!-- Page Header -->
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Employee</h3>
                                        
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
                                                    <th>Name</th>
                                                    <th>Employee ID</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    <th class="text-nowrap">Join Date</th>
                                                    <th>Role</th>

                                                </tr>
                                            </thead>
                                           
                                            <?php
                                            
                                            $sql = "SELECT * FROM employees";
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
                                                                    <a href="employeedatail.php?empdatailid=<?php echo htmlentities($row->id); ?>" class="avatar"><img alt="picture" src="../HR dashboard/employees/<?php echo htmlentities($row->Picture); ?>"></a>
                                                                    <a href="employeedatail.php?empdatailid=<?php echo htmlentities($row->id); ?>"><?php echo htmlentities($row->FirstName) . " " . htmlentities($row->LastName); ?><span><?php echo htmlentities($row->Designation); ?></span></a>
                                                                </h2>
                                                            </td>
                                                            <td><?php echo htmlentities($row->Employee_Id); ?></td>
                                                            <td><?php echo htmlentities($row->Email); ?></td>
                                                            <td><?php echo htmlentities($row->Phone); ?></td>
                                                            <td><?php echo htmlentities($row->Joining_Date); ?></td>
                                                            <td><?php echo htmlentities($row->Designation); ?></td>

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