<!DOCTYPE html>

<html lang="en">

<head>
<link rel="stylesheet" href="css/adminstyle.css">
</head>

<body>

<?php
include_once('adminnavbar.php');
session_start();

if(!isset($_SESSION['admin']) || $_SESSION['admin'] !== true || $_SESSION['username'] !== 'klau'){
    echo "<div class='error-message-center'><p></p>You don't have permission to access this page.</p></div>";
    exit();
}
?>
   

    <div class="admin">
        <h1 id="adminpage">Admin Page</h1>
        
        <h3 >Hey, <?php echo $_SESSION['username']; ?>!</h3>
        
        
        <form class="sections">
            <input type="button" value="Users List" onclick="window.location.href='userslist.php'" />
            <input type="button" value="Reviews List" onclick="window.location.href='reviewslist.php'" />
            <input type="button" value="Appointments List" onclick="window.location.href='appointmentslist.php'" />
            <input type="button" value="Services List" onclick="window.location.href='serviceslist.php'" />
        </form>

        <nav class="logout"><a href="logout.php">Logout</a></nav>

        
    </div>