<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/userlist.css">
    <script>
        function ConfirmDelete() {
            return confirm("Are you sure you want to delete this user?");
        }
    </script>


</head>

<body>

    <?php
    include_once('adminnavbar.php');
    include('db.php');

    $result = mysqli_query($conn, "SELECT * FROM users")
        or die("Error: " . mysqli_error($conn));

    echo "<p> View All | <a href='viewusers.php?page=1'>View with pages</a></p> </p>";

    echo "<table border='1' cellpadding='10' class='ledger-table'>";
    echo "<tr> <th>ID</th> <th>Username</th> <th>Email</th> <th>Password</th> <th>Created</th> <th>Delete</th> </tr>";


    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $username = $row['username'];
        $email = $row['email'];
        $password = $row['password'];
        $create_datetime = $row['create_datetime'];

        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$username</td>";
        echo "<td>$email</td>";
        echo "<td>$password</td>";
        echo "<td>$create_datetime</td>";
    ?>
        <td>
            <form name='Delete' action='deleteuser.php?id=<?php echo $row['id']; ?> ' method='post' />
            <input type="submit" value="Delete" Onclick="return ConfirmDelete()" />

            </form>
        </td>
    <?php

        echo "</tr>";
    }

    echo "</table>";

    ?>


</body>

</html>