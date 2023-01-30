<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        function ConfirmDelete() {
            return confirm("Are you sure you want to delete this appointment?");
        }
    </script>
<link rel="stylesheet" href="css/userlist.css" />
</head>

<body>

    <?php
    include_once('adminnavbar.php');
    include('db.php');

    $result = mysqli_query($conn, "SELECT * FROM appointments")
        or die("Error: " . mysqli_error($conn));

    echo "<p> View All | <a href='viewappointments.php?page=1'>View with pages</a></p> </p>";

    echo "<table border='1' cellpadding='10'>";
    echo "<tr> <th>ID</th> <th>Full Name</th> <th>Email</th> <th>Number</th> <th>Appointment Date</th> <th>Delete</th> </tr>";

    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $fullname = $row['fullname'];
        $email = $row['email'];
        $number = $row['number'];
        $date = $row['date'];

        echo "<tr>";
        
        echo "<td>$id</td>";
        echo "<td>$fullname</td>";
        echo "<td>$email</td>";
        echo "<td>$number</td>";
        echo "<td>$date</td>";
    ?>

        <td>
            <form name='Delete' action='deleteappointment.php?id=<?php echo $row['id']; ?> ' method='post' />
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