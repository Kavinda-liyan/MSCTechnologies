
<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'msctechnologies') or die(mysqli_error($mysqli));

if (isset($_POST['save'])) {
    // Get other form data
    $headline = $_POST['headline'];
    $ctext = $_POST['ctext'];

    // Check if a file was uploaded
    if (!empty($_FILES['icover']['name'])) {
        // Define the target directory for uploaded images
        $target_dir = "../upload/Servicepage/";
        $cover = $_FILES['icover']['name'];
        $target = $target_dir . basename($cover);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['icover']['tmp_name'], $target)) {
            // Insert the banner information into the database, including image data
            $sql = "INSERT INTO servicepage (headline, context, cover) VALUES (?, ?, ?)";
            $stmt = $mysqli->prepare($sql);

            // Bind parameters to the SQL statement
            $stmt->bind_param("sss", $headline, $ctext, $cover);

            // Execute the SQL statement
            $result = $stmt->execute();

            if ($result) {
                $_SESSION['message'] = "Item Has Been Inserted!";
                $_SESSION['type'] = "alert-success";
                header("location: updateservice.html");
            } else {
                $_SESSION['message'] = "Can't Insert Item! Try Again!";
                $_SESSION['type'] = "alert-danger";
                header("location: error.html");
            }
        } else {
            $_SESSION['message'] = "File upload failed!";
            $_SESSION['type'] = "alert-danger";
            header("location: error.html");
        }
    } else {
        $_SESSION['message'] = "No file selected!";
        $_SESSION['type'] = "alert-warning";
        header("location: error.html");
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="./index.css">
</head>
<body>
    <section>
        <div class="container-fluid ">
          <div class="row">
            <!--SIDE BAR-->
            <div class="col-lg-3 col-md-4 pull-left sidebarcontent">
            <?php include('./sidebar.php') ?>
            </div>

            <div class="col-lg-9 col-md-8 pull-left rightslidebar">
              <div class="head"> <h1>Service Page</h1></div>
                <div class="Banner-container">
                    <h3>Main Banner</h3>
                    <div class="form-group">
                        <form method="POST" action="servicepage.php" enctype="multipart/form-data">
                            <label>Headline</label>
                            <br>
                            <input type="text" class="form-control" name="headline"  placeholder="Service etc.." required/>
                            <br>
                            <label>Context</label>
                            <br>
                            <input type="text" class="form-control" name="ctext"  placeholder="Content etc.." required/>
                            <br>
                            <label>Image</label>
                            <br>
                            <input type="file" class="form-control" name="icover"  placeholder="Background cover etc.." required/>
                            <input type="submit" value="save" class="save" name="save">



                        </form>
                    </div>
                </div>




                <?php


$mysqli = new mysqli('localhost', 'root', '', 'msctechnologies') or die(mysqli_error($mysqli));


if (isset($_POST['save'])) {
    // Get other form data
    $uheadline = $_POST['updateheadline'];
    $uctext = $_POST['updatectext'];

    // Check if a file was uploaded
    if (!empty($_FILES['updateicover']['name'])) {
        // Define the target directory for uploaded images
        $target_dir = "../upload/Homepage/servicepage/";
        $ucover = $_FILES['updateicover']['name'];
        $target = $target_dir . basename($cover);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['updateicover']['tmp_name'], $target)) {
            // Update the banner information in the database, including image data
            $sql = "UPDATE servicepage SET headline=?, cover=?, context=?";
            $stmt = $mysqli->prepare($sql);

            // Bind parameters to the SQL statement
            $stmt->bind_param("sss", $uheadline,  $uctext, $ucover);

            // Execute the SQL statement
            $result = $stmt->execute();

            if ($result) {
                $_SESSION['message'] = "Item Has Been Updated!";
                $_SESSION['type'] = "alert-success";
                header("location: Updateservice.html");
            } else {
                $_SESSION['message'] = "Can't Update Item! Try Again!";
                $_SESSION['type'] = "alert-danger";
                header("location: error.html");
            }
        } else {
            $_SESSION['message'] = "File upload failed!";
            $_SESSION['type'] = "alert-danger";
            header("location: error.html");
        }
    } else {
        $_SESSION['message'] = "No file selected!";
        $_SESSION['type'] = "alert-warning";
        header("location: error.html");
    }
}
?>






            </div>
          </div>