<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

<title>User Registration</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body class="login-body">

<div class="login-box">

<h2>Create Account</h2>

<form action="save_user.php" method="POST">

<input type="text"
name="fullname"
placeholder="Full Name"
required>

<input type="email"
name="email"
placeholder="Email Address"
required>

<input type="text"
name="username"
placeholder="Username"
required>

<input type="password"
name="password"
placeholder="Password"
required>

<input type="password"
name="confirm_password"
placeholder="Confirm Password"
required>

<button type="submit">
Register
</button>

<br><br>

Already have an account?

<a href="login.php">Login</a>

</form>

</div>

</body>
</html>