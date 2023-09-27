<?php  
 // Instantiate DB & connect
 $mysqli = new mysqli('localhost', 'root', '', 'msctechnologies') or die(mysqli_error($mysqli)); 

 $query = 'SELECT * FROM comment';
 
$book = mysqli_query($mysqli, $query); 

$right = $mysqli->query($query);

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
                  
                  <div class="head"> <h1>View Message</h1></div>
                  <div class="table-container">
                  <div class="table-responsive">  
                  <table  id="issue_data" class=" table-bordered" m-3 width=100%>  
                  <thead>  
                  <tr class="TableHead ">
                      <td ><b>Message ID</b>  </td>	  
                      <td><b>Name</b> </td> 
                      <td><b>Email</b></td>  
                      <td>Message</td> 

                  </tr>  
                  </thead> 
                 <?php
                          while ($row = mysqli_fetch_array($book))  
                          {  
                               echo '  
                               <tr class="TableDetail">
                                    <td>'.$row["cmtid"].'</td>
                                    <td>'.$row["name"].'</td>
                                    <td>'.$row["email"].'</td>
                                    
                                      
                                    <td>'.$row["comment"].'</td>  
                                    
                                    
                               </tr>  
                               ';  
                               
                          }  
                          ?>
                           </table>  
                           </div>  
                    
                  </div>
                  
                    
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