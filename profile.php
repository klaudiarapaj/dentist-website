<?php
//include auth_session.php file on all user panel pages

include_once('usernavbar.php');
include("auth_session.php");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="css/myprofile.css" />
</head>

<body>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are now on the dashboard page.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>

</html>