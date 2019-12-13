
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

	$News=$_POST['txtNews'];
	$Date=$_POST['txtDate'];
	// Establish Connection with MYSQL
	$con = mysqli_connect ("localhost","root");
	// Select Database
	mysqli_select_db($con, "job");
	// Specify the query to Insert Record
	$sql = "insert into News_Master(News,NewsDate) values('".$News."','".$Date."')";
	// execute query
	mysqli_query ($con,$sql);
	// Close The Connection
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("New News Inserted Succesfully");window.location=\'News.php\';</script>';

?>
</body>
</html>
