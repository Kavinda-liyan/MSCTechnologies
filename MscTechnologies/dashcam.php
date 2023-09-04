<?php
include('header.php');
require './connection/dbconnection.php';
?>
<?php  
// Instantiate DB & connect
$mysqli = new mysqli('localhost', 'root', '', 'msctechnologies') or die(mysqli_error($mysqli)); 

$query = 'SELECT * FROM addpproducts WHERE category="DASHCAM"';
$book = mysqli_query($mysqli, $query); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHCAM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">  
    <link href="./Style/Home.css" rel="stylesheet">
    <link href="./Style/Navbar.css" rel="stylesheet">
    <link href="./Style/item.css" rel="stylesheet">
</head>
<body>
<?php include('./navbar.php') ?>
 
<section id="cart">
        <div class="Product-Sort">
            <div class="row">
                <div class="col-md-3 pull-left">
                    <h1 class="text-light px-1" ">DASHCAM</h1>
                </div>
             
                <!-- ... (search form) ... -->
            </div>
        </div>

        <div class="container">
            <div class="row text-lg-center text-md-center py-2">
                <?php 
                while ($row = mysqli_fetch_array($book)) {
                ?>
                <div class="col-3 col-sm-4 col-md-4 col-lg-3 p-2">
                    <div class="card">
                        <!-- Use the actual image URL from your database -->
                        <img src="./upload/<?php echo $row['cover']; ?>" alt="<?php echo $row['pname']; ?>" class="card-img-top cardimg" />
                        <div class="card-body">
                        
                            <h5 class="card-title" style="font-weight:bold;"><?php echo $row['pname']; ?></h5>
                            <hr>
                            <p class="card-text-brand ">Brand :<span><?php echo $row['brand']; ?></span></p>
                            <h6 class="card-text-brand">Price : <span>Rs. <?php echo $row['pprice']; ?>.00</span></h6>
                            <p class="card-text-brand">Description : <?php echo $row['pdiscription']; ?></p>
                            <div class="row">
                              
                              
                              

                              
                            </div>
                            
                            <a href="./productview.php?id=<?php echo $row['pid']; ?>" class="btn btn-primary">View</a> 
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    
</body>
</html>