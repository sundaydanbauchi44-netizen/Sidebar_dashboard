<?php

session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

include "includes/connect.php";


// Check if an ID was provided

if(!isset($_GET['id'])){
    header("Location: student.php");
    exit();
}


$id = intval($_GET['id']);


// Prevent the logged-in student from deleting their own account

if($id == $_SESSION['id']){

    echo "<script>
            alert('You cannot delete your own account while logged in.');
            window.location.href='student.php';
          </script>";

    exit();
}


// Delete the student

$sql = "DELETE FROM student WHERE id=$id";


if(mysqli_query($conn, $sql)){

    header("Location: student.php");
    exit();

}else{

    echo "Error deleting student: " . mysqli_error($conn);

}

?>