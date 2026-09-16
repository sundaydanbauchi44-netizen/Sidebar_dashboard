<?php

include "includes/connect.php";

$name = trim($_POST['name']);
$class = trim($_POST['class']);
$address = trim($_POST['address']);
$age = $_POST['age'];

$sql = "INSERT INTO student(name,class,address,age)
VALUES('$name','$class','$address','$age')";

if(mysqli_query($conn,$sql)){
    header("Location: login.php");
}else{
    echo "Registration Failed.";
}

?>