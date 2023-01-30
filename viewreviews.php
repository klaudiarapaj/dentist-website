<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/userlist.css" />

    <style>
        table, th, td, tr{
            font-size:16px;
        }
    </style>
</head>

<body>
    <div class="review-container">
        <?php
        include_once('adminnavbar.php');
        include('db.php');
        $per_page = 5;
        $result = mysqli_query($conn, "SELECT * FROM reviews");
        $total_results = mysqli_num_rows($result);
        $total_pages = ceil($total_results / $per_page);

        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $show_page = $_GET['page'];
            // Make sure the $show_page value is valid
            if ($show_page > 0 && $show_page <= $total_pages) {
                $start = ($show_page - 1) * $per_page;
                $end = $start + $per_page;
            } else {
                // error - show first set of results
                $start = 0;
                $end = $per_page;
            }
        } else {
            // if page isn't set, show first set of results
            $start = 0;
            $end = $per_page;
        }

        echo "<p><a href='reviewslist.php'>View All </a> | <b>View Page:</b> ";
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='viewreviews.php?page=$i'>$i</a> ";
        }
        echo "</p>";
        $query = "SELECT * FROM reviews order by rating DESC LIMIT $start, $per_page";
        $result = mysqli_query($conn, $query);
        // shfaqi si tabele
        echo "<table class='tblsize' border='1' cellpadding='10'>";
        echo "<tr> <th>ID</th> <th>Name</th> <th>Review</th> <th>Rating</th> <th>Approve</th> <th>Delete</th> </tr>";
        // bej nje cikel per ti bredhur te gjitha
        while ($row = mysqli_fetch_array($result)) {

            echo '<tr>
          
            <td>' . $row["id"] . '</td>
            <td>' . $row["name"] . '</td>
            <td>' . $row["review"] . '</td>
            <td>';
            for ($i = 0; $i < $row["rating"]; $i++) {
                echo '<i class="fas fa-star"></i>';
            }
            echo '</td>
            

            <td><a  href="approvereview.php?id=' . $row['id'] . '" >Approve</a></td>
            <td><a  href="deletereview.php?id=' . $row['id'] . '">Delete</a></td>

         </tr>';
        }

        echo "</table>";


        ?>
    </div>
</body>

</html>