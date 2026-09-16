<?php

include "includes/connect.php";

$fullname = trim($_POST['fullname']);
$email = trim($_POST['email']);
$username = trim($_POST['username']);
$password = $_POST['password'];
$confirm = $_POST['confirm_password'];

if($password != $confirm){
    die("Passwords do not match.");
}

$sql = "SELECT * FROM users
WHERE username='$username'
OR email='$email'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
    die("Username or Email already exists.");
}

$password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users(fullname,email,username,password)
VALUES('$fullname','$email','$username','$password')";

if(mysqli_query($conn,$sql)){
    header("Location: login.php");
}else{
    echo "Registration Failed.";
}

?>