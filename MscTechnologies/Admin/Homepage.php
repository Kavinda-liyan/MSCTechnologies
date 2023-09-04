<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'msctechnologies') or die(mysqli_error($mysqli));

if (isset($_POST['save'])) {
    // Get other form data
    $mbanner = $_POST['mbanner'];
    $sbanner = $_POST['sbanner'];
    $ctext = $_POST['ctext'];

    // Check if a file was uploaded
    if (!empty($_FILES['icover']['name'])) {
        // Define the target directory for uploaded images
        $target_dir = "../upload/Homepage/";
        $cover = $_FILES['icover']['name'];
        $target = $target_dir . basename($cover);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['icover']['tmp_name'], $target)) {
            // Update the banner information in the database, including image data
            $sql = "UPDATE banner SET mbanner=?, sbanner=?, ctext=?, cover=?";
            $stmt = $mysqli->prepare($sql);

            // Bind parameters to the SQL statement
            $stmt->bind_param("ssss", $mbanner, $sbanner, $ctext, $cover);

            // Execute the SQL statement
            $result = $stmt->execute();

            if ($result) {
                $_SESSION['message'] = "Item Has Been Updated!";
                $_SESSION['type'] = "alert-success";
                header("location: UpdateHome.html");
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


// UpdateSlide
if (isset($_POST['slidesave'])) {
  // Get other form data
  $header = $_POST['header'];
  

  // Check if a file was uploaded
  if (!empty($_FILES['slide1']['name']) && !empty($_FILES['slide2']['name']) && !empty($_FILES['slide3']['name']) && !empty($_FILES['slide4']['name']) ) {
      // Define the target directory for uploaded images
      $target_dir = "../upload/Homepage/slide/";
      $cover1 = $_FILES['slide1']['name'];
      $cover2 = $_FILES['slide2']['name'];
      $cover3 = $_FILES['slide3']['name'];
      $cover4 = $_FILES['slide4']['name'];
      $target = $target_dir . basename($cover1);
      $target = $target_dir . basename($cover2);
      $target = $target_dir . basename($cover3);
      $target = $target_dir . basename($cover4);

      // Move the uploaded file to the target directory
      if (move_uploaded_file($_FILES['slide1']['tmp_name'], $target . $_FILES['slide1']['name']) &&
      move_uploaded_file($_FILES['slide2']['tmp_name'], $target . $_FILES['slide2']['name']) &&
      move_uploaded_file($_FILES['slide3']['tmp_name'], $target . $_FILES['slide3']['name']) &&
      move_uploaded_file($_FILES['slide4']['tmp_name'], $target . $_FILES['slide4']['name'])) {
          // Update the banner information in the database, including image data
          $sql = "UPDATE slide SET header=?, slide1=?, slide2=?, slide3=?, slide4=?";
          $stmt = $mysqli->prepare($sql);

          // Bind parameters to the SQL statement
          $stmt->bind_param("sssss", $header, $cover1, $cover2, $cover3,$cover4);

          // Execute the SQL statement
          $result = $stmt->execute();

          if ($result) {
              $_SESSION['message'] = "Item Has Been Updated!";
              $_SESSION['type'] = "alert-success";
              header("location: UpdateHome.html");
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




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
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
                    <a href="store.php?brand=MSI" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-users"></i><span class="p-2  ">View Users</span></li>
                    </a>
                    <a href="store.php?brand=ASUS" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-truck-loading"></i><span class="p-2 ">Pending Oders</span></li>
                    </a>
                    <a href="store.php?brand=DELL" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-question-circle"></i><span class="p-2 ">FAQs</span></li>
                    </a>
                    <a href="store.php?brand=DELL" class="nav-link linkhover">
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
                      <li class="list-group-item list-group-item" style="background-color:aqua;"><i class="fa fa-gears"></i><span class="p-2  " >Home Page</span></li>
                    </a>
                    <a href="servicepage.php" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-gears"></i><span class="p-2 ">Service Page</span></li>
                    </a>
                    
                    
                  </ul>
                </div>


              </div>
            </div>

            <div class="col-lg-9 col-md-8 pull-left">
              <div class="head"> <h1>Home Page</h1></div>
            <div class="row">
              <div class="col-4">
              <div class="Banner-container">
                    <h3>Main Banner</h3>
                    <div class="form-group">
                        <form method="POST" action="Homepage.php" enctype="multipart/form-data">
                            <label>Main Banner Text</label>
                            <br>
                            <input type="text" class="form-control" name="mbanner"  placeholder="Company Name etc.." required/>
                            <br>
                            <label>Sub Banner Text</label>
                            <br>
                            <input type="text" class="form-control" name="sbanner"  placeholder="Sub Title etc.." required/>
                            <br>
                            <label>Content Text</label>
                            <br>
                            <input type="text" class="form-control" name="ctext"  placeholder="Content etc.." required/>
                            <br>
                            <label>Cover</label>
                            <br>
                            <input type="file" class="form-control" name="icover"  placeholder="Background cover etc.." required/>
                            <input type="submit" value="save" class="save" name="save">



                        </form>
                    </div>
                </div>

              </div>

              <div class="col-4">
                <!-- Slideshow -->

                <div class="Banner-container">
                    <h3>SlideShow</h3>
                    <div class="form-group">
                        <form method="POST" action="Homepage.php" enctype="multipart/form-data">
                            <label>Header</label>
                            <br>
                            <input type="text" class="form-control" name="header"  placeholder="Company Name etc.." required/>
                            <br>
                            <label>Slide 1</label>
                            <br>
                            <input type="file" class="form-control" name="slide1"  placeholder="Background cover etc.." required/>
                            <label>Slide 2</label>
                            <br>
                            <input type="file" class="form-control" name="slide2"  placeholder="Background cover etc.." required/>
                            <label>Slide 3</label>
                            <br>
                            <input type="file" class="form-control" name="slide3"  placeholder="Background cover etc.." required/>
                            <label>Slide 4</label>
                            <br>
                            <input type="file" class="form-control" name="slide4"  placeholder="Background cover etc.." required/>
                            <input type="submit" value="Save" class="save" name="slidesave">



                        </form>
                    </div>
                </div>

              </div>
              <div class="col-4">
              <div class="Banner-container">
                    <h3>About Us..</h3>
                    <div class="form-group">
                        <form method="POST" action="Homepage.php" enctype="multipart/form-data">
                            <label>Header</label>
                            <br>
                            <input type="text" class="form-control" name="headerabout"  placeholder="Company Name etc.." required/>
                            <br>
                            <label>Context</label>
                            <br>
                            <input type="text" class="form-control" name="contextabout"  placeholder="Context etc.." required/>
                            <br>
                            <label>Contact 1<sub>EMail</sub></label>
                            <br>
                            <input type="text" class="form-control" name="emailabout"  placeholder="Email etc.." required/>
                            <br>
                            <label>Contact 2<sub>Mobile</sub></label>
                            <br>
                            <input type="text" class="form-control" name="mobileabout"  placeholder="Mobile etc.." required/>
                            <br>
                            <label>Address<sub>Company</sub></label>
                            <br>
                            <input type="text" class="form-control" name="addressabout"  placeholder="Address etc.." required/>
                            <br>
                            <label>Image</label>
                            <input type="file" class="form-control" name="imageabout"  placeholder="Background cover etc.." required/>
                            <input type="submit" value="Save" class="save" name="aboutsave">



                        </form>
                    </div>
                </div>

              </div>
            </div>
            
                


                

            </div>
          </div>
        </div>
    </section>
</body>
</html>