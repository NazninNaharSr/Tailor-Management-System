<?php
session_start();
$userName=$_SESSION['userName'];
$name=$_SESSION['name'];
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
  height: 300px; /* Should be removed. Only for demonstration */
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
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}

</style>
</head>
<body>


<div class="grid-container">
  <div class="header">
    <h2 style="color: #2E4053"; align="left">Tailor Management System <?php
    $name=$_SESSION['name'];
    ?></h2>
   
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

  $sql="SELECT `oid`, `user_ID`, `oname`, `oquantity`, `order_date`, `delivery_date`, `note` FROM `order_list`";
  $result=mysqli_query($con,$sql);
  if(mysqli_num_rows($result)>0)
   {
    ?>
    <table border='1' cellpadding='8'>
      <tr>
        <th>Order Id</th>
        <th>User Id</th>
        <th>Order Name</th>
        <th>Order Quantity</th>
        <th>Order date</th>
        <th>Delivery Date</th>
        <th>Note</th>
        <th>Actions</th>
        
      </tr>
    <?php
    while($row=mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>".$row['oid']."</td>";
      echo "<td>".$row['user_ID']."</td>";
      echo "<td>".$row['oname']."</td>";
      echo "<td>".$row['oquantity']."</td>";

      echo "<td>".$row['order_date']."</td>";
            
      echo "<td>".$row['delivery_date']."</td>";

      echo "<td>".$row['note']."</td>";
      
      echo '<td><a href="orderedit.php? User Id='.$row['user_ID'].'&Order Name=' .$row['oname'].'&Order Quantity='.$row['oquantity'].'&Order Date='.$row['order_date'].'&Delivery Date='.$row['delivery_date'].'&Note='.$row['note'].'">Edit</a> || <a href="orderdelete.php?id=' .$row['oid'].'">Delete</a></td>';
      echo "</tr>";

    
    }
    echo "</table>";
   }
   else
   {
    echo "No data found.<br/>";
   }



    ?>

     </div>  
  
  <div class="footer">
    <p>Copyright © 2020</p>
  </div>
</div>
</body>
</html>
