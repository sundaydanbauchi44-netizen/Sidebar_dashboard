<?php

session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

include "includes/connect.php";


$id = intval($_POST['id']);

$course_name = trim($_POST['course_name']);

$description = trim($_POST['description']);

$amount = floatval($_POST['amount']);

$amount_paid = floatval($_POST['amount_paid']);


// Make sure amount paid isn't greater than course amount

if($amount_paid > $amount){

    die("Amount paid cannot be greater than the course amount.");

}


$sql = "UPDATE courses SET

        course_name='$course_name',

        description='$description',

        amount='$amount',

        amount_paid='$amount_paid'

        WHERE id=$id";


if(mysqli_query($conn, $sql)){

    header("Location: courses.php");

    exit();

}else{

    echo "Error updating course: " . mysqli_error($conn);

}

?>