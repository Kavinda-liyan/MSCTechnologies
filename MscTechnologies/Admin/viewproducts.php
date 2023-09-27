<?php  
 // Instantiate DB & connect
 $mysqli = new mysqli('localhost', 'root', '', 'msctechnologies') or die(mysqli_error($mysqli)); 

 // Pagination Configuration
$results_per_page = 6;  // Number of records per page
$query = 'SELECT * FROM addpproducts';
$result = mysqli_query($mysqli, $query);
$number_of_results = mysqli_num_rows($result);
$number_of_pages = ceil($number_of_results / $results_per_page);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$this_page_first_result = ($page - 1) * $results_per_page;

$query = "SELECT * FROM addpproducts LIMIT $this_page_first_result, $results_per_page";
$book = mysqli_query($mysqli, $query);




 ?>

<!------Adding collect.php------->
<?php require_once 'products.php'; ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>viewproducts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="./index.css">
</head>
<style>
.pagination{
    padding: 0.5rem;
    font-weight: bold;
    
}
.faqbtn{
    background-color: aliceblue;
    color: black;
    margin: 0.5rem;
    
}

</style>
<body>
    <section>
        <div class="container-fluid ">
          <div class="row">
            <!--SIDE BAR-->
            <div class="col-lg-3 col-md-4 pull-left sidebarcontent">
            <?php include('./sidebar.php') ?>
            </div>
           
                    

            <div class="col-lg-9 col-md-8 sidebarright rightslidebar">
              <div class="row">
                <div class="col  pull-left">
                  
                  <div class="head"> <h1>View Products</h1></div>
                  <div class="table-container">
                  <div class="table-responsive">  
                  <table  id="issue_data" class=" table-bordered" m-3>  
                  <thead>  
                  <tr class="TableHead ">
                      <td ><b>ID  </b>  </td>	  
                      <td><b>Brand</b> </td> 
                      <td><b>Category</b></td>  
                      <td>Cover</td> 
                      
                      <td>Product Name</td>  
                      <td>Discription<sub>main</sub></td>
                      <td>Discription<sub>1</sub></td>
                      <td>Discription<sub>2</sub></td>
                      <td>Price</td>
                      <td>Discounted Price</td> 
                      <td>Quantity</td>
                      <td>Edit</td>
                      <td>Delete</td> 
                  </tr>  
                  </thead> 
                 <?php
                          while ($row = mysqli_fetch_array($book))  
                          { 
                            $quantity = $row['quantity'];
                            $stockStatus = ($quantity < 5) ? 'Out of Stock' : (($quantity < 10) ? 'Limited Stock' : 'In Stock'); 
                               echo '  
                               <tr class="TableDetail">
                                    <td>'.$row["pid"].'</td>
                                    <td>'.$row["brand"].'</td>
                                    <td>'.$row["category"].'</td>
                                    <td><img src="../upload/'.$row["cover"].'" width="100" height="100"></td> 
                                    
                                      
                                    <td>'.$row["pname"].'</td>  
                                    <td>'.$row["pdiscription"].'</td> 
                                    <td>'.$row["psdiscription1"].'</td>  
                                    <td>'.$row["psdiscription1"].'</td>  
                                    <td>'.$row["pprice"].'</td>
                                    <td>'.$row["pdprice"].'</td>
                                    <td >'.$row["quantity"].'</td>
                                    <td><center><a href="editproduct.php?edit='.$row["pid"].'" class="btn btn-primary">Edit</a></center></td>
                                    <td><center><a href="products.php?del='.$row["pid"].'" class="btn btn-warning">Delete</a></center></td>
                                    
                                    
                               </tr>  
                               ';  
                               
                          }  
                          ?>
                           </table>  
                           </div>  
                    
                  </div>
                  
                    
                    </div>
                    <div class="pagination">
    <?php
    for ($page = 1; $page <= $number_of_pages; $page++) {
        echo '<a href="viewproducts.php?page=' . $page . '" class="faqbtn btn">' . $page . '</a> ';
    }
    ?>
  
                </div>

              </div>
              
        
                
                </div>

                
            </div>
          </div>
        </div>
            </section>
</body>
</html>