
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
              <div class="sbar">
                <!--Side Bar DASH-->
                <div class="card mb-3" style="background-color: rgba(255, 255, 255, 0.125);">
                  <img class="logoimg" src="../Images/MSCLogo.png" alt="msctech">
    
                  <p class="justify-content-center text-light text-center " style=" font-family: Verdana, Arial, Helvetica, sans-serif; ">Welcome Admin</p>
                  
                  <ul class="list-group m-3 categories logoutbtn" style=" font-weight: bold;">
                  <li class="list-group-item list-group-item-dark hoverlist logoutbtn"  ><a class="logout" href="logout.php"> Logout</a> <span class="p-2"></span></li>
                  </ul>
                  <ul class="list-group m-0 categories " style=" font-weight: bold;">
                  <a href="Dashbord.php" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-tachometer"></i><span class="p-2  ">Dashbord</span></li>
                    </a>
                  </ul>
                 
                </div>
                <!--Side Product-->
                <div class="card mb-1" style="background-color: rgba(255, 255, 255, 0.125);">
    
                  <h4 class="justify-content-center text-light text-center py-1" style=" font-family: Verdana, Arial, Helvetica, sans-serif; ">Products</h4>
        
                  <ul class="list-group m-1 categories" style=" font-weight: bold;">
                    <a href="viewproducts.php" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-sitemap"></i><span class="p-2  ">View Products</span></li>
                    </a>
                    <a href="addproducts.php" class="nav-link linkhover">
                      <li class="list-group-item list-group-item" ><i class="fa fa-add"></i><span class="p-2 ">Add Products</span></li>
                    </a>
                   
                    
                  </ul>
                </div>
                <!--Side Product Close-->

                <!--Coustomers -->
                <div class="card mb-1 " style="background-color: rgba(255, 255, 255, 0.125);">
    
                  <h4 class="justify-content-center text-light text-center py-1" style=" font-family: Verdana, Arial, Helvetica, sans-serif; ">Customers</h4>
        
                  <ul class="list-group m-1 categories" style="background-color: rgba(255, 255, 255, 0.125); font-weight: bold;">
                    <a href="viewuser.php" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-users"></i><span class="p-2  ">View Users</span></li>
                    </a>
                    <a href="store.php?brand=ASUS" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-truck-loading"></i><span class="p-2 ">Pending Oders</span></li>
                    </a>
                    <a href="viewfaq.php" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-question-circle"></i><span class="p-2 ">FAQs</span></li>
                    </a>
                    <a href="viewmessage.php" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-message"></i><span class="p-2 ">Massages</span></li>
                    </a>
                    
                  </ul>
                </div>
                <!--Coustomers close -->

                <!--Page Edit-->
                <div class="card mb-1" style="background-color: rgba(255, 255, 255, 0.125);">
    
                  <h4 class="justify-content-center text-light text-center py-1" style=" font-family: Verdana, Arial, Helvetica, sans-serif; ">Website</h4>
        
                  <ul class="list-group m-1 categories" style="background-color: rgba(255, 255, 255, 0.125); font-weight: bold;">
                    <a href="Homepage.php" class="nav-link linkhover">
                      <li class="list-group-item list-group-item" "><i class="fa fa-gears"></i><span class="p-2  " >Home Page</span></li>
                    </a>
                    <a href="servicepage.php" class="nav-link linkhover">
                      <li class="list-group-item list-group-item" style="background-color:aqua;"><i class="fa fa-gears"></i><span class="p-2 ">Service Page</span></li>
                    </a>
                    
                    
                  </ul>
                </div>


              </div>
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