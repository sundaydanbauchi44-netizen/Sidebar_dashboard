<?php

session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

include "includes/connect.php";


// Check if an ID was provided

if(!isset($_GET['id'])){
    header("Location: users.php");
    exit();
}


$id = intval($_GET['id']);


// Prevent the logged-in user from deleting their own account

if($id == $_SESSION['id']){

    echo "<script>
            alert('You cannot delete your own account while logged in.');
            window.location.href='users.php';
          </script>";

    exit();
}


// Delete the user

$sql = "DELETE FROM users WHERE id=$id";


if(mysqli_query($conn, $sql)){

    header("Location: users.php");
    exit();

}else{

    echo "Error deleting user: " . mysqli_error($conn);

}

?>