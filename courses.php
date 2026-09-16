<?php

session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

include "includes/connect.php";

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Courses</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php include "includes/header.php"; ?>

<?php include "includes/sidebar.php"; ?>


<div class="content">

    <h2>Course Management</h2>

    <br>

    <a href="add_course.php" class="btn">
        + Add New Course
    </a>

    <br><br>


    <table>

        <tr>

            <th>ID</th>

            <th>Course Name</th>

            <th>Description</th>

            <th>Amount</th>

            <th>Amount Paid</th>

            <th>Balance</th>

            <th>Action</th>

        </tr>


        <?php

        $sql = "SELECT * FROM courses ORDER BY id DESC";

        $result = mysqli_query($conn, $sql);


        while($row = mysqli_fetch_assoc($result)){

            $balance = $row['amount'] - $row['amount_paid'];

        ?>

        <tr>

            <td>
                <?= $row['id']; ?>
            </td>

            <td>
                <?= htmlspecialchars($row['course_name']); ?>
            </td>

            <td>
                <?= htmlspecialchars($row['description']); ?>
            </td>

            <td>
                ₦<?= number_format($row['amount'], 2); ?>
            </td>

            <td>
                ₦<?= number_format($row['amount_paid'], 2); ?>
            </td>

            <td>
                ₦<?= number_format($balance, 2); ?>
            </td>

            <td>

                <a href="edit_course.php?id=<?= $row['id']; ?>">
                    Edit
                </a>

                |

                <a
                    href="delete_course.php?id=<?= $row['id']; ?>"
                    onclick="return confirm('Are you sure you want to delete this course?');"
                >
                    Delete
                </a>

            </td>

        </tr>

        <?php

        }

        ?>

    </table>

</div>

</body>

</html>