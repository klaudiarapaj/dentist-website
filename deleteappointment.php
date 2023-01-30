<?php

//delete review
include("db.php");
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM appointments WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed.");
    } 

    $_SESSION['message'] = 'Appointment Removed Successfully';
    $_SESSION['message_type'] = 'danger';
    header('Location: appointmentslist.php');
} else {
    header('Location: appointmentslist.php');
}
