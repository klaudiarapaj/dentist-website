<?php
include_once('usernavbar.php');
include('db.php');
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'logindb') or die('connection failed');

if (!isset($_SESSION['username'])) {
   header("Location: login.php");
   die();
}

?>

<html>

<head>
  <title>Review Form</title>
  <link rel="stylesheet" type="text/css" href="css/reviewform.css">
  

</head>

<body>


  <form action="addreview.php" method="POST">
    <h1>Leave a Review</h1>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>
    <label for="review">Review:</label>
    <textarea id="review" name="review" rows="5" cols="40" required></textarea><br><br>
    <label for="rating">Rating:</label>
    <span class="rating">
      <input type="radio" id="star1" name="rating" value="1" required>
      <label for="star1" class="star"></label>
      <input type="radio" id="star2" name="rating" value="2">
      <label for="star2" class="star"></label>
      <input type="radio" id="star3" name="rating" value="3">
      <label for="star3" class="star"></label>
      <input type="radio" id="star4" name="rating" value="4">
      <label for="star4" class="star"></label>
      <input type="radio" id="star5" name="rating" value="5">
      <label for="star5" class="star"></label>
    </span>
    <br><br>
    <input type="submit" value="Submit">
  </form>

</body>

</html>
