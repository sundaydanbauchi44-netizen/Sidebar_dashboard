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

<title>Student</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php include "includes/header.php"; ?>
<?php include "includes/sidebar.php"; ?>

<div class="sidebar">

<h2>Dashboard</h2>

<ul>

<li><a href="dashboard.php">🏠 Dashboard</a></li>
<li><a href="student.php">📚 Student</a></li>
<li><a href="logout.php">🚪 Logout</a></li>

</ul>

</div>

<div class="content">

<h1>Student</h1>

<br>

<a href="add_student.php" class="btn">
+ Add New Student
</a>

<br><br>

<table>

<tr>

<th>ID</th>
<th>Name</th>
<th>class</th>
<th>Address</th>
<th>age</th>
<th>Action</th>

</tr>

<?php

$sql="SELECT * FROM student ORDER BY id DESC";

$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= htmlspecialchars($row['name']); ?></td>

<td><?= htmlspecialchars($row['class']); ?></td>

<td><?= htmlspecialchars($row['address']); ?></td>

<td><?= $row['age']; ?></td>

<td>

<a href="edit_student.php?id=<?= $row['id']; ?>">Edit</a>

|

<a href="delete_student.php?id=<?= $row['id']; ?>"
   onclick="return confirm('Are you sure you want to delete this student?');">

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