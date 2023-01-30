

<?php
include('db.php');

//change the approve status of a review to 1
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE reviews SET approved = 1 WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: index.php#reviews");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}