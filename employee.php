<html>
<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {text-align: left;}
tr:hover {background-color:#f5f5f5;}
</style>
</head>
<body>

<?php
//$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql = "SELECT * FROM employee where name='".$_GET['q']."'";
$result = mysqli_query($con,$sql);


echo "<table border='1' cellpadding='8'>
<tr>
 		<th>Employee Id</th>
        <th>Employee Name</th>
        <th>Gender</th>
        <th>DOB</th>
        <th>Order Taken</th>
        <th>Deliver</th>
        <th>Actions</th>
</tr>";
?>
<?php
while($row = mysqli_fetch_array($result)) {
echo "<tr>";
	echo "<td>".$row['eid']."</td>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['gender']."</td>";
      echo "<td>".$row['dob']."</td>";
      echo "<td>".$row['order taken']."</td>";
      echo "<td>".$row['delivery']."</td>";
      
      echo '<td><a href="employee_edit.php? Employee Id='.$row['eid'].'&Employee Name=' .$row['name'].'&Gender='.$row['gender'].'&DOB='.$row['dob'].'">Edit</a> || <a href="employeedelete.php?eid=' .$row['eid'].'">Delete</a></td>';
echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>