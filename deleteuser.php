
<?php
    include('db.php');

    //delete user from database
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM users WHERE id=$id";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query Failed.");
        }

        $_SESSION['message'] = 'User Removed Successfully';
        $_SESSION['message_type'] = 'danger';
        header('Location: userslist.php');
    } else {
        header('Location: userslist.php');
    }



    ?>
   