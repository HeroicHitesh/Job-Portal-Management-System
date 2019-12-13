<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
$UserName=$_POST['txtUser'];
$Password=$_POST['txtPass'];
$UserType=$_POST['cmbUser'];
if($UserType=="Administrator")
{
$con = mysqli_connect("localhost","root");
mysqli_select_db("job", $con);
$sql = "select * from user_master where UserName='".$UserName."' and Password='".$Password."'";
$result = mysqli_query($sql,$con);
$records = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
if ($records==0)
{
echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'index.php\';</script>';
}
else
{
header("location:Admin/index.php");
} 
mysqli_close($con);
}
else if($UserType=="JobSeeker")
{
$con = mysqli_connect("localhost","root");
mysqli_select_db($con, "job");
$sql = "select * from jobseeker_reg where UserName='".$UserName."' and Password='".$Password."' and Status='Confirm'";
$result = mysqli_query($con,$sql);
$records = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
if ($records==0)
{
echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'index.php\';</script>';
}
else
{
$_SESSION['ID']=$row['JobSeekId'];
$_SESSION['Name']=$row['JobSeekerName'];
header("location:JobSeeker/index.php");
} 
mysqli_close($con);
}
else
{
$con = mysqli_connect("localhost","root");
mysqli_select_db($con, "job");
$sql = "select * from employer_reg where UserName='".$UserName."' and Password='".$Password."' and Status='Confirm'";
$result = mysqli_query($con,$sql);
$records = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
if ($records==0)
{
echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'index.php\';</script>';
}
else
{
$_SESSION['ID']=$row['EmployerId'];
$_SESSION['Name']=$row['CompanyName'];
header("location:Employer/index.php");
} 
mysqli_close($con);
}
?>

</body>
</html>
