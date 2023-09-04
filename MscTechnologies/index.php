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


// Close the database connection
$mysqli->close();
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
    </style>

</head>
<body>
    <?php include('./navbar.php') ?>
    
      <div class="container1">
        <div class="Content">
            <div class="container2">

            <h1><span class="glow"><?php echo $mbanner; ?></span>  </h1>
            <h3><?php echo $sbanner; ?></h3>
            <p> "<?php echo $ctext; ?>"</p>
                
                <button class="discoverBtn"> Discover More..</button>
            </div>
        </div>

        </div>

        

        <div class="slideshow-container">
        <div >
        <h2 class="w3-center"><?php echo $header; ?></h2>
        </div>

<div class="w3-content w3-display-container">
  <img class="mySlides" src="./upload/Homepage/slide/<?php echo $slide1; ?>" alt="<?php echo $slide1; ?>" >
  <img class="mySlides" src="./upload/Homepage/slide/<?php echo $slide2; ?>" alt="<?php echo $slide2; ?>" >
  <img class="mySlides" src="./upload/Homepage/slide/<?php echo $slide3; ?>" alt="<?php echo $slide2; ?>" >
  <img class="mySlides" src="./upload/Homepage/slide/<?php echo $slide4; ?>" alt="<?php echo $slide2; ?>" >

  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
</div>

        </div>
        <div class="container1">
        <div class="Content2">
            <div class="container2au">

            
            <h3><?php echo $sbanner; ?></h3>
            <p> "<?php echo $ctext; ?>"</p>
            <img src="./HomepageBG1.jpg" >
            </div>
        </div>

        </div>
        

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>

<?php include('./component/footer.php') ?>

      
   

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>