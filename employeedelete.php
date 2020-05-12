<?php
session_start();
$userName=$_SESSION['userName'];
if(!isset($_SESSION['userName']))
{
	header("Location:login.php");
}
?>

<?php
$con=mysqli_connect("localhost","root","","db");
	if(!$con)
	{
		die("Connection Error: ".mysqli_connect_error()."<br/>");
	}
if (isset($userName))
{
$eid = $_GET['eid'];
$sql="DELETE FROM employee WHERE eid=$eid";
if(mysqli_query($con,$sql))
	{
		header("Location:employee_list.php");
	}
	else
	{
		echo "Error in deleting: ".mysqli_error($con);
	}
mysqli_close($con);		
}
?>