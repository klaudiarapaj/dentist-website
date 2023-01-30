<?php

function showForm($first, $last, $error)
{
?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <title>Add new service</title>
        <link rel="stylesheet" href="css/addservice.css" />
    </head>

    <body>
        <?php
        include_once('adminnavbar.php');
        // if there are any errors, display them
        if ($error != '') {
            echo '<div style="padding:4px; border:1px solid red; color:red;">' . $error . '</div>';
        }
        ?>

        <form action="" method="post">
            <div class="regi">

                <strong>Service name: *</strong> <input type="text" name="service" value="<?php echo $first; ?>" /><br />
                <strong>Service description: *</strong> <input type="text" name="description" value="<?php echo $last; ?>" /><br />
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
        <p><a id="back" href="serviceslist.php">Back</a></p>
    </body>

    </html>
<?php
}




// lidhja me databazen
include('db.php');

// check if the form has been submitted. If it has, start to process the form and save it to the database
if (isset($_POST['submit'])) {
    // get form data, making sure it is valid
    $service = mysqli_real_escape_string($conn, htmlspecialchars($_POST['service']));
    $description = mysqli_real_escape_string($conn, htmlspecialchars($_POST['description']));

    // check to make sure both fields are entered
    if ($service == '' || $description == '') {
        // if they are not, display an error message
        $error = 'Fill both spaces!';

        // if there is an error, display the form
        showForm($service, $description, $error);
    } else {
        // add the data to the database
        mysqli_query($conn, "INSERT services SET service='$service', description='$description'")
            or die(mysqli_error($conn));



        // after save redirect to view page
        header("Location: viewservices.php");
    }
} else
// this is the first time the form is displayed
{
    showForm('', '', '');
}
?>