<?php 
include('header.php');
include('./connection/dbconnection.php');
?>
<?php
$mysqli = new mysqli('localhost', 'root', '', 'msctechnologies') or die(mysqli_error($mysqli));

// Fetch banner data from the database
$sql = "SELECT mbanner, sbanner, ctext, cover FROM banner LIMIT 1";
$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $mbanner = $row['mbanner'];
    $sbanner = $row['sbanner'];
    $ctext = $row['ctext'];
    $cover = $row['cover'];
} else {
    // Handle the case where no banner data is found
    $mbanner = '';
    $sbanner = '';
    $ctext = '';
    $cover = ''; // You may set a default image if needed
}


$sql = "SELECT header,slide1,slide2,slide3,slide4 FROM slide ";
$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $header = $row['header'];
    $slide1 = $row['slide1'];
    $slide2 = $row['slide2'];
    $slide3 = $row['slide3'];
    $slide4 = $row['slide4'];

} else {
    // Handle the case where no banner data is found
    $header = '';
    $slide1 = '';
    $slide2 = '';
    $slide3 = '';
    $slide4 = ''; // You may set a default image if needed
}


$sql = "SELECT header,context,email,mobile,mobile2,address,address2,image FROM about ";
$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $header = $row['header'];
    $context = $row['context'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $mobile2 = $row['mobile2'];
    $address = $row['address'];
    $address2 = $row['address2'];
    $image = $row['image'];

} else {
    // Handle the case where no banner data is found
    $header = '';
    $context = '';
    $email = '';
    $mobile = '';
    $address = '';
    $image = ''; // You may set a default image if needed
}


// Close the database connection
$mysqli->close();
?>
<?php 
if (isset($_POST['postcmt'])) {
    // Get other form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment= $_POST['comment'];
    
    if(empty($name)|| empty($email) || empty($comment)){
        echo '<script>alert("All field should Required")</script>';
    }
    else{
        $mysqli = new mysqli('localhost', 'root', '', 'msctechnologies') or die(mysqli_error($mysqli));
        $INSERT = "INSERT INTO comment (name,email,comment) VALUES (?,?,?)";
                        $stmt = $mysqli->prepare($INSERT);
                        $stmt->bind_param("sss", $name,$email,$comment);

                        if ($stmt->execute()) {
                            echo '<script>alert("Comment submitted successfully")</script>';
                        } else {
                            echo '<script>alert("Error: ' . $stmt->error . '")</script>';
                        }
                        $stmt->close();
                        $mysqli->close();
                        
    }
  
    
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MscTechnologies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="./Style/Navbar.css" rel="stylesheet">
    <link href="./Style/Home.css" rel="stylesheet">

    <style>
        .Content::before {    
    content: "";
    background-image: url('./upload/Homepage/<?php echo $cover; ?>');
    background-size: cover;
    position: absolute;
    top: 0px;
    right: 0px;
    bottom: 0px;
    left: 0px;
    opacity: 0.5;
}
.Content2::before{
  content: "";
    background-color: aliceblue;
    position: absolute;
    top: 0px;
    right: 0px;
    bottom: 0px;
    left: 0px;
    opacity: 1;
}
.contents2{
    margin-left: auto;
    margin-right: auto;
    background-color: aliceblue;
    text-align: center;
}
.form-group{
    margin: 1rem;
    padding: 1rem;
}
.form-group label{
    padding: 1rem;
}
.form-group input{
    border-radius: 0.2rem;
    border-style: none;
    background-color: aquamarine;
}
.form-group textarea{
    border-radius: 0.2rem;
    border-style: none;
    background-color: aquamarine;
}
    </style>

</head>
<body>
    <?php include('./navbar.php') ?>
    
     
        <div class="container1">
        <div class="Content2">
            <div class="container2au">

            
            <h3><span><i class="fa fa-info-circle"></i></span> <?php echo $header; ?></h3>
            <div class="row">
              <div class="col-4">
              <img src="./upload/<?php echo $image; ?>" alt="./upload/<?php echo $image; ?>" >
              </div>
              <div class="col-8">
              <p> "<?php echo $context; ?>"</p>
              </div>
            </div>
            
            
            <hr>
            <div class="row">
              <div class="col-4"> <p> <span><i class="fa fa-envelope"></i></span> Email:<br>   <?php echo $email; ?></p></div>
              <div class="col-4"><p><span><i class="fa fa-phone"></i></span> Phone:<br> <?php echo $mobile; ?></p>
              <p><span></span><?php echo $mobile2; ?></p></div>
              <div class="col-4"><p><span><i class="fa fa-location"></i></span> Address:<br> <?php echo $address; ?><br><?php echo $address2; ?></p>
              </div>
            </div>
            <hr>
            
            </div>
            
        </div>
        <div class="contents2" >
                <h3>Contact Us</h3>
                <form method="post" class="form-group m-2 p-2" action="aboutus.php">
                <lable>Your Name:</lable><br>
                <input type="text" name="name">
                <br>
                <label>Your Email:</label><br>
                <input type="email" name="email">
                <br>
                <label>message:</label>
                <br>
                <textarea name="comment" rows="4" cols="30"></textarea>
                <br>
                <input type="submit" value="post Comment" name="postcmt" class="btn btn-primary py-2" style="color:black;">
                </form>
                

            </div>
        </div>
        



<?php include('./component/footer.php') ?>

      
   

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>