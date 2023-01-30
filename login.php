<?php
session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="css/register.css" />

</head>

<body>

    <?php
    include_once('usernavbar.php');
    require('db.php');

    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check if user exists in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                 AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query);

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            if ($username == "klau" && $password == "1234") {
                $_SESSION['admin'] = true;
                header("Location: admin.php");
            } else
                // Redirect to user dashboard page
                header("Location: profile.php");
        } else {
            echo "<div class='form'>
              <h3>Incorrect Username/password.</h3><br/>
              <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
              </div>";
        }
    } else {
    ?>
        <form class="form" method="post" name="login">
            <h1 class="login-title">Login</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" />
            <input type="password" class="login-input" name="password" placeholder="Password" />
            <input type="submit" value="Login" name="submit" class="login-button" />
            <p class="link"><a href="registration.php">New Registration</a></p>
        </form>
    <?php
    }
    ?>

</body>

</html>