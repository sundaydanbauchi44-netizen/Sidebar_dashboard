<?php

include "includes/connect.php";

$fullname=$_POST['fullname'];
$email=$_POST['email'];
$username=$_POST['username'];

$password=password_hash($_POST['password'],PASSWORD_DEFAULT);

$sql="INSERT INTO users(fullname,email,username,password)

VALUES(

'$fullname',

'$email',

'$username',

'$password'

)";

mysqli_query($conn,$sql);

header("Location: users.php");