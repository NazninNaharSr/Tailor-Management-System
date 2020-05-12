<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Tailors</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="topnav">
  <a href="index.php">Home</a>
  <a href="login.php">Login</a>
  <a href="registration.php">Registration</a>
</div>

<div>
  <h1 style="text-align: center">Tailor Management System</h1>

			<h4 style="text-align: center">Login Form</h4>

			<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
				<table align="center">
					<tr>
						<td>User Name</td>
						<td><input type="text" name="userName" placeholder="Give your Username"/></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" placeholder="Give your password"/></td>
					</tr>
					


<tr>					<td>User Type</td>
						<td>		
  <input type="radio" name="type" value="Admin">Admin
  <input type="radio" name="type" value="User">User
  <input type="radio" name="type" value="Tailor">Tailor
 
<br>
		</td>
				
					</tr>

					<tr>
						<td></td>
						<td><input type="submit" name="login" value="Login"/></td>
					</tr>
				</table>
			</form>
		
</div>

<div class="footer">
  <p>Copyright © 2020</p>
</div>

</body>
</html>




<?php
if(isset($_POST['login']))
{
	$con=mysqli_connect("localhost","root","","db");
	if(!$con)
	{
		die("Connection Error: ".mysqli_connect_error()."<br/>");
	}
	//Retrieve Data

	$password=$_POST['password'];
	$userName=$_POST['userName'];
	$usertype=$_POST['type'];


	if($usertype== "Admin"){
	$sql="SELECT * FROM admin WHERE userName='$userName' AND password='$password'";
	$result=mysqli_query($con,$sql);	
	if(mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_array($result);
		$_SESSION['userName']=$row['userName'];
		$_SESSION['name']=$row['name'];
		header("Location:nhome.php");
	}
	else
	{
		echo "No data found.<br/>";
	}

	}
	else if($usertype== "User"){
	$sql="SELECT * FROM user WHERE userName='$userName' AND password='$password'";
	$result=mysqli_query($con,$sql);	
	if(mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_array($result);
		$_SESSION['userName']=$row['userName'];
		$_SESSION['name']=$row['name'];
		header("Location:nuser.php");
	}
	else
	{
		echo "No data found.<br/>";
	}

	}

   else{
	$sql="SELECT * FROM tailor WHERE userName='$userName' AND password='$password'";
	$result=mysqli_query($con,$sql);	
	if(mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_array($result);
		$_SESSION['userName']=$row['userName'];
		$_SESSION['name']=$row['name'];
		header("Location:ntailor.php");
	}
	else
	{
		echo "No data found.<br/>";
	}

	}





mysqli_close($con);		
}
?>

	


<?php
	// $sql="SELECT * FROM customers WHERE id=1";
	// $result=mysqli_query($con,$sql);	
	// if(mysqli_num_rows($result)>0)
	// {
	// 	while($row=mysqli_fetch_array($result))
	// 	{
	// 		//echo "Id: ".$row[0]." Name: ".$row[1]."<br/>";
	// 		echo "Id: ".$row['id']." Name: ".$row['name']."<br/>";
	// 	}
	// }
	// else
	// {
	// 	echo "No data found.<br/>";
	// }
?>