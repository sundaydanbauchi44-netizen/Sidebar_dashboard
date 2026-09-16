<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body class="login-body">

<div class="login-box">

<h2>Login</h2>

<form action="authenticate.php" method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit">Login</button>
<br><br>

Don't have an account?

<a href="register.php">
Create Account
</a>

</form>

</div>

</body>
</html>