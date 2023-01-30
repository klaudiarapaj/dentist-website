<?php

//delete review
include('db.php');
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM reviews WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Review Removed Successfully';
    $_SESSION['message_type'] = 'danger';
    header('Location: reviewslist.php');
} else {
    header('Location: reviewslist.php');
}
