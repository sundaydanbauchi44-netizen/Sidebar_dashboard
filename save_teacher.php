<?php

include "includes/connect.php";

$name = trim($_POST['name']);
$age = trim($_POST['age']);
$address = trim($_POST['address']);
$salary = $_POST['salary'];

$sql = "INSERT INTO teacher(name,age,address,salary)
VALUES('$name','$age','$address','$salary')";

if(mysqli_query($conn,$sql)){
    header("Location: login.php");
}else{
    echo "Registration Failed.";
}

?>