

<?php
session_start();
$userName=$_SESSION['userName'];
if(!isset($_SESSION['userName']))
{
	header("Location:login.php");
}
?>

<html>
	<head>
		<title>Update</title>
		<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
.header {
  grid-area: header;
  background-color: #85C1E9;
  padding: 30px;
  text-align: center;
  font-size: 35px;
}

/* The grid container */
.grid-container {
  display: grid;
  grid-template-areas: 
    'header header header header header header' 
    'left middle middle middle middle middle' 
    'footer footer footer footer footer footer';
  /* grid-column-gap: 10px; - if you want gap between the columns */
 
} 

.left,
.middle,
.right {
  padding: 10px;
  height: 400px; /* Should be removed. Only for demonstration */
  overflow: scroll;
}

/* Style the left column */
.left {
  grid-area: left;

}

/* Style the middle column */
.middle {
  grid-area: middle;
}

/* Style the right column */
.right {
  grid-area: right;
  
}

/* Style the footer */
.footer {
  grid-area: footer;
  background-color: #85C1E9;
  padding: 10px;
  text-align: center;
}

</style>
	</head>
	<body>
		<div class="grid-container">
  <div class="header">
    <h2 style="color: #2E4053"; align="left">Tailor Management System </h2>
   
  </div>
  
  <div class="left" style="background-color:#aaa;">
  <ul>

  <li><a href="nhome.php">Dashboard</a></li>
  <li><a href="view.php?userName=<?php echo $userName; ?>">View Profile</a></li>
  <li><a href="edit.php">Edit Profile</a></li>
  <li><a href="changepic.php">Change Profile Picture</a></li>
  <li><a href="changepass.php">Change Password</a></li>
   <li><a href="all_taken_products.php">Taken Products</a></li>
  <li><a href="all_orders.php">Order Lists</a></li>

  <li><a href="employee_list.php">Employees</a></li>
  <li><a href="delivery.php">Delivery</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>  
  </div>
  <div class="middle" style="background-color:#bbb;">
		<fieldset align="center">
			<legend>Update</legend>
			<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
				<table align="center">
					<tr>
						<td>Product Name</td>
						<td><input type="text" name="pname" value="<?php echo $_GET['Product Name'] ?>"></td>
					</tr>
					<tr>
						<td>Description</td>
						<td><input type="text" name="description" value="<?php echo $_GET['Description'] ?>"></td>
					</tr>
					<tr>
						<td>Quantity</td>
						<td><input type="text" name="pquantity" value="<?php echo $_GET['Quantity'] ?>"></td>
					</tr>
					<tr>
						<td>Price</td>
						<td><input type="text" name="Price" value="<?php echo $_GET['Price'] ?>"></td>
					</tr>
					<tr>

						<td></td>
						<td><input type="submit" name="adduser" value="Edit"/></td>
					</tr>
				</table>
			</form>
		</fieldset>
	</div>
	</body>
	</html>

<?php
if (isset($_POST['adduser']))
{
	$con=mysqli_connect("localhost","root","","db");
	if(!$con)
	{
		die("Connection Error: ".mysqli_connect_error()."<br/>");
	}
	if (isset($userName))
	{
		$pid=$_GET['pid'];
		$pname=$_POST['pname'];
		$description=$_POST['description'];
		$pquantity=$_POST['pquantity'];
		$price=$_POST['price'];
		

		$sql="UPDATE `products` SET pname='$pname',description='$description',pquantity='$pquantity',price='$price' WHERE pid='$pid'";
		if(mysqli_query($con,$sql))
		{
			header("Location:all_orders.php");
		}
		else
		{
			echo "Error in updating: ".mysqli_error($con);
		}	
		mysqli_close($con);		
	}
}
?>