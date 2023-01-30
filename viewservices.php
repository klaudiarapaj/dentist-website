<!DOCTYPE html>

<head>
    <title>View Services</title>
    <link rel="stylesheet" href="css/userlist.css" />
</head>


<?php
include_once('adminnavbar.php');
include('db.php');

// Number of results to show per page
$per_page = 5;
// Figure out the total number of results in DB:

$result = mysqli_query($conn, "SELECT * FROM services");
$total_results = mysqli_num_rows($result);
// Figure out the total number of pages. Always round up using ceil()
$total_pages = ceil($total_results / $per_page);
// Get the current page or set a default
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


echo "<p><a href='serviceslist.php'>View All </a> | <b>View Page:</b> ";
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<a href='viewservices.php?page=$i'>$i</a> ";
}
echo "</p>";
$query = "SELECT * FROM services order by id ASC LIMIT $start, $per_page";
$result = mysqli_query($conn, $query);
// shfaqi si tabele
echo "<table border='1' cellpadding='10'>";
echo "<tr> <th>ID</th> <th>Service Name</th> <th>Service Description</th> <th>Edit</th> <th>Delete</th> </tr>";

// bej nje cikel per ti bredhur te gjitha
while ($row = mysqli_fetch_array($result)) {

    echo '<tr>
      
        <td>' . $row["id"] . '</td>
        <td>' . $row["service"] . '</td>
        <td>' . $row["description"] . '</td>
        
        <td><a  href="editservice.php?id=' . $row['id'] . '" >Edit</a></td>
		<td><a  href="deleteservices.php?id=' . $row['id'] . '">Delete</a></td>
     </tr>';
}

echo "</table>";


?>

<p><a href="newservice.php">Add Service</a></p>
</body>

</html>