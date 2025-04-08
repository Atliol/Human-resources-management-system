<?php

session_start();

//calling the config file
include_once("includes/config.php");
// adding new users code begins here


//adding departments code starts here
if (isset($_POST['add_department'])) {
	$department = htmlspecialchars($_POST['department']);
	$sql = "INSERT INTO departments(Department )VALUES(:name)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':name', $department, pdo::PARAM_STR);
	$query->execute();
	$lastInsert = $dbh->lastInsertId();
	if ($lastInsert > 0) {
		echo "<script>alert('Department Has Been Added');</script>";
		echo "<script>window.location.href='departments.php';</script>";
	} else {
		echo "<script>alert('Something went wrong.');</script>";
	}
} //adding departments code ends here


//adding holidays starts here
elseif(isset($_POST['add_holiday'])){
	$employee_username  = $_SESSION['userlogin'];
	$holiday_name = htmlspecialchars($_POST['holiday']);
	$holiday_date = htmlspecialchars($_POST['date']);
	$holiday_enddate = htmlspecialchars($_POST['enddate']);
	
	$dep_name = htmlspecialchars($_POST['depname']);
	$startdate= new DateTime($holiday_date);
	$enddate= new DateTime($holiday_enddate);
	$inteval =$startdate->diff($enddate);
	$day= $inteval->days;
	
	$sql = "INSERT INTO holidays(Holiday_Name,Holiday_Date,Day,UserName,EndDate,Department,State)VALUES(:holiday,:date,:days,:userlogin,:enddate,:depname,'Accepted')";
	$query = $dbh->prepare($sql);
	$query->bindParam(':userlogin',$employee_username,PDO::PARAM_STR);
	$query->bindParam(':holiday',$holiday_name,PDO::PARAM_STR);
	$query->bindParam(':date',$holiday_date,PDO::PARAM_STR);
	$query->bindParam(':enddate',$holiday_enddate,PDO::PARAM_STR);
	$query->bindParam(':days', $day, PDO::PARAM_STR);
	$query->bindParam(':depname', $dep_name, PDO::PARAM_STR);
	$query->execute();
	$lastInsert = $dbh->lastInsertId();
	if($lastInsert>0){
		echo "<script>alert('ခွင့်ရက်အားပေါင်းထည့်ပြီးပါပြီ');</script>";
		echo "<script>window.location.href='holidays.php';</script>";
	}else{
		echo "<script>alert('Something Went Wrong.');</script>";
	}


} //adding holidays ends here

//edit holidays start
elseif (isset($_POST['edit_holiday'])) {

	$editid = htmlspecialchars($_POST['editid']);
	$holiday_depname = htmlspecialchars($_POST['depname']);
	$holiday_name = htmlspecialchars($_POST['holiday']);
	$holiday_date = htmlspecialchars($_POST['date']);
	$holiday_enddate = htmlspecialchars($_POST['enddate']);
	
	$startdate= new DateTime($holiday_date);
	$enddate= new DateTime($holiday_enddate);
	$inteval =$startdate->diff($enddate);
	$day= $inteval->days;

	$sql = $dbh->query("UPDATE `holidays`  SET `Holiday_Name` = '$holiday_name', `Holiday_Date` = '$holiday_date', `EndDate` = '$holiday_enddate', `Day` = '$day', `Department` = '$holiday_depname' WHERE id = '$editid'")  or die (mysqli_error($phdb));
	
	if ($sql == TRUE) {
		echo '<script>alert("ခွင့်ရက်အားပြင်ဆင်ပြီးပါပြီ")</script>';
		echo '<script>window.location = "holidays.php"</script>';
	} else {
		echo '<script>alert("Update Failed!!!")</script>';
		echo '<script>window.location = "holidays.php"</script>';
	}
}
//end holidays edit


//setting  start
elseif (isset($_POST['settingsave'])) {

	$settingid = htmlspecialchars($_POST['settingid']);
	$Cname = htmlspecialchars($_POST['Cname']);
	$Cperson = htmlspecialchars($_POST['Cperson']);
	$Caddress = htmlspecialchars($_POST['Caddress']);
	$Country = htmlspecialchars($_POST['Country']);
	$city = htmlspecialchars($_POST['city']);
	$state = htmlspecialchars($_POST['state']);
	$email = htmlspecialchars($_POST['email']);
	$phone = htmlspecialchars($_POST['phone']);
	$fax = htmlspecialchars($_POST['fax']);
	$website = htmlspecialchars($_POST['website']);

	$sql = $dbh->query("UPDATE `assets`  SET `CompanyName` = '$Cname', `Address` = '$Caddress', `Country` = '$Country', `City` = '$city', `State` = '$state',`Email` = '$email', `phone` = '$phone', `Fax` = '$fax',`website` = '$website',`contact` = '$Cperson' WHERE id = '$settingid'")  or die(mysqli_error($phdb));

	if ($sql == TRUE) {
		echo '<script>alert("company setting အားပြင်စင်ပြီးပါပြီ")</script>';
		echo '<script>window.location = "settings.php"</script>';
	} else {
		echo '<script>alert("Update Failed!!!")</script>';
		echo '<script>window.location = "settings.php"</script>';
	}
}

//end setting edit

// Handle message submission
elseif (isset($_POST['messagebtn'])) {
	$admin_username  = $_SESSION['userlogin'];
	$messagtext = htmlspecialchars($_POST['messagetext']);

	$sql = "INSERT INTO messages(UserName,messagetext,role)VALUES(:userlogin,:messagetext,'Admin')";
	$query = $dbh->prepare($sql);
	$query->bindParam(':userlogin', $admin_username, PDO::PARAM_STR);
	$query->bindParam(':messagetext', $messagtext, PDO::PARAM_STR);

	$query->execute();
	$lastInsert = $dbh->lastInsertId();
	if ($lastInsert > 0) {

		echo "<script>window.location.href='message.php';</script>";
	} else {
		echo "<script>alert('Something Went Wrong.');</script>";
	}
}
//message ends here
