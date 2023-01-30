<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        function ConfirmPost() {
            return confirm("Are you sure you want to post this service?");
        }

        function ConfirmDelete() {
            return confirm("Are you sure you want to delete this service?");
        }
    </script>
    <link rel="stylesheet" href="css/userlist.css" />

</head>

<body>

    <?php
    include_once('adminnavbar.php');
    include('db.php');

    $result = mysqli_query($conn, "SELECT * FROM services")
        or die("Error: " . mysqli_error($conn));

    echo "<p> View All | <a href='viewservices.php?page=1'>View with pages</a></p> </p>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr> <th>ID</th> <th>Service Name</th> <th> Service Description</th><th>Edit</th> <th>Delete</th> </tr>";
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $service = $row['service'];
        $description = $row['description'];

        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$service</td>";
        echo "<td>$description</td>";
    ?>

        <td>
            <form name='Edit' action='editservice.php?id=<?php echo $row['id']; ?> ' method='post' />
            <input type="submit" value="Edit" /> </form>
        <td>
            <form name='Delete' action='deleteservices.php?id=<?php echo $row['id']; ?> ' method='post' />
            <input type="submit" value="Delete" Onclick="return ConfirmDelete()" />
            </form>
        </td>
    <?php

        echo "</tr>";
    }
    echo "</table>";
    ?>

    <p><a class="addservice" href="newservice.php">Add Service</a></p>

</body>

</html>