<?php
session_start();
include_once('db.php');
?>

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

   <!-- header section starts  -->

   <?php
   include_once('navbar.php');

   ?>
   <!-- header section ends -->

   <!-- home section starts  -->

   <section class="home" id="home">

      <div class="container">

         <div class="row min-vh-100 align-items-center">
            <div class="content text-center text-md-left">
               <h3>A perfect smile, guaranteed.</h3>
               <p>We are a dental clinic dedicated to the highest levels of dentistry and health and oral surgery.
                  DentalZone offers the best prices for the best services.
                  We use the latest technology for dental care to develop the smile of your dreams!</p>
               <a href="#contact" class="link-btn">Make Appointment</a>

            </div>
         </div>

      </div>

   </section>

   <!-- home section ends -->

   <!-- about section starts  -->

   <section class="about" id="about">

      <div class="container">

         <div class="row align-items-center">

            <div class="col-md-6 image">
               <img src="images/aboutus.jpeg" class="w-100 mb-5 mb-md-0" alt="">
            </div>

            <div class="col-md-6 content">
               <span>About us</span>
               <h3>Caring for all your family’s dental needs.</h3>
               <p>DentalZone is the first clinic that offers a new way of dental service in Albania. Conceived to offer Western standards thanks to the staff's experience in these countries, DentalZone strictly adheres to Western dental protocols. Make your reservation now!</p>
               <a href="#contact" class="link-btn">Make Appointment</a>
            </div>

         </div>

      </div>

   </section>

   <!-- about section ends -->

   <!-- services section starts  -->

   <section class="services" id="services">

      <h1 class="heading">Our services</h1>

      <div class="box-container container">

         <?php
         $sql = mysqli_query($conn, "SELECT * FROM `services`");
         while ($row = mysqli_fetch_assoc($sql)) { ?>

            <div class="box">


               <h3><?php echo $row['service'] ?></h3>
               <p><?php echo $row['description'] ?></p>
            </div>
         <?php
         } ?>


      </div>

   </section>

   <!-- services section ends -->

   <!-- process section starts  -->

   <section class="process">

      <h1 class="heading">Work process</h1>

      <div class="box-container container">

         <div class="box">
            <img src="images/process-1.png" alt="">
            <h3>Cosmetic Dentistry</h3>
            <p>Although it may be very painful, at the end of the day it's beautiful and it makes you feel fulfilled.</p>
         </div>

         <div class="box">
            <img src="images/process-2.png" alt="">
            <h3>Pediatric Dentistry</h3>
            <p>Your kids will be in safe hands, we take special care in making their time at our clinic as fun as it can get.</p>
         </div>

         <div class="box">
            <img src="images/process-3.png" alt="">
            <h3>Dental Implants</h3>
            <p>Missing something? We got you. We can bring back that smile you have been missing.</p>
         </div>

      </div>

   </section>

   <!-- process section ends -->

   <!-- reviews section starts  -->

   <section class="reviews" id="reviews">

      <h1 class="heading"> Satisfied Clients </h1>


      <div class="revieww-container container">
         <?php
         $sql = mysqli_query($conn, "SELECT * FROM `reviews` WHERE approved=1 ");


         if (mysqli_num_rows($sql) > 0) {
            // Output the reviews

            while ($row = mysqli_fetch_assoc($sql)) { ?>
               <div class="boxx">
                  <h2> <?php echo $row['name'] ?></h2>
                  <p><?php echo $row['review'] ?></p>
                  <div><?php for ($i = 0; $i < $row['rating']; $i++) {
                           echo '<i class="fas fa-star"></i>';
                        } ?></div>

               </div>

         <?php }
         } else {?><div style="margin:0 auto;">
            <?php echo "No reviews found.";} ?>
          </div>
          
         <div class="add-review-container">
            <form action="reviewform.php" method="post">
               <input id="addrev" type="submit" value="Add a Review" Onclick />
            </form>
         </div>
      </div>


   </section>


   <!-- reviews section ends -->

   <!-- contact section starts  -->

   <section class="contact" id="contact">

      <h1 class="heading">Make Appointment</h1>

      <form action="makeapp.php" method="post">

         <span>Your Name :</span>
         <input type="text" name="name" placeholder="enter your name" class="box" required>
         <span>Your Email :</span>
         <input type="email" name="email" placeholder="enter your email" class="box" required>
         <span>Your Number :</span>
         <input type="number" name="number" placeholder="enter your number" class="box" required>
         <span>Appointment Date :</span>
         <input type="datetime-local" name="date" class="box" required>

         <input type="submit" id="menubtn" value="Make Appointment" name="submit" class="link-btn" Onclick>
      </form>

   </section>

   <!-- contact section ends -->

   <!-- footer section starts  -->

   <section class="footer">

      <div class="box-container container">

         <div class="box">
            <i class="fas fa-phone"></i>
            <h3>Phone Number</h3>
            <p>+355-456-7890</p>
            <p>+355-222-3333</p>
         </div>

         <div class="box">
            <i class="fas fa-map-marker-alt"></i>
            <h3>Our Address</h3>
            <p>Don Boskon, Tirane</p>
         </div>

         <div class="box">
            <i class="fas fa-clock"></i>
            <h3>Opening Hours</h3>
            <p>9:00am to 8:00pm</p>
         </div>

         <div class="box">
            <i class="fas fa-envelope"></i>
            <h3>Email Address</h3>
            <p>krapaj20@epoka.edu.al</p>
            <p>sosmani20@epoka.edu.al</p>
         </div>

      </div>

      <div class="credit"> &copy; Copyright @ <?php echo date('Y'); ?> by <span>Group 1</span> </div>

   </section>

   <!-- footer section ends -->










   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>