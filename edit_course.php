<?php

session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

include "includes/connect.php";

if(!isset($_GET['id'])){
    header("Location: courses.php");
    exit();
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM courses WHERE id=$id";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) != 1){
    header("Location: courses.php");
    exit();
}

$course = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Course</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php include "includes/header.php"; ?>

<?php include "includes/sidebar.php"; ?>


<div class="content">

    <h2>Edit Course</h2>


    <div class="form-container">

        <form action="update_course.php" method="POST">


            <!-- Course ID -->

            <input
                type="hidden"
                name="id"
                value="<?= $course['id']; ?>"
            >


            <div class="form-group">

                <label>Course Name</label>

                <input
                    type="text"
                    name="course_name"
                    value="<?= htmlspecialchars($course['course_name']); ?>"
                    required
                >

            </div>


            <div class="form-group">

                <label>Description</label>

                <textarea
                    name="description"
                    rows="5"
                ><?= htmlspecialchars($course['description']); ?></textarea>

            </div>


            <div class="form-group">

                <label>Course Amount (₦)</label>

                <input
                    type="number"
                    name="amount"
                    min="0"
                    step="0.01"
                    value="<?= $course['amount']; ?>"
                    required
                >

            </div>


            <div class="form-group">

                <label>Amount Paid (₦)</label>

                <input
                    type="number"
                    name="amount_paid"
                    min="0"
                    step="0.01"
                    value="<?= $course['amount_paid']; ?>"
                    required
                >

            </div>


            <button type="submit" class="btn-save">

                Update Course

            </button>


            <a href="courses.php" class="btn-cancel">

                Cancel

            </a>


        </form>

    </div>

</div>

</body>

</html>