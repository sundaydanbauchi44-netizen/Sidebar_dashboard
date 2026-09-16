<?php

session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

include "includes/connect.php";


// Check if an ID was provided

if(!isset($_GET['id'])){
    header("Location: courses.php");
    exit();
}


$id = intval($_GET['id']);


// Prevent the logged-in course from deleting their own account

if($id == $_SESSION['id']){

    echo "<script>
            alert('You cannot delete your own account while logged in.');
            window.location.href='courses.php';
          </script>";

    exit();
}


// Delete the course

$sql = "DELETE FROM courses WHERE id=$id";


if(mysqli_query($conn, $sql)){

    header("Location: courses.php");
    exit();

}else{

    echo "Error deleting course: " . mysqli_error($conn);

}

?>