<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

include "includes/connect.php";
?>

<!DOCTYPE html>
<html>
<head>

<title>Teacher</title>

<link rel="stylesheet" href="css/style.css">



</head>

<body>

<?php include "includes/header.php"; ?>
<?php include "includes/sidebar.php"; ?>

<div class="sidebar">

<h2>Dashboard</h2>

<ul>

<li><a href="dashboard.php">🏠 Dashboard</a></li>
<li><a href="teacher.php">📚 Teacher</a></li>
<li><a href="logout.php">🚪 Logout</a></li>

</ul>

</div>

<div class="content">

<h1>Teacher</h1>

<br>

<a href="add_teacher.php" class="btn">
+ Add New Teacher
</a>
<a href="excelteacher.php"><input type="submit" name="excel" value="Download Data (Excel)" class="btn primary"></a>
<br><br>

<table>

<tr>

<th>ID</th>
<th>Name</th>
<th>Age</th>
<th>Address</th>
<th>Salary</th>
<th>Action</th>

</tr>

<?php

$sql="SELECT * FROM teacher ORDER BY id DESC";

$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= htmlspecialchars($row['name']); ?></td>

<td><?= htmlspecialchars($row['age']); ?></td>

<td><?= htmlspecialchars($row['address']); ?></td>

<td><?= $row['salary']; ?></td>

<td>

<a href="edit_teacher.php?id=<?= $row['id']; ?>">Edit</a>

|

<a href="delete_teacher.php?id=<?= $row['id']; ?>"
   onclick="return confirm('Are you sure you want to delete this teacher?');">

    Delete`	   

</a>

</td>

</tr>

<?php
}
?>

</table>

</div>

</body>

</html>