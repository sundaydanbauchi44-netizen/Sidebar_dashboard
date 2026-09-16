<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?>

<div class="header">

    <div class="logo">
        Welcome to hackman Service
    </div>

    <div class="user-info">

        Welcome,
        <strong><?php echo htmlspecialchars($_SESSION['fullname']); ?></strong>

        |
        <a href="logout.php">Logout</a>

    </div>

</div>