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

<title>Manage Users</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php include "includes/header.php"; ?>
<?php include "includes/sidebar.php"; ?>

<div class="sidebar">

<h2>Dashboard</h2>

<ul>

<li><a href="dashboard.php">🏠 Dashboard</a></li>
<li><a href="users.php">👥 Manage Users</a></li>
<li><a href="logout.php">🚪 Logout</a></li>

</ul>

</div>

<div class="content">

<h1>Manage Users</h1>

<br>

<a href="add_user.php" class="btn">
+ Add New User
</a>

<br><br>

<table>

<tr>

<th>ID</th>
<th>Full Name</th>
<th>Email</th>
<th>Username</th>
<th>Created</th>
<th>Action</th>

</tr>

<?php

$sql="SELECT * FROM users ORDER BY id DESC";

$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= htmlspecialchars($row['fullname']); ?></td>

<td><?= htmlspecialchars($row['email']); ?></td>

<td><?= htmlspecialchars($row['username']); ?></td>

<td><?= $row['created_at']; ?></td>

<td>

<a href="edit_user.php?id=<?= $row['id']; ?>">Edit</a>

|

<a href="delete_user.php?id=<?= $row['id']; ?>"
   onclick="return confirm('Are you sure you want to delete this user?');">

    Delete

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