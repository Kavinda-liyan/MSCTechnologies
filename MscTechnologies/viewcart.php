<?php
include('./header.php');
include('./connection/dbconnection.php');

// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="./Style/Navbar.css" rel="stylesheet">
    <link href="./Style/Home.css" rel="stylesheet">
</head>
<style>
    .profile-card{
        background-color: aliceblue;
        height: 100%;
        width:100%;
        margin:0;
    }
    .profile-card-containe{
        margin: 1rem;
        padding: 1rem;
    }
    .profile{
        padding-top: 2rem;
        width: 90%;
       
    }
    .profile hr{
        
        height: 5rem solid;
        Size:1rem;
    }
    .profile img{
        display: block;
  margin-left: auto;
  margin-right: auto;
  width: 150px;
  height: 150px;
  border-radius: 1rem;
  
    }
    .line{
        height: 0.5rem;
        background-color: antiquewhite;
border-radius: 2rem;
width: 90%;
margin-left: auto;
margin-right: auto;
    }
    .profiled{
        margin-top: 2rem;
        margin-right: auto;
        margin-left: auto;
        padding-left: 5rem;
        width: 100%;
    }
    .editbtn{
        margin-left: auto;
        margin-right: auto;
        
        border-radius: 0.5rem;
        padding: 0.5rem;
        margin-bottom: 1rem;
        background-color:#007FFF ;
        border-color: #007FFF;
        
    }
    
    .editbtn a{
        text-decoration: none;
        color: aliceblue;
        font-weight: bold;
    }

</style>
<body>
<?php include('./navbar.php') ?>
<?php 
$recordsPerPage = 3;

if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

// Calculate the offset for the SQL query based on the current page
$offset = ($page - 1) * $recordsPerPage;

// Fetch the total record count for pagination
$mysqli = new mysqli('localhost', 'root', '', 'msctechnologies');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$userId = $_SESSION['id'];

// Fetch the total number of records for the current user
$totalRecordsQuery = "SELECT COUNT(*) AS total FROM cart WHERE userid=?";
$stmt = $mysqli->prepare($totalRecordsQuery);
$stmt->bind_param("i", $userId);
$stmt->execute();
$totalRecordsResult = $stmt->get_result();
$totalRecordsRow = $totalRecordsResult->fetch_assoc();
$totalRecords = $totalRecordsRow['total'];
$stmt->close();

// Calculate the total number of pages
$totalPages = ceil($totalRecords / $recordsPerPage);


$cartQuery = "SELECT * FROM cart WHERE userid=? LIMIT ? OFFSET ?";
$stmt = $mysqli->prepare($cartQuery);
$stmt->bind_param("iii", $userId, $recordsPerPage, $offset);
$stmt->execute();
$cartResult = $stmt->get_result();
$stmt->close();
?>
<section>
    <div class="profile-card">
        <div class="profile-card-container">
        <div class="profile container">
            <img src="./Images/cartview.gif" alt="avatar">
            <h2 style="text-align:center; font-weight:bold;">Cart</h2>
            <hr>
            <div class="container profiled">
                
                <?php
                if ($cartResult->num_rows > 0) {
                    while ($row = $cartResult->fetch_assoc()) {
                       
                        $itemId = $row['productid'];
                        $itemQuery = "SELECT * FROM addpproducts WHERE pid=?";
                        $stmt = $mysqli->prepare($itemQuery);
                        $stmt->bind_param("i", $itemId);
                        $stmt->execute();
                        $itemResult = $stmt->get_result();
                        $item = $itemResult->fetch_assoc();
                        $stmt->close();

                       
                        echo '<div class="card m-2">
                                <div class="container m-2">
                                    <div class="row">
                                        <div class="col-2">
                                            <h5>Product ID: <br> <span style="font-weight:bold; color:#3B3B3B; ">' . $item['pid'] . '</span></h5>
                                            <h5>Product Name: <br><span style="font-weight:bold; color:#3B3B3B; ">' . $item['pname'] . '</span</h5>
                                            <h5>Brand: <span style="font-weight:bold; color:#3B3B3B; ">' . $item['brand'] . '</span></h5>
                                            <h5>Category: <span style="font-weight:bold; color:#3B3B3B; ">' . $item['category'] . '</span></h5>
                                        </div>
                                        <div class="col-2">
                                            <img src="./upload/product/' . $item['cover'] . '" height="100px">
                                        </div>
                                        <div class="col-4">
                                            <h5>Description: <br><span style="font-weight:bold; color:#3B3B3B; ">' . $item['pdiscription'] . '</span></h5>
                                        </div>
                                        <div class="col-2">
                                            <h5>Price: Rs. <br><span style="font-weight:bold; color:#3B3B3B; ">' . $item['pdprice'] . '.00</span></h5>
                                        </div>
                                      <div class="col-1">
                                      <a href="./productdetail.php?id=' . $item['pid'] . '" class="btn btn-primary">Buy</a>
                                        </div>
                                        <div class="col-1">
                                            <form method="post" action="delete_product.php">
                                            <input type="hidden" name="productid" value="' . $item['pid'] . '">
                                            <input type="submit" value="Delete" name="deletecart" class="btn btn-dark">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                    }
                } else {
                    echo'<div style="text-align:center;"><h3> No items Found in your Cart </h3></div>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="row justify-content-center" style="width: 80%; margin-left:auto; margin-right:auto;">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li class="page-item <?php if ($i === $page) echo 'active'; ?>">
                    <a class="page-link" href="viewcart.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>
</div>


</section>

<?php include('./component/footer.php') ?>
</body>
</html>