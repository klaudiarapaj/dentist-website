<?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true) {
   header("Location: admin.php");
   exit();
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Complete Responsive Dentist Website Design Tutorial</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <header class="header fixed-top">

      <div class="container">

         <div class="row align-items-center justify-content-between">

            <a href="index.php" class="logo">Dental<span>Zone.</span></a>

            <nav class="nav">

               <a href="index.php">Home</a>
               <a href="#about">About</a>
               <a href="#services">Services</a>
               <a href="#reviews">Reviews</a>
               <a href="#contact">Contact</a>
               <?php
               if (isset($_SESSION['username'])) {

                  if ($_SESSION['username'] == "klau") {
                     echo '<nav>
            <ul>
                <li>   <a href="admin.php">Admin</a></li>
            </ul>
         </nav>';
                  } else {

                     echo '<nav>
            <ul>
                <li><a href="profile.php">Profile</a></li>
            </ul>
        </nav>';
                  }
               } else {
                  echo '<nav>
            <ul>
                <li><a href="login.php">Log In</a></li>
            </ul>
        </nav>';
               } ?>
            </nav>

            <a href="#contact" class="link-btn">Make Appointment</a>
            <div id="menu-btn" class="fas fa-bars"></div>

         </div>

      </div>

   </header>

</body>

</html>