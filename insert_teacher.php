<?php

include "includes/connect.php";

$name=$_POST['name'];
$age=$_POST['age'];
$address=$_POST['address'];
$salary=$_POST['salary'];


$sql="INSERT INTO teacher(name,age,address,salary)

VALUES(

'$name',

'$age',

'$address',

'$salary'

)";

mysqli_query($conn,$sql);

header("Location: teacher.php");