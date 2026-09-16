<?php

session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Course</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php include "includes/header.php"; ?>

<?php include "includes/sidebar.php"; ?>


<div class="content">

    <h2>Add New Course</h2>


    <div class="form-container">

        <form action="insert_course.php" method="POST">


            <div class="form-group">

                <label>Course Name</label>

                <input
                    type="text"
                    name="course_name"
                    placeholder="Enter course name"
                    required
                >

            </div>


            <div class="form-group">

                <label>Description</label>

                <textarea
                    name="description"
                    placeholder="Enter course description"
                    rows="5"
                ></textarea>

            </div>


            <div class="form-group">

                <label>Course Amount (₦)</label>

                <input
                    type="number"
                    name="amount"
                    min="0"
                    step="0.01"
                    placeholder="Enter course amount"
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
                    placeholder="Enter amount paid"
                    required
                >

            </div>


            <button type="submit" class="btn-save">
                Save Course
            </button>


            <a href="courses.php" class="btn-cancel">
                Cancel
            </a>


        </form>

    </div>

</div>

</body>

</html>