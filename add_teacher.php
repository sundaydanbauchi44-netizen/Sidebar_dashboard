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

<title>Add Teacher</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php include "includes/header.php"; ?>

<div class="sidebar">

<h2>Dashboard</h2>

<ul>

<li><a href="dashboard.php">Dashboard</a></li>
<li><a href="teacher.php">Teacher</a></li>

</ul>

</div>

<div class="content">

<h2>Add New Teacher</h2>

<div class="form-container">

<form action="insert_teacher.php" method="POST">

<div class="form-group">
<label> Name</label>
<input type="text" name="name" required>
</div>

<div class="form-group">
<label>Age</label>
<input type="age" name="age" required>
</div>

<div class="form-group">
<label>Address</label>
<input type="address" name="address" required>
</div>

<div class="form-group">
<label>Salary</label>
<input type="salary" name="salary" required>
</div>

<button type="submit" class="btn-save">
Save Teacher
</button>

<a href="teacher.php" class="btn-cancel">
Cancel
</a>

</form>

</div>

</div>

</body>

</html>