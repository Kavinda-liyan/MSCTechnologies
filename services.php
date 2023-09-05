<?php 
include('header.php');
include('./connection/dbconnection.php');
?>
<?php
$mysqli = new mysqli('localhost', 'root', '', 'msctechnologies') or die(mysqli_error($mysqli));

// Fetch banner data from the database
$query = 'SELECT * FROM servicepage';
$book = mysqli_query($mysqli, $query); 
$right = $mysqli->query($query);
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
    <link href="./Style/service.css" rel="stylesheet">

</head>
<body>
    <?php include('./navbar.php') ?>
    <div class="servicebg ">

    
    <?php
                          while ($row = mysqli_fetch_array($book))  
                          { 
                            echo'
      <div class="containerservice container ">
      <hr>
        <div class="row service-bg glow-on-hover-r">
            <div class="col-3">
            <img src="./upload/Servicepage/'.$row["cover"].'">
                

            </div>
            <div class="col-3">
               
            <h3>'.$row["headline"].'</h3>
            </div>
            <div class="col-6">
                <p>'.$row["context"].'
                </p>

            </div>
        </div>
        <hr>
        
        

        </div>
                         ' ;}
                         ?>
                         </div>
<?php include('./component/footer.php') ?>

      
   

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>