<?php

session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

include "includes/connect.php";


$id = intval($_POST['id']);

$name = trim($_POST['name']);

$class = trim($_POST['class']);

$address = trim($_POST['address']);

$age = $_POST['age'];


// Check if another student already has this address or name

$sql = "SELECT id FROM student
        WHERE (address='$address' OR name='$name')
        AND id != $id";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){

    die("address or name already belongs to another student.");

}

    $sql = "UPDATE student SET

            name='$name',

            class='$class',

            address='$address',

            age='$age'

            WHERE id=$id";

{

    $sql = "UPDATE student SET

            name='$name',

            class='$class',

            address='$address',
			
			age='$age'

            WHERE id=$id";

}


if(mysqli_query($conn, $sql)){

    header("Location: student.php");

    exit();

}else{

    echo "Error updating student: " . mysqli_error($conn);

}

?>