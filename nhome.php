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

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}



th {
  background-color: #4CAF50;
  color: white;
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
  <div class="middle" style="background-color:#bbb;"><?php
    $name=$_SESSION['name'];
    echo "<h5>Welcome $name</h5>";
    ?>

      <?php

  $con=mysqli_connect("localhost","root","","db");
  if(!$con)
  {
    die("Connection Error: ".mysqli_connect_error()."<br/>");
  }

  $sql="SELECT id,`name`, `email`, `userName`,`type` FROM user ";
  $result=mysqli_query($con,$sql);
  if(mysqli_num_rows($result)>0)
   {
    ?>
    <table border='1' cellpadding='8'>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Username</th>
        <th>Usertype</th>
        <th>Actions</th>
      </tr>
    <?php
    while($row=mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>".$row['id']."</td>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['email']."</td>";
      echo "<td>".$row['userName']."</td>";
      echo "<td>".$row['type']."</td>";
      echo '<td><a href="useredit.php? id='.$row['id'].'&Name=' .$row['name'].'&Email='.$row['email'].'&Username='.$row['userName'].'&Usertype='.$row['type'].'">Edit</a> || <a href="userdelete.php?id=' .$row['id'].'">Delete</a></td>';
      echo "</tr>";

    
    }
    echo "</table>";
   }
   else
   {
    echo "No data found.<br/>";
   }



    $sql="SELECT id,`name`, `email`, `userName`,`type` FROM tailor ";
  $result=mysqli_query($con,$sql);
  if(mysqli_num_rows($result)>0)
   {
    ?>
    <table border='1' cellpadding='8'>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Username</th>
        <th>Usertype</th>
        <th>Actions</th>
      </tr>
    <?php
    while($row=mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>".$row['id']."</td>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['email']."</td>";
      echo "<td>".$row['userName']."</td>";
      echo "<td>".$row['type']."</td>";
      echo '<td><a href="tailoredit.php? id='.$row['id'].'&Name=' .$row['name'].'&Email='.$row['email'].'&Username='.$row['userName'].'&Usertype='.$row['type'].'">Edit</a> || <a href="tailordelete.php?id=' .$row['id'].'">Delete</a></td>';
      echo "</tr>";

    
    }
    echo "</table>";
   }
   else
   {
    echo "No data found.<br/>";
   }
mysqli_close($con);   
?>

    </div>  
  
  <div class="footer">
    <p>Copyright © 2020</p>
  </div>
</div>
</body>
</html>

<?php
if(isset($_POST['register']))
{
  $con=mysqli_connect("localhost","root","","db");
  if(!$con)
  {
    die("Connection Error: ".mysqli_connect_error()."<br/>");
  }
  //Row Insert
 $name=$_POST['Name'];
  $email=$_POST['email'];
  $userName=$_POST['userName'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];
  $gender=$_POST['gender'];
  $dob=$_POST['dob'];
  $usertype=$_POST['type'];
 $sql="INSERT INTO `user`(`name`, `email`, `userName`, `password`, `gender`, `dob`, `picture`, `type`)VALUES('$name','$email','$userName','$password','$gender','$dob','','$usertype')";
  if(mysqli_query($con,$sql))
  {
    header("Location:nhome.php");
  }
  else
  {
    echo "Error in inserting: ".mysqli_error($con);
  }
mysqli_close($con);   
}
?>

