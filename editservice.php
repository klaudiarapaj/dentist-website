<?php


function editForm($id, $service, $description, $error)
{
?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <title>Edit Record</title>

        <link rel="stylesheet" href="css/addservice.css" />

    </head>

    <body>
        <?php
        include_once("adminnavbar.php");

        if ($error != '') {
            echo '<div style="padding:4px; border:1px solid red; color:red;">' . $error . '</div>';
        }
        ?>

        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <div>
                <p><strong>ID:</strong> <?php echo $id; ?></p>
                <strong>Service: *</strong> <input type="text" name="service" value="<?php echo $service; ?>" /><br />
                <strong>Description: *</strong> <input type="text" name="description" value="<?php echo $description; ?>" /><br />

                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </body>

    </html>
<?php
}

include('db.php');

if (isset($_POST['submit'])) {
    if (is_numeric($_POST['id'])) {
        //get form data, making sure it is valid
        $id = $_POST['id'];
        $service = mysqli_real_escape_string($conn, htmlspecialchars($_POST['service']));
        $description = mysqli_real_escape_string($conn, htmlspecialchars($_POST['description']));

        // check that firstname/lastname fields are both filled in
        if ($service == '' || $description == '') {
            $error = 'ERROR: Please fill in the space!';
            editForm($id, $service, $description, $error);
        } else {
            // save the data to the database
            mysqli_query($conn, "UPDATE services SET service='$service', description='$description' WHERE id='$id'")
                or die(mysqli_error($conn));
            header("Location: viewservices.php");
        }
    } else {
        echo 'Error!';
    }
} else {
    // if the 'id' variable is not valid, show an error
    if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
        $id = $_GET['id'];
        $result = mysqli_query($conn, "SELECT * FROM services WHERE id=$id")
            or die(mysqli_error($conn));
        $row = mysqli_fetch_array($result);

        // check that the 'id' matches up with a row in the database
        if ($row) {
            $service = $row['service'];
            $description = $row['description'];
            editForm($id, $service, $description, '');
        } else {
            echo "No results!";
        }
    } else {
        echo 'Error!';
    }
}
?>