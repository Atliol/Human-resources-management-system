<?php
$sql = "SELECT * FROM assets ";
$query = $dbh->prepare($sql);
$query->execute();
$result = $query->fetch(PDO::FETCH_OBJ);

?>
<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div class="sidebar-menu">
			<ul>
				<li>
					<a href="index.php"><i class="la la-home"></i> <span>Back to Home</span></a>
				</li>
				<li class="menu-title">Settings</li>
				<li>
					<a href="settings.php?settingid=<?php echo htmlentities($result->id); ?>"><i class="la la-building"></i> <span>Company Settings</span></a>
				</li>


			</ul>
		</div>
	</div>
</div>