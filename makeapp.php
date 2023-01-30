<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'logindb') or die('connection failed');

include('db.php');
if (isset($_POST['submit'])) {
   if (!isset($_SESSION['username'])) {
      header("Location: login.php");
      die();
   }

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $date = $_POST['date'];

   $insert = mysqli_query($conn, "INSERT INTO `appointments`(fullname, email, number, date) VALUES('$name','$email','$number','$date')") or die('query failed');


   header('Location: index.php');
}

?>