<?php
include_once('adminnavbar.php');
include('db.php');

if (isset($_POST['name']) && isset($_POST['review']) && isset($_POST['rating'])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $review = mysqli_real_escape_string($conn, $_POST['review']);
  $rating = mysqli_real_escape_string($conn, $_POST['rating']);

  $sql = "INSERT INTO reviews (name, review, rating, approved)
  VALUES ('$name', '$review', '$rating', 0)";

  mysqli_query($conn, $sql)  or die(mysqli_error($conn));

  header("Location: index.php");
}

mysqli_close($conn);
?>
