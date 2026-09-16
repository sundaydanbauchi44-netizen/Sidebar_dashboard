<?php

session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

include "includes/connect.php";


$id = intval($_POST['id']);

$fullname = trim($_POST['fullname']);

$email = trim($_POST['email']);

$username = trim($_POST['username']);

$password = $_POST['password'];


// Check if another user already has this email or username

$sql = "SELECT id FROM users
        WHERE (email='$email' OR username='$username')
        AND id != $id";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){

    die("Email or Username already belongs to another user.");

}


// Update password only if a new password was entered

if(!empty($password)){

    $hashed_password =
        password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE users SET

            fullname='$fullname',

            email='$email',

            username='$username',

            password='$hashed_password'

            WHERE id=$id";

}else{

    $sql = "UPDATE users SET

            fullname='$fullname',

            email='$email',

            username='$username'

            WHERE id=$id";

}


if(mysqli_query($conn, $sql)){

    header("Location: users.php");

    exit();

}else{

    echo "Error updating user: " . mysqli_error($conn);

}

?>