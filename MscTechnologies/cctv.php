<?php
include('header.php');
require './connection/dbconnection.php';
?>
<?php  
// Instantiate DB & connect
$mysqli = new mysqli('localhost', 'root', '', 'msctechnologies') or die(mysqli_error($mysqli)); 

$recordsPerPage = 4;
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

// Calculate the offset for the SQL query based on the current page
$offset = ($page - 1) * $recordsPerPage;

// SQL query to fetch records for the current page
$query = "SELECT * FROM addpproducts WHERE category='CCTV' LIMIT $offset, $recordsPerPage";
$book = mysqli_query($mysqli, $query);

// Count the total number of records
$totalRecordsQuery = "SELECT COUNT(*) AS total FROM addpproducts WHERE category='CCTV'";
$totalRecordsResult = mysqli_query($mysqli, $totalRecordsQuery);
$totalRecordsRow = mysqli_fetch_assoc($totalRecordsResult);
$totalRecords = $totalRecordsRow['total'];

// Calculate the total number of pages
$totalPages = ceil($totalRecords / $recordsPerPage);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCTV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">  
    <link href="./Style/Home.css" rel="stylesheet">
    <link href="./Style/Navbar.css" rel="stylesheet">
    <link href="./Style/item.css" rel="stylesheet">
</head>
<style>
    .fixed-bottom{
        margin-top: 2rem;
        position: sticky bottom;
    }
    .container{
        margin-bottom: 2rem;
    }
    
</style>
<body>
<?php include('./navbar.php') ?>
 
<section id="cart">
        <div class="Product-Sort">
            <div class="row">
                <div class="col-md-3 pull-left">
                    <h1 class="text-light px-1" style="font-weight: bold;">CCTV</h1>
                </div>
             
                <!-- ... (search form) ... -->
            </div>
        </div>

        <div class="container">
            <div class="row text-lg-center text-md-center py-2">
                <?php 
                while ($row = mysqli_fetch_array($book)) {

                    $quantity = $row['quantity'];
                    $stockStatus = ($quantity < 5) ? 'Out of Stock' : (($quantity < 10) ? 'Limited Stock' : 'In Stock');
                ?>
                <div class="col-3 col-sm-4 col-md-4 col-lg-3 p-2 cards">
                    <div class="card">
                        <!-- Use the actual image URL from your database -->
                        <img src="./upload/<?php echo $row['cover']; ?>" alt="<?php echo $row['pname']; ?>" class="card-img-top cardimg" />
                        <div class="card-body">
                        
                            <h5 class="card-title" style="font-weight:bold;"><?php echo $row['pname']; ?></h5>
                            <hr>
                            <p class="card-text-brand ">Brand :<span><?php echo $row['brand']; ?></span></p>
                            <h6 class="card-text-brand">Price : <span>Rs. <?php echo $row['pprice']; ?>.00</span></h6>
                            <p class="card-text-brand">Description : <?php echo $row['pdiscription']; ?></p>
                            <p class="card-text-brand" >
                                Stock: <span style="<?php
                                if ($quantity >= 10) {
                                    echo 'color: green;';
                                } elseif ($quantity >= 5) {
                                    echo 'color: #ffd700;';
                                } else {
                                    echo 'color: red;';
                                }
                            ?>"><?php echo $stockStatus; ?></span>
                            </p>
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
        <div class="row justify-content-center" style="width: 80%; margin-left:auto; margin-right:auto;">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="page-item <?php if ($i === $page) echo 'active'; ?>">
                        <a class="page-link" href="cctv.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
    </section>
    <section class="sricky-bottom">
  <?php include('./component/footer.php') ?>

  </section>
    
</body>
</html>