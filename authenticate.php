<?php

session_start();

include "includes/connect.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users
WHERE username='$username'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==1){

    $row = mysqli_fetch_assoc($result);

    if(password_verify($password,$row['password'])){

        $_SESSION['id']=$row['id'];
        $_SESSION['fullname']=$row['fullname'];

        header("Location: dashboard.php");
        exit();

    }else{

        echo "Incorrect Password.";

    }

}else{

    echo "Username not found.";

}

?>