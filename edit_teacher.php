<?php

session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

include "includes/connect.php";

if(!isset($_GET['id'])){
    header("Location: teacher.php");
    exit();
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM teacher WHERE id=$id";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) != 1){
    header("Location: teacher.php");
    exit();
}

$teacher = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Teacher</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php include "includes/header.php"; ?>

<?php include "includes/sidebar.php"; ?>


<div class="content">

    <h2>Edit Teacher</h2>

    <div class="form-container">

        <form action="update_teacher.php" method="POST">

            <!-- Teacher ID -->

            <input
                type="hidden"
                name="id"
                value="<?php echo $teacher['id']; ?>"
            >


            <div class="form-group">

                <label>Name</label>

                <input
                    type="text"
                    name="name"
                    value="<?php echo htmlspecialchars($teacher['name']); ?>"
                    required
                >

            </div>


            <div class="form-group">

                <label>Age</label>

                <input
                    type="number"
                    name="age"
                    value="<?php echo htmlspecialchars($teacher['age']); ?>"
                    required
                >

            </div>


            <div class="form-group">

                <label>Address</label>

                <input
                    type="text"
                    name="address"
                    value="<?php echo htmlspecialchars($teacher['address']); ?>"
                    required
                >

</div>


            <div class="form-group">

                <label>Salary</label>

                <input
                    type="salary"
                    name="salary"
                    value="<?php echo htmlspecialchars($teacher['salary']); ?>"
                    required
                >

            </div>


            <button type="submit" class="btn-save">
			
                Update Teacher
				
            </button>


            <a href="teacher.php" class="btn-cancel">
			
                Cancel
            </a>

        </form>

    </div>

</div>

</body>

</html>