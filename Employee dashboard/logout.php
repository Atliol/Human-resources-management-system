<?php
session_start(); 
session_destroy(); // destroy session
header("location:login.php"); 
?>

 <!--/login change to admin start-->
 <div class="form-group text-center">
								<a href="../admin dashboard/adminlogin.php"><button class="btn btn-lg btn-light w-100 fs-6" href="../admin dashboard/adminlogin.php" ><small>Admin</small></button></a>
								<a href="../admin dashboard/adminlogin.php"><button class="btn btn-lg btn-light w-100 fs-6" href="../admin dashboard/adminlogin.php" ><small>HR</small></button></a>
					</div>
					 <!--/login change to admin end-->