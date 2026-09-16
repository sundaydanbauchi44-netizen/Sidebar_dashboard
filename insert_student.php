<?php

include "includes/connect.php";

$name=$_POST['name'];
$class=$_POST['class'];
$address=$_POST['address'];
$age=$_POST['age'];


$sql="INSERT INTO student(name,class,address,age)

VALUES(

'$name',

'$class',

'$address',

'$age'

)";

mysqli_query($conn,$sql);

header("Location: student.php");