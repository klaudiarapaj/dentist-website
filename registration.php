<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Registration</title>
    
    <link rel="stylesheet" href="css/register.css" />
    
</head>

<body>
    <?php
    include_once('usernavbar.php');
    require('db.php');

    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $create_datetime = date("Y-m-d H:i:s");

        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $query);
       

    $rows = mysqli_num_rows($result);
    if ($rows == 0) {
        // Register new user
        $query    = "INSERT into `users` (username, password, email, create_datetime)
        VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: profile.php");
        } else {
            echo "<div class='form'>
                <h3>Registration failed.</h3><br/>
                <p class='link'>Click here to <a href='registration.php'>try again</a>.</p>
                </div>";
        }
    } else {
        echo "<div class='form'>
            <h3>Username already taken.</h3><br/>
            <p class='link'>Please choose a different username.</p>
            <p class='link'>Click here to <a href='registration.php'>try again</a>.</p>
            </div>";
    }
} else {
?>
    <form class="form" method="post" name="registration">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" />
        <input type="text" class="login-input" name="email" placeholder="Email Address" />
        <input type="password" class="login-input" name="password" placeholder="Password" />
        <input type="submit" value="Register" name="submit" class="login-button" />
        <p class="link"><a href="login.php">Already have an account?</a></p>
    </form>
<?php
}
?>






</body>

</html>