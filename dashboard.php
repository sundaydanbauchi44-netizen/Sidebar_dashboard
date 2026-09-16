<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Dashboard</title>

<link rel="stylesheet" href="css/style.css">

</head>



<body>

<?php include "includes/header.php"; ?>

<div class="sidebar">

<h2>Dashboard</h2>

<ul>

<li><a href="#">🏠 Home</a></li>

<li><a href="#">👥 Users</a></li>

<li><a href="users.php">?? Manage Users</a></li>

<li><a href="teacher.php">📚 Teacher</a></li>

<li><a href="student.php"> 📚 📊 Student</a></li>

<li><a href="courses.php">📚 Courses</a></li>

<li><a href="#">💰 Payments</a></li>

<li><a href="#">📊 Reports</a></li>

<li><a href="logout.php">🚪 Logout</a></li>

</ul>

</div>

<div class="content">

<h1>Dashboard</h1>

<p>Welcome to your dashboard.</p>

</div>

</body>
</html>