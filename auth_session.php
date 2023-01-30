
    


    <?php

 session_start();
if(!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
} 
  /*  if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    else
    {
        session_destroy();
        session_start(); 
    } */
?>
