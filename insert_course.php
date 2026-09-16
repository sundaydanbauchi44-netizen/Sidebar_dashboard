<?php

session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

include "includes/connect.php";


$course_name = trim($_POST['course_name']);

$description = trim($_POST['description']);

$amount = floatval($_POST['amount']);

$amount_paid = floatval($_POST['amount_paid']);


// Make sure payment isn't greater than course amount

if($amount_paid > $amount){

    die("Amount paid cannot be greater than the course amount.");

}


$sql = "INSERT INTO courses
        (course_name, description, amount, amount_paid)

        VALUES
        ('$course_name',
         '$description',
         '$amount',
         '$amount_paid')";


if(mysqli_query($conn, $sql)){

    header("Location: courses.php");

    exit();

}else{

    echo "Error: " . mysqli_error($conn);

}

?>