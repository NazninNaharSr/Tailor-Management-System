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
$id = $_GET['id'];
$sql="DELETE FROM user WHERE id=$id";
if(mysqli_query($con,$sql))
	{
		header("Location:nhome.php");
	}
	else
	{
		echo "Error in deleting: ".mysqli_error($con);
	}
mysqli_close($con);		
}
?>