<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/userlist.css" />

    <script>
    function ConfirmDelete() {
            return confirm("Are you sure you want to delete this service?");
        }
    </script>
</head>

<body>

    <div class="review-container">

        <?php

        include('db.php');
        include_once('adminnavbar.php');

        $result = mysqli_query($conn, "SELECT * FROM reviews order by rating DESC")
            or die("Error: " . mysqli_error($conn));

        echo "<p> View All | <a href='viewreviews.php?page=1'>View with pages</a></p> </p>";
        echo "<table border='1' cellpadding='10'>";
        echo "<tr> <th>ID</th> <th>Name</th> <th>Review</th> <th>Rating</th> <th>Approve</th> <th>Delete</th> </tr>";
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $review = $row['review'];
            $rating = $row['rating'];
            $approved = $row['approved'];

            echo "<tr>";
            echo '<td>' . $id . '</td>';
            echo '<td>' . $name . '</td>';
            echo '<td>' . $review . '</td>';
            echo '<td>';
            for ($i = 0; $i < $rating; $i++) {
                echo '<i class="fas fa-star"></i>';
            }
            echo '</td>';

        ?>

            <td>
                <form name='Approve' action='approvereview.php?id=<?php echo $row['id']; ?> ' method='post' />
                <input type="submit" value="Approve" /></form>
            <td>
                <form name='Delete' action='deletereview.php?id=<?php echo $row['id']; ?> ' method='post' />
                <input type="submit" value="Delete" Onclick="return ConfirmDelete()" />
                </form>
            </td>
        <?php

            echo "</tr>";
        }
        echo "</table>";
        ?>

    </div>
</body>

</html>


</html>