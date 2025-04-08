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
    <title>Messenger Style Chat</title>


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
        <?php include_once("includes/header.php"); ?>
        <!-- /Header -->

        <!-- Sidebar -->
        <?php include_once("includes/sidebar.php"); ?>
        <!-- /Sidebar -->
        <!-- Page Wrapper -->
        <div class="page-wrapper">


            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div style=" background-color: #007BFF; color:white; padding: 10px;" class="modal-header">
                        <h3 style="margin-left: 150px;" class="modal-title">Group Chat Box</h3>

                    </div>
                    <div style="margin-left: 20px; margin-top: 10px;">


                        <tbody>
                            <tr>
                                <td>
                                    <h5 class="table-avatar">
                                        <a href="#" class="avatar"><img alt="picture" src="profiles/<?php echo htmlentities($result->Picture); ?>"></a>
                                        <?php echo htmlentities($result->UserName); ?><a style="margin-left: 250px; color:blueviolet; size: 40px; " href="#"></a>
                                       
                                    </h5>

                                </td>


                            </tr>

                        </tbody>

                        <div style="max-width: 500px;;background-color: white;border-radius: 10px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);display: flex;flex-direction: column;" class="modal-body">

                            <form method="POST">
                                <input type="hidden" value="<?php echo htmlentities($result->UserName); ?>" name="messageusername">

                                <div class="chat-container">


                                    <div class="chat-body">
                                        <?php

                                        $sql = "SELECT * FROM messages Where role='Admin'";
                                        $query = $dbh->prepare($sql);

                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $row) {


                                        ?>

                                                <div style="margin-bottom:20px ; align-content: end; background-color:rgb(212, 212, 237);  border-radius: 20px; padding: 10px;display:flex; max-width: 75%;" class="chat-message message-sent">
                                                    <?php echo htmlentities($row->messagetext); ?>
                                                </div>

                                        <?php $cnt += 1;
                                            }
                                        } ?>
                                    </div>
                                    <div style="display: flex;padding: 10px;border-top: 1px solid #ddd;flex: 1;margin-right: 10px;" class="chat-input">
                                        <input style="margin-left: -25px;" type="text" class="form-control" name="messagetext" placeholder="message...">
                                        <button style="background-color: #007BFF; margin-left:10px;" name="messagebtn" type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>



            </div>
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