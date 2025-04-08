<?php
//calling the config file
include_once("includes/config.php");
// adding new users code begins here
if (isset($_POST['add_user'])) {
	$fname = htmlspecialchars($_POST['firstname']);
	$lname = htmlspecialchars($_POST['lastname']);
	$username = htmlspecialchars($_POST['username']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$confirm_password = htmlspecialchars($_POST['confirm_pass']);
	$phone = htmlspecialchars($_POST['phone']);
	$address = htmlspecialchars($_POST['address']);
	//grabing user profile picture
	$file = $_FILES['image']['name'];
	$file_loc = $_FILES['image']['tmp_name'];
	$folder = "profiles/";
	$new_file_name = strtolower($file);
	$final_file = str_replace(' ', '-', $new_file_name);
	if ($password != $confirm_password) {
		echo "<script>alert('Your passwords do not match');</script>";
	} else {
		//moving the picture into new location and set file name to be $image.
		if (move_uploaded_file($file_loc, $folder . $final_file)) {
			$image = $final_file;
		}
		$password = password_hash($password, PASSWORD_DEFAULT);
		$sql = "INSERT INTO users(FirstName,LastName,UserName,Email,Password,Phone,Address,Picture)
			values(:fname,:lname,:username,:email,:password,:phone,:address,:pic)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':fname', $fname, PDO::PARAM_STR);
		$query->bindParam(':lname', $lname, PDO::PARAM_STR);
		$query->bindParam(':username', $username, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':password', $password, PDO::PARAM_STR);
		$query->bindParam(':phone', $phone, PDO::PARAM_STR);
		$query->bindParam(':address', $address, PDO::PARAM_STR);
		$query->bindParam(':pic', $image, PDO::PARAM_STR);
		$query->execute();
		$lastInsert = $dbh->lastInsertId();
		if ($lastInsert > 0) {
			move_uploaded_file($file_loc, $folder . $final_file);
			echo "<script>alert('New User Has Been Added');</script>";
			echo "<script>window.location.href='users.php';</script>";
		} else {
			echo "<script>alert('Something went wrong.');</script>";
		}
	}
}
//adding  users ends here 

//adding assets begins here
elseif (isset($_POST['add_asset'])) {
	$asset = htmlspecialchars($_POST['asset_name']);
	$asset_id = htmlspecialchars($_POST['asset_id']);
	$purchase_date = htmlspecialchars($_POST['purchase_date']);
	$purchase_from = htmlspecialchars($_POST['purchase_from']);
	$manufacturer = htmlspecialchars($_POST['manufacturer']);
	$model = htmlspecialchars($_POST['model']);
	$status = htmlspecialchars($_POST['status']);
	$supplier = htmlspecialchars($_POST['supplier']);
	$condition = htmlspecialchars($_POST['condition']);
	$warrant = htmlspecialchars($_POST['warranty']);
	$price = htmlspecialchars($_POST['value']);
	$asset_user = htmlspecialchars($_POST['asset_user']);
	$description = htmlspecialchars($_POST['description']);
	$sql = "INSERT INTO `assets` ( `assetName`, `assetId`, `PurchaseDate`, `PurchaseFrom`, `Manufacturer`, `Model`, `Status`, `Supplier`, `AssetCondition`, `Warranty`, `Price`, `AssetUser`, `Description`)
		 VALUES (:name, :id, :purchaseDate, :purchasefrom, :manufacturer, :model, :stats, :supplier, :condition, :warranty, :price, :user, :describe)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':name', $asset, PDO::PARAM_STR);
	$query->bindParam(':id', $asset_id, PDO::PARAM_STR);
	$query->bindParam(':purchaseDate', $purchase_date, PDO::PARAM_STR);
	$query->bindParam(':purchasefrom', $purchase_from, PDO::PARAM_STR);
	$query->bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
	$query->bindParam(':model', $model, PDO::PARAM_STR);
	$query->bindParam(':stats', $status, PDO::PARAM_INT);
	$query->bindParam(':supplier', $supplier, PDO::PARAM_STR);
	$query->bindParam(':condition', $condition, PDO::PARAM_STR);
	$query->bindParam(':warranty', $warrant, PDO::PARAM_STR);
	$query->bindParam(':price', $price, PDO::PARAM_INT);
	$query->bindParam(':user', $asset_user, PDO::PARAM_STR);
	$query->bindParam(':describe', $description, PDO::PARAM_STR);
	$query->execute();
	$lastinserted = $dbh->lastInsertId();
	if ($lastinserted > 0) {
		echo "<script>alert('Asset Has Been Added');</script>";
		echo "<script>window.location.href='assets.php';</script>";
	} else {
		echo "<script>alert('Something Went Wrong Please Again.');</script>";
	}
}
//adding assets code ends here.

