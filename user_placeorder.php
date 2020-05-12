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

  <li><a href="nuser.php">Dashboard</a></li>
  <li><a href="user_view.php?userName=<?php echo $userName; ?>">View Profile</a></li>
  <li><a href="user_edit.php">Edit Profile</a></li>
  <li><a href="user_changepic.php">Change Profile Picture</a></li>
  <li><a href="user_changepass.php">Change Password</a></li>
  <li><a href="user_placeorder.php">Place Order</a></li>
  
  <li><a href="logout.php">Logout</a></li>
</ul>  
  </div>
  <div class="middle" style="background-color:#bbb;"><?php
    $name=$_SESSION['name'];
    echo "<h5>Welcome $name</h5>";
    ?>

</div>
    <div class="middle" style="background-color:#bbb;"><?php
    $name=$_SESSION['name'];
    echo "<h5>Contact : +8801521216225 </h5>";
    echo "<h5>Contact : +8801754062482 </h5>";
      ?>
    </div>
  <div class="footer">
    <p>Copyright © 2020</p>
  </div>
</div>
</body>
</html>


