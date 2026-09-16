<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Add User</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php include "includes/header.php"; ?>

<div class="sidebar">

<h2>Dashboard</h2>

<ul>

<li><a href="dashboard.php">Dashboard</a></li>
<li><a href="users.php">Manage Users</a></li>

</ul>

</div>

<div class="content">

<h2>Add New User</h2>

<div class="form-container">

<form action="insert_user.php" method="POST">

<div class="form-group">
<label>Full Name</label>
<input type="text" name="fullname" required>
</div>

<div class="form-group">
<label>Email Address</label>
<input type="email" name="email" required>
</div>

<div class="form-group">
<label>Username</label>
<input type="text" name="username" required>
</div>

<div class="form-group">
<label>Password</label>
<input type="password" name="password" required>
</div>

<button type="submit" class="btn-save">
Save User
</button>

<a href="users.php" class="btn-cancel">
Cancel
</a>

</form>

</div>

</div>

</body>

</html>