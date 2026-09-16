<?php

session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

include "includes/connect.php";


$id = intval($_POST['id']);

$name = trim($_POST['name']);

$age = trim($_POST['age']);

$address = trim($_POST['address']);

$salary = $_POST['salary'];


// Check if another teacher already has this address or name

$sql = "SELECT id FROM teacher
        WHERE (address='$address' OR name='$name')
        AND id != $id";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){

    die("address or name already belongs to another teacher.");

}

    $sql = "UPDATE teacher SET

            name='$name',

            age='$age',

            address='$address',

            salary='$salary'

            WHERE id=$id";

{

    $sql = "UPDATE teacher SET

            name='$name',

            age='$age',

            address='$address',
			
			salary='$salary'

            WHERE id=$id";

}


if(mysqli_query($conn, $sql)){

    header("Location: teacher.php");

    exit();

}else{

    echo "Error updating teacher: " . mysqli_error($conn);

}

?>