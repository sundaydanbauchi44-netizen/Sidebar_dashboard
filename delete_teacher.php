<?php

session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

include "includes/connect.php";


// Check if an ID was provided

if(!isset($_GET['id'])){
    header("Location: teacher.php");
    exit();
}


$id = intval($_GET['id']);


// Prevent the logged-in teacher from deleting their own account

if($id == $_SESSION['id']){

    echo "<script>
            alert('You cannot delete your own account while logged in.');
            window.location.href='teacher.php';
          </script>";

    exit();
}


// Delete the teacher

$sql = "DELETE FROM teacher WHERE id=$id";


if(mysqli_query($conn, $sql)){

    header("Location: teacher.php");
    exit();

}else{

    echo "Error deleting teacher: " . mysqli_error($conn);

}

?>