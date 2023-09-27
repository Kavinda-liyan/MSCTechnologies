<?php  
// Instantiate DB & connect
$mysqli = new mysqli('localhost', 'root', '', 'msctechnologies') or die(mysqli_error($mysqli)); 

// Determine the current page
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$recordsPerPage = 5;
$offset = ($page - 1) * $recordsPerPage;

$query = "SELECT faq.faqid, faq.username, faq.question, faq.reply, addpproducts.pid, addpproducts.pname, addpproducts.cover
          FROM faq
          LEFT JOIN addpproducts ON faq.itemid = addpproducts.pid
          LIMIT $offset, $recordsPerPage";

$book = mysqli_query($mysqli, $query);

// Get total number of records
$totalRecordsQuery = "SELECT COUNT(*) AS total FROM faq";
$totalRecordsResult = mysqli_query($mysqli, $totalRecordsQuery);
$totalRecordsRow = mysqli_fetch_assoc($totalRecordsResult);
$totalRecords = $totalRecordsRow['total'];

// Calculate the total number of pages
$totalPages = ceil($totalRecords / $recordsPerPage);
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
    color: aliceblue;
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
                  
                  <div class="head"> <h1>View FAQs</h1></div>
                  <div class="table-container">
                  <div class="table-responsive">  
                  <table  id="issue_data" class=" table-bordered" m-3 width="100%">  
                  <thead>  
                  <tr class="TableHead ">
                      <td ><b>FAQ ID</b>  </td>	  
                      <td><b>User Name</b> </td> 
                      <td><b>itemid</b></td>  
                      <td>Item Name</td> 
                      
                      <td>Cover</td>  
                      <td>Question</td>
                      <td>Reply</td>
                      <td>Action</td>
                      <td>Action</td> 
                  </tr>  
                  </thead> 
                 <?php
                          while ($row = mysqli_fetch_array($book))  
                          {  
                               echo '  
                               <tr class="TableDetail" style="background-color:white;">
                                    <td>'.$row["faqid"].'</td>
                                    <td>'.$row["username"].'</td>
                                    <td>'.$row["pid"].'</td>
                                    
                                      
                                    <td>'.$row["pname"].'</td>  
                                    <td><img src="../upload/'.$row["cover"].'" height="100px" width="100px"></td> 
                                    <td>'.$row["question"].'</td>  
                                    <td>'.$row["reply"].'</td>  
                                    <td><center><a href="replyfaq.php?edit='.$row["faqid"].'" class="btn btn-primary">Reply</a></center></td>
                                    <td><center><a href="delfaq.php?del='.$row["faqid"].'" class="btn btn-danger">Delete</a></center></td>
                                    
                                    
                               </tr>  
                               ';  
                               
                          }  
                          ?>
                           </table>  
                           </div>  
                    
                  </div>
                  
                    
                    </div>
  
                </div>
                <div class="pagination">
    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
        <a href="viewfaq.php?page=<?php echo $i; ?>" class="faqbtn btn <?php if ($i === $page) echo 'active'; ?>"><?php echo $i; ?></a>
    <?php endfor; ?>
</div>
              </div>
              
        
                
                </div>

                
            </div>
          </div>
        </div>
            </section>
            
            
</body>
</html>