//adding of goal types stats here
elseif (isset($_POST['add_goal_type'])) {
	$type = htmlspecialchars($_POST['type']);
	$description = htmlspecialchars($_POST['description']);
	$status = htmlspecialchars($_POST['status']);
	$sql = "INSERT INTO `goal_type` ( `Type`, `Description`, `Status`) 
		VALUES (:type, :description, :status)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':type', $type, PDO::PARAM_STR);
	$query->bindParam(':description', $description, PDO::PARAM_STR);
	$query->bindParam(':status', $status, PDO::PARAM_STR);
	$query->execute();
	$lastinserted = $dbh->lastInsertId();
	if ($lastinserted > 0) {
		echo "<script>alert('Goal Type Has Been Added');</script>";
		echo "<script>window.location.href='goal-type.php';</script>";
	} else {
		echo "<script>alert('Something Went Wrong.Re-check goal type may already exist');</script>";
	}
} //goal type adding code ends here.

//adding of goal tracking code starts here
elseif (isset($_POST['add_goal'])) {
	$type = htmlspecialchars($_POST['goal_type']);
	$subject = htmlspecialchars($_POST['subject']);
	$target = htmlspecialchars($_POST['target']);
	$start = htmlspecialchars($_POST['start_date']);
	$end = htmlspecialchars($_POST['end_date']);
	$description = htmlspecialchars($_POST['description']);
	$status = htmlspecialchars($_POST['status']);
	$progress = htmlspecialchars($_POST['progress']);
	$sql = "INSERT INTO `goals` ( `Type`, `Subject`, `Target`, `StartDate`, `EndDate`, `Description`, `Status`,`progress`) 
		VALUES (:type,:subject,:target,:start,:end, :description, :status,:progress)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':type', $type, PDO::PARAM_STR);
	$query->bindParam(':subject', $subject, PDO::PARAM_STR);
	$query->bindParam(':target', $target, PDO::PARAM_STR);
	$query->bindParam(':start', $start, PDO::PARAM_STR);
	$query->bindParam(':end', $end, PDO::PARAM_STR);
	$query->bindParam(':description', $description, PDO::PARAM_STR);
	$query->bindParam(':status', $status, PDO::PARAM_STR);
	$query->bindParam(':progress', $progress, PDO::PARAM_STR);
	$query->execute();
	$lastinserted = $dbh->lastInsertId();
	if ($lastinserted > 0) {
		echo "<script>alert('Goal Has Been Added');</script>";
		echo "<script>window.location.href='goal-tracking.php';</script>";
	} else {
		echo "<script>alert('Something Went Wrong.Re-check goal type may already exist');</script>";
	}
}
//goal tracking code ends here

//client adding code starts here
elseif (isset($_POST['add_client'])) {
	$firstname = htmlspecialchars($_POST['firstname']);
	$lastname = htmlspecialchars($_POST['lastname']);
	$username = htmlspecialchars($_POST['username']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$confirm_password = htmlspecialchars($_POST['confirmpass']);
	$client_id = htmlspecialchars($_POST['clientid']);
	$phone = htmlspecialchars($_POST['phone']);
	$company = htmlspecialchars($_POST['company']);
	$address = htmlspecialchars($_POST['address']);
	//grabing user profile picture
	$propic = $_FILES["propic"]["name"];
	$extension = substr($propic, strlen($propic) - 4, strlen($propic));

	if ($password != $confirm_password) {
		echo "<script>alert('Your passwords do not match');</script>";
	} else {
		$propic = md5($propic) . time() . $extension;
		move_uploaded_file($_FILES["propic"]["tmp_name"], "clients/" . $propic);
		$password = password_hash($password, PASSWORD_DEFAULT);
		$sql = "INSERT INTO `clients` (`FirstName`, `LastName`, `UserName`, `Email`, `Password`, `ClientId`, `Phone`, `Company`, `Address`, `Status`, `Picture`) 
					VALUES (:fname, :lname, :username, :email, :password, :id, :phone, :company, :address,'1',:pic)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':fname', $firstname, PDO::PARAM_STR);
		$query->bindParam(':lname', $lastname, PDO::PARAM_STR);
		$query->bindParam(':username', $username, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':password', $password, PDO::PARAM_STR);
		$query->bindParam(':id', $client_id, PDO::PARAM_STR);
		$query->bindParam(':phone', $phone, PDO::PARAM_STR);
		$query->bindParam(':company', $company, PDO::PARAM_STR);
		$query->bindParam(':address', $address, PDO::PARAM_STR);
		$query->bindParam(':pic', $propic, PDO::PARAM_STR);
		$query->execute();
		$lastInsert = $dbh->lastInsertId();
		if ($lastInsert > 0) {

			echo "<script>alert('Client Has Been Added');</script>";
			echo "<script>window.location.href='clients.php';</script>";
		} else {
			echo "<script>alert('Something went wrong.');</script>";
		}
	}
} //adding client code ends here

//adding departments code starts here
elseif (isset($_POST['add_department'])) {
	$department = htmlspecialchars($_POST['department']);
	$sql = "INSERT INTO departments(Department )VALUES(:name)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':name', $department, pdo::PARAM_STR);
	$query->execute();
	$lastInsert = $dbh->lastInsertId();
	if ($lastInsert > 0) {
		echo "<script>alert('Department အသစ်အားထည့်သွင်းပြီးပါပြီ');</script>";
		echo "<script>window.location.href='departments.php';</script>";
	} else {
		echo "<script>alert('Something went wrong.');</script>";
	}
} //adding departments code ends here

//edit departments start
elseif (isset($_POST['editdep'])) {

	$editid = htmlspecialchars($_POST['editid']);
	$edit_dep = htmlspecialchars($_POST['depname']);

	$sql = $dbh->query("UPDATE `departments`  SET `Department` = '$edit_dep' WHERE id = '$editid'")  or die(mysqli_error($phdb));

	if ($sql == TRUE) {
		echo '<script>alert("departmentsအားပြင်ဆင်ပြီးပါပြီ")</script>';
		echo '<script>window.location = "departments.php"</script>';
	} else {
		echo '<script>alert("Update Failed!!!")</script>';
		echo '<script>window.location = "departments.php"</script>';
	}
}
//end deparments edit

//adding role code starts from here
elseif (isset($_POST['add_designation'])) {
	$name = htmlspecialchars($_POST['designation']);
	$department = htmlspecialchars($_POST['department']);
	$sql = "INSERT INTO `designations` (`Designation`, `Department`) VALUES ( :designation, :department)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':designation', $name, PDO::PARAM_STR);
	$query->bindParam(':department', $department, pdo::PARAM_STR);
	$query->execute();
	$lastInsert = $dbh->lastInsertId();
	if ($lastInsert > 0) {
		echo "<script>alert('Roleအားထည့်သွင်းပြီးပါပြီ');</script>";
		echo "<script>window.location.href='designations.php';</script>";
	} else {
		echo "<script>alert('Something Went wrong');</scrip>";
	}
} //adding role code ends here


//edit role start
elseif (isset($_POST['saverole'])) {

	$editid = htmlspecialchars($_POST['editid']);
	$name = htmlspecialchars($_POST['name']);
	$edit_dep = htmlspecialchars($_POST['department']);

	$sql = $dbh->query("UPDATE `designations`  SET `Designation` = '$name',`Department` = '$edit_dep' WHERE id = '$editid'")  or die(mysqli_error($phdb));

	if ($sql == TRUE) {
		echo '<script>alert("Roleအားပြင်ဆင်ပြီးပါပြီ")</script>';
		echo '<script>window.location = "designations.php"</script>';
	} else {
		echo '<script>alert("Update Failed!!!")</script>';
		echo '<script>window.location = "designations.php"</script>';
	}
}
//end role edit

//adding holidays starts here
elseif (isset($_POST['add_holiday'])) {
	$employee_username  = $_SESSION['userlogin'];
	$holiday_name = htmlspecialchars($_POST['holiday']);
	$holiday_date = htmlspecialchars($_POST['date']);
	$holiday_enddate = htmlspecialchars($_POST['enddate']);

	$dep_name = htmlspecialchars($_POST['depname']);

	$startdate = new DateTime($holiday_date);
	$enddate = new DateTime($holiday_enddate);
	$inteval = $startdate->diff($enddate);
	$day = $inteval->days;


	$sql = "INSERT INTO holidays(Holiday_Name,Holiday_Date,Day,UserName,EndDate,Department,State)VALUES(:holiday,:date,:days,:userlogin,:enddate,:depname,'Accepted')";
	$query = $dbh->prepare($sql);
	$query->bindParam(':userlogin', $employee_username, PDO::PARAM_STR);
	$query->bindParam(':holiday', $holiday_name, PDO::PARAM_STR);
	$query->bindParam(':date', $holiday_date, PDO::PARAM_STR);
	$query->bindParam(':enddate', $holiday_enddate, PDO::PARAM_STR);
	$query->bindParam(':days', $day, PDO::PARAM_STR);
	$query->bindParam(':depname', $dep_name, PDO::PARAM_STR);
	$query->execute();
	$lastInsert = $dbh->lastInsertId();
	if ($lastInsert > 0) {
		echo "<script>alert('ရုံးပိတ်ရက်အားပေါင်းထည့်ပြီးပါပြီ');</script>";
		echo "<script>window.location.href='holidays.php';</script>";
	} else {
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

	$startdate = new DateTime($holiday_date);
	$enddate = new DateTime($holiday_enddate);
	$inteval = $startdate->diff($enddate);
	$day = $inteval->days;


	$sql = $dbh->query("UPDATE `holidays`  SET `Holiday_Name` = '$holiday_name', `Holiday_Date` = '$holiday_date', `EndDate` = '$holiday_enddate', `Day` = '$day', `Department` = '$holiday_depname' WHERE id = '$editid'")  or die(mysqli_error($phdb));

	if ($sql == TRUE) {
		echo '<script>alert("ခွင့်ရက်အားပြင်ဆင်ပြီးပါပြီ")</script>';
		echo '<script>window.location = "holidays.php"</script>';
	} else {
		echo '<script>alert("Update Failed!!!")</script>';
		echo '<script>window.location = "holidays.php"</script>';
	}
}
//end holidays edit

//accept/reject holidays start
elseif (isset($_POST['accept_holiday'])) {

	$editid = htmlspecialchars($_POST['editid']);
	$acceptorrejuct = htmlspecialchars($_POST['state']);


	$sql = $dbh->query("UPDATE `holidays`  SET `State` = '$acceptorrejuct'  WHERE id = '$editid'")  or die(mysqli_error($phdb));

	if ($sql == TRUE) {
		echo '<script>alert("ခွင့်ရက်အတည်ပြုပြီးပါပြီ")</script>';
		echo '<script>window.location = "holidays.php"</script>';
	} else {
		echo '<script>alert("Update Failed!!!")</script>';
		echo '<script>window.location = "holidays.php"</script>';
	}
}
//accept/reject holidays edit


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


//adding trainertype code starts here
elseif (isset($_POST['addtrainertype'])) {
	$trainertype = htmlspecialchars($_POST['trainertype']);
	$sql = "INSERT INTO trainertype(Trainer_Type )VALUES(:trainertype)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':trainertype', $trainertype, pdo::PARAM_STR);
	$query->execute();
	$lastInsert = $dbh->lastInsertId();
	if ($lastInsert > 0) {
		echo "<script>alert('trainer Type အသစ်အားထည့်သွင်းပြီးပါပြီ');</script>";
		echo "<script>window.location.href='trainer_type.php';</script>";
	} else {
		echo "<script>alert('Something went wrong.');</script>";
	}
} //adding trainertype code ends here

//edit trainertype start
elseif (isset($_POST['edit_trainertype'])) {

	$editid = htmlspecialchars($_POST['editid']);
	$trainertype = htmlspecialchars($_POST['trainertype']);

	$sql = $dbh->query("UPDATE `trainertype`  SET `Trainer_Type` = '$trainertype' WHERE id = '$editid'")  or die(mysqli_error($phdb));

	if ($sql == TRUE) {
		echo '<script>alert("trainer Type အားပြင်ဆင်ပြီးပါပြီ")</script>';
		echo '<script>window.location = "trainer_type.php"</script>';
	} else {
		echo '<script>alert("Update Failed!!!")</script>';
		echo '<script>window.location = "trainer_type.php"</script>';
	}
}
//end trainertype edit


//adding employees code starts from here
elseif (isset($_POST['add_employee'])) {
	$firstname = htmlspecialchars($_POST['firstname']);
	$lastname = htmlspecialchars($_POST['lastname']);
	$username = htmlspecialchars($_POST['username']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$confirm_password = htmlspecialchars($_POST['confirm_pass']);
	$employee_id = htmlspecialchars($_POST['employee_id']);
	$phone = htmlspecialchars($_POST['phone']);
	$department = htmlspecialchars($_POST['department']);
	$designation = htmlspecialchars($_POST['designation']);
	//grabbing the picture
	$file = $_FILES['picture']['name'];
	$file_loc = $_FILES['picture']['tmp_name'];
	$folder = "employees/";
	$new_file_name = strtolower($file);
	$final_file = str_replace(' ', '-', $new_file_name);

	if (move_uploaded_file($file_loc, $folder . $final_file) && ($password == $confirm_password)) {
		$image = $final_file;
		$password = password_hash($password, PASSWORD_DEFAULT);
	}
	$sql = "INSERT INTO `employees` (`id`, `FirstName`, `LastName`, `UserName`, `Email`, `Password`, `Employee_Id`, `Phone`, `Department`, `Designation`, `Picture`, `DateTime`) 
		VALUES (NULL, :firstname, :lastname, :username, :email,:password, :id, :phone, :department, :designation,  :pic, current_timestamp())";
	$query = $dbh->prepare($sql);
	$query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
	$query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
	$query->bindParam(':username', $username, PDO::PARAM_STR);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':password', $password, PDO::PARAM_STR);
	$query->bindParam(':id', $employee_id, PDO::PARAM_STR);
	$query->bindParam(':phone', $phone, PDO::PARAM_STR);
	$query->bindParam(':department', $department, PDO::PARAM_STR);
	$query->bindParam(':designation', $designation, PDO::PARAM_STR);
	$query->bindParam(':pic', $image, PDO::PARAM_STR);
	$query->execute();
	$lastInsert = $dbh->lastInsertId();
	if ($lastInsert > 0) {
		echo "<script>alert('Employee အသစ်အားထည့်သွင်းပြီးပါပြီ');</script>";
		echo "<script>window.location.href='employees.php';</script>";
	} else {
		echo "<script>alert('Something Went Wrong');</script>";
	}
} //ading employees code eds here


//edit employess start
elseif (isset($_POST['edit_employee'])) {

	$editid = htmlspecialchars($_POST['editid']);
	$firstname = htmlspecialchars($_POST['firstname']);
	$lastname = htmlspecialchars($_POST['lastname']);
	$username = htmlspecialchars($_POST['username']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$confirm_password = htmlspecialchars($_POST['confirm_pass']);
	$employee_id = htmlspecialchars($_POST['employee_id']);
	$phone = htmlspecialchars($_POST['phone']);
	$department = htmlspecialchars($_POST['department']);
	$designation = htmlspecialchars($_POST['designation']);
	
	

	$sql = $dbh->query("UPDATE `employees`  SET `FirstName` = '$firstname', `LastName` = '$lastname', `UserName` = '$username', `Email` = '$email', `Password` = '$password', `Employee_Id` = '$employee_id', `Phone` = '$phone', `Department` = '$department' , `Designation` = '$designation'  WHERE id = '$editid'")  or die(mysqli_error($phdb));

	if ($sql == TRUE) {
		echo '<script>alert("employeeအားပြင်ဆင်ပြီးပါပြီ")</script>';
		echo '<script>window.location = "employees.php"</script>';
	} else {
		echo '<script>alert("Update Failed!!!")</script>';
		echo '<script>window.location = "employees.php"</script>';
	}
}
//end employee edit

//employee overtime code begins here
elseif (isset($_POST['add_overtime'])) {
	$employee = htmlspecialchars($_POST['employee']);
	$username = htmlspecialchars($_POST['username']);
	$ovtime_date = htmlspecialchars($_POST['ov_date']);
	$overtime_hours = htmlspecialchars($_POST['ov_hours']);
	$overtime_type = htmlspecialchars($_POST['ov_type']);
	$description = htmlspecialchars($_POST['description']);
	$sql = "INSERT INTO `overtime` ( `Employee`, `OverTime_Date`, `Hours`, `Type`, `Description`, `State`, `UserName` ) 
		VALUES ( :employee, :date, :hours,:type, :description,'padding',:username)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':employee', $employee, PDO::PARAM_STR);
	$query->bindParam(':username', $username, PDO::PARAM_STR);
	$query->bindParam(':date', $ovtime_date, PDO::PARAM_STR);
	$query->bindParam(':hours', $overtime_hours, PDO::PARAM_STR);
	$query->bindParam(':type', $overtime_type, PDO::PARAM_STR);
	$query->bindParam(':description', $description, PDO::PARAM_STR);
	$query->execute();
	$lastInsert = $dbh->lastInsertId();
	if ($lastInsert > 0) {
		echo "<script>alert('Employee Overtime အားထည့်သွင်းပြီးပါပြီ');</script>";
		echo "<script>window.location.href='overtime.php';</script>";
	} else {
		echo "<script>alert('Somthing Went Wrong');</script>";
	}
}


//edit overtime start
elseif (isset($_POST['edit_overtime'])) {

	$editid = htmlspecialchars($_POST['editid']);
	$ovtime_date = htmlspecialchars($_POST['ov_date']);
	$overtime_hours = htmlspecialchars($_POST['ov_hours']);
	$overtime_type = htmlspecialchars($_POST['ov_type']);
	$description = htmlspecialchars($_POST['description']);

	$sql = $dbh->query("UPDATE `overtime`  SET `OverTime_Date` = '$ovtime_date',`Hours` = '$overtime_hours',`Type` = '$overtime_type',`Description` = '$description' WHERE id = '$editid'")  or die(mysqli_error($phdb));

	if ($sql == TRUE) {
		echo '<script>alert("overtime အားပြင်ဆင်ပြီးပါပြီ")</script>';
		echo '<script>window.location = "overtime.php"</script>';
	} else {
		echo '<script>alert("Update Failed!!!")</script>';
		echo '<script>window.location = "overtime.php"</script>';
	}
}
//end overtime edit

//adding employees leave code starts here
elseif (isset($_POST['add_leave'])) {
	$employee = htmlspecialchars($_POST['employee']);
	$start_date = htmlspecialchars($_POST['starting_at']);
	$end_date = htmlspecialchars($_POST['ends_on']);
	$days_count = htmlspecialchars($_POST['days_count']);
	$reason = htmlspecialchars($_POST['reason']);
	$sql = "INSERT INTO `leaves` (`Employee`, `Starting_At`, `Ending_On`, `Days`, `Reason`, `Time_Added`)
		 VALUES ( :employee, :start, :end, :days, :reason, current_timestamp())";
	$query = $dbh->prepare($sql);
	$query->bindParam(':employee', $employee, PDO::PARAM_STR);
	$query->bindParam(':start', $start_date, PDO::PARAM_STR);
	$query->bindParam(':end', $end_date, PDO::PARAM_STR);
	$query->bindParam(':days', $days_count, PDO::PARAM_STR);
	$query->bindParam(':reason', $reason, PDO::PARAM_STR);
	$query->execute();
	$lastInsert = $dbh->lastInsertId();
	if ($lastInsert > 0) {
		echo "<script>alert('Employee Leave Has Been Added');</script>";
		echo "<script>window.location.href='leaves-employee.php';</script>";
	} else {
		echo "<script>alert('Something went wrong');</script>";
	}
}

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

