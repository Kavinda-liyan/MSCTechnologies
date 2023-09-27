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
  
  $header = $_POST['header'];

  
  if (!empty($_FILES['slide1']['name']) && !empty($_FILES['slide2']['name']) && !empty($_FILES['slide3']['name']) && !empty($_FILES['slide4']['name'])) {
      
      $target_dir = "../upload/Homepage/slide/";
      $cover1 = $_FILES['slide1']['name'];
      $cover2 = $_FILES['slide2']['name'];
      $cover3 = $_FILES['slide3']['name'];
      $cover4 = $_FILES['slide4']['name'];
      $target1 = $target_dir . basename($cover1);
      $target2 = $target_dir . basename($cover2);
      $target3 = $target_dir . basename($cover3);
      $target4 = $target_dir . basename($cover4);

      
      if (
          move_uploaded_file($_FILES['slide1']['tmp_name'], $target1) &&
          move_uploaded_file($_FILES['slide2']['tmp_name'], $target2) &&
          move_uploaded_file($_FILES['slide3']['tmp_name'], $target3) &&
          move_uploaded_file($_FILES['slide4']['tmp_name'], $target4)
      ) {
          // Update the banner information in the database, including image data
          $sql = "UPDATE slide SET header=?, slide1=?, slide2=?, slide3=?, slide4=?";
          $stmt = $mysqli->prepare($sql);

          // Bind parameters to the SQL statement
          $stmt->bind_param("sssss", $header, $cover1, $cover2, $cover3, $cover4);

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



if (isset($_POST['aboutsave'])) {
  // Get other form data
  $headerabout = $_POST['headerabout'];
  $contextabout = $_POST['contextabout'];
  $emailabout= $_POST['emailabout'];
  $mobileabout= $_POST['mobileabout'];
  $mobileabout2= $_POST['mobileabout2'];
  $addressabout= $_POST['addressabout'];
  $addressabout2= $_POST['addressabout2'];

  // Check if a file was uploaded
  if (!empty($_FILES['imageabout']['name'])) {
      // Define the target directory for uploaded images
      $target_dir = "../upload/Homepage/";
      $imageabout = $_FILES['imageabout']['name'];
      $target = $target_dir . basename($imageabout);

      // Move the uploaded file to the target directory
      if (move_uploaded_file($_FILES['imageabout']['tmp_name'], $target)) {
          // Update the banner information in the database, including image data
          $sql = "UPDATE about SET header=?, context=?, email=? , mobile=?,mobile2=?, address=?,address2=?, image=?";
          $stmt = $mysqli->prepare($sql);

          // Bind parameters to the SQL statement
          $stmt->bind_param("sssiisss", $headerabout, $contextabout, $emailabout, $mobileabout,$mobileabout2,$addressabout,$addressabout2,$imageabout);

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
            <?php include('./sidebar.php') ?>
            </div>

            <div class="col-lg-9 col-md-8 pull-left rightslidebar">
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
                            <label>Contact 1<sub style="color:#002244">&nbsp;&nbsp;EMail</sub></label>
                            <br>
                            <input type="text" class="form-control" name="emailabout"  placeholder="Email etc.." required/>
                            <br>
                            <div class="row">
                              <div class="col-6">
                              <label>Contact<sub style="color:#002244">&nbsp;&nbsp;Mobile</sub></label>
                            <br>
                            <input type="number" class="form-control" name="mobileabout"  placeholder="Mobile etc.." required/>
                            <br>

                              </div>
                              <div class="col-6">
                              <label>Contact<sub style="color:#002244">&nbsp;&nbsp;Mobile2</sub></label>
                            <br>
                            <input type="number" class="form-control" name="mobileabout2"  placeholder="Mobile etc.." required/>
                            <br>

                              </div>
                            </div>
                            
                            <div class="row">
                              <div class="col-6">
                              <label>Address<sub style="color:#002244">&nbsp;&nbsp;1</sub></label>
                            <br>
                            <input type="text" class="form-control" name="addressabout"  placeholder=""address line1" required/>
                            <br>

                              </div>
                              <div class="col-6">
                              <label>Address<sub style="color:#002244">&nbsp;&nbsp;2</sub></label>
                            <br>
                            <input type="text" class="form-control" name="addressabout2"  placeholder="address line2" required/>
                            <br>
                              </div>
                            </div>
                            
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