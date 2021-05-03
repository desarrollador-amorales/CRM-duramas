<?php
session_start();
//include("checklogin.php");
//check_login();
include("dbconnection.php");
if(isset($_GET['id']))
{
$userid=$_GET['id'];
	$ret=mysqli_query($con,"delete from user where id='$userid'");
	if($ret)
	{
	echo "<script>alert('Usuario Eliminado');</script>";
    echo "<script>location.href='manage-users.php';</script>";
	}
	}
?>