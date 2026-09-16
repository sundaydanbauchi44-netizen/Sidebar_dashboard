<?php

session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

include "includes/connect.php";

if(!isset($_GET['id'])){
    header("Location: users.php");
    exit();
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM users WHERE id=$id";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) != 1){
    header("Location: users.php");
    exit();
}

$user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit User</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php include "includes/header.php"; ?>

<?php include "includes/sidebar.php"; ?>


<div class="content">

    <h2>Edit User</h2>

    <div class="form-container">

        <form action="update_user.php" method="POST">

            <!-- Hidden User ID -->

            <input
                type="hidden"
                name="id"
                value="<?php echo $user['id']; ?>"
            >


            <div class="form-group">

                <label>Full Name</label>

                <input
                    type="text"
                    name="fullname"
                    value="<?php echo htmlspecialchars($user['fullname']); ?>"
                    required
                >

            </div>


            <div class="form-group">

                <label>Email Address</label>

                <input
                    type="email"
                    name="email"
                    value="<?php echo htmlspecialchars($user['email']); ?>"
                    required
                >

            </div>


            <div class="form-group">

                <label>Username</label>

                <input
                    type="text"
                    name="username"
                    value="<?php echo htmlspecialchars($user['username']); ?>"
                    required
                >

            </div>


            <div class="form-group">

                <label>New Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Leave blank to keep current password"
                >

                <small>
                    Leave this field empty if you don't want to change the password.
                </small>

            </div>


            <button type="submit" class="btn-save">
                Update User
            </button>


            <a href="users.php" class="btn-cancel">
                Cancel
            </a>

        </form>

    </div>

</div>

</body>

</html>