<?php

//delete services
include ('db.php');
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM services WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Service Removed Successfully';
    $_SESSION['message_type'] = 'danger';
    header('Location: serviceslist.php');
} else {
    header('Location: serviceslist.php');
}
