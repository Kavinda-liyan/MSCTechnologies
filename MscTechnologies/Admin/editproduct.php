<?php


$mysqli = new mysqli('localhost', 'root', '', 'msctechnologies') or die(mysqli_error($mysqli)); 

$pid ='pid';
$category = 'category';
$name = 'pname';
$sdiscription= 'pdiscription';
$psdiscription1= 'psdiscription1';
$psdiscription2= 'psdiscription12';
$price= 'pprice';
$dprice= 'pdprice';
$quantity= 'quantity';
$cover= 'cover';
//EDIT SECTION

if( isset($_GET['edit']))
{

   $pid = $_GET['edit'];
   
   $edit = "SELECT * FROM addpproducts WHERE pid='$pid'";

   $result = $mysqli->query($edit);

   if($result == true)
   {
    $row = mysqli_fetch_array($result);


      $pid = $row['pid'];
      $category = $row['category'];
      $name = $row['pname'];
      $sdiscription= $row['pdiscription'];
      $psdiscription1= $row['psdiscription1'];
      $psdiscription2= $row['psdiscription2'];
      $price= $row['pprice'];
      $dprice= $row['pdprice'];
      $quantity = $row['quantity'];
      $cover = $row['cover'];
      
      

   }
   else
   {

   }

}
?>     
<!------Adding collect.php------->
<?php require_once 'edit.php'; ?>

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
              <div class="sbar">
                <!--Side Bar DASH-->
                <div class="card mb-3" style="background-color: rgba(255, 255, 255, 0.125);">
                  <img class="logoimg" src="../Images/MSCLogo.png" alt="msctech">
    
                  <p class="justify-content-center text-light text-center " style=" font-family: Verdana, Arial, Helvetica, sans-serif; ">Welcome Admin</p>
                  
                  <ul class="list-group m-3 categories logoutbtn" style=" font-weight: bold;">
                      <li class="list-group-item list-group-item-dark hoverlist logoutbtn"  >Logout<span class="p-2"></span></li>
                  </ul>
                  <ul class="list-group m-0 categories " style=" font-weight: bold;">
                  <a href="Dashbord.php" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-tachometer"></i><span class="p-2  ">Dashbord</span></li>
                    </a>
                  </ul>
                 
                </div>
                <!--Side Product-->
                <div class="card mb-1" style="background-color: rgba(255, 255, 255, 0.125);">
    
                  <h4 class="justify-content-center text-light text-center py-1" style=" font-family: Verdana, Arial, Helvetica, sans-serif; ">Products</h4>
        
                  <ul class="list-group m-1 categories" style=" font-weight: bold;">
                    <a href="viewproducts.php" class="nav-link linkhover">
                      <li class="list-group-item list-group-item" style="background-color:aqua;"><i class="fa fa-sitemap"></i><span class="p-2  ">View Products</span></li>
                    </a>
                    <a href="addproducts.php" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-add"></i><span class="p-2 ">Add Products</span></li>
                    </a>
                    
                    
                  </ul>
                </div>
                <!--Side Product Close-->

                <!--Coustomers -->
                <div class="card mb-1 " style="background-color: rgba(255, 255, 255, 0.125);">
    
                  <h4 class="justify-content-center text-light text-center py-1" style=" font-family: Verdana, Arial, Helvetica, sans-serif; ">Customers</h4>
        
                  <ul class="list-group m-1 categories" style="background-color: rgba(255, 255, 255, 0.125); font-weight: bold;">
                    <a href="store.php?brand=MSI" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-users"></i><span class="p-2  ">View Users</span></li>
                    </a>
                    <a href="store.php?brand=ASUS" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-truck-loading"></i><span class="p-2 ">Pending Oders</span></li>
                    </a>
                    <a href="store.php?brand=DELL" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-question-circle"></i><span class="p-2 ">FAQs</span></li>
                    </a>
                    <a href="store.php?brand=DELL" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-message"></i><span class="p-2 ">Massages</span></li>
                    </a>
                    
                  </ul>
                </div>
                <!--Coustomers close -->

                <!--Page Edit-->
                <div class="card mb-1" style="background-color: rgba(255, 255, 255, 0.125);">
    
                  <h4 class="justify-content-center text-light text-center py-1" style=" font-family: Verdana, Arial, Helvetica, sans-serif; ">Website</h4>
        
                  <ul class="list-group m-1 categories" style="background-color: rgba(255, 255, 255, 0.125); font-weight: bold;">
                    <a href="store.php?brand=MSI" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-gears"></i><span class="p-2  ">Home Page</span></li>
                    </a>
                    <a href="store.php?brand=ASUS" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-gears"></i><span class="p-2 ">Service Page</span></li>
                    </a>
                    
                    
                  </ul>
                </div>


              </div>
            </div>
           
                    

            <div class="col-lg-9 col-md-8 pull-left sidebarright">
              <div class="row">
                <div class="col  pull-left">
                    
                  
                  <div class="head"> <h1>Edit Product Details</h1></div>
                  <div class="edit">
                    <div class="containeredit">
                        <form method="post" action="edit.php" enctype="multipart/form-data">
              
                            <input type="hidden" class="form-control" name="id" value="<?php echo $pid; ?>"/>
                                    
                                    
                    <!-- <div class="form-group">
                                        <label>Item Category</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-th" aria-hidden="true"></i></span>
                                                <select class="form-control" name="category" required>
                              <option>Choose Item Category</option>
                              
                              <?php
            
                              $mysqli = new mysqli('localhost' , 'root' , '' , 'crystaltech') or die(mysqli_error($mysqli)); 
                              //get category
                              $getcategory = "SELECT * FROM category";
                              $getcat_query = mysqli_query($mysqli, $getcategory);
            
                              while($row = mysqli_fetch_assoc($getcat_query))
                              {
                                $category = $row["category"];
            
                                echo'<option value="'.$category.'">'.$category.'</option>';
                              }
                              ?>
                                                
                                               </select>
                                            </div>
                        </div> -->
            
                                    <div class="form-group">
                                        <label>Product Name</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-edit" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" value="<?php echo $name; ?>" name="name" placeholder="Enter Item Name" required/>
                                        </div>
                                    </div>

                                    
            
                                    
                        
                       
                        <div class="form-group">
                                        <label>Discription<sub>&nbsp;<b>main</b></sub> </label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                                                <input type="text" class="form-control" value="<?php echo $sdiscription; ?>" name="sdiscription" placeholder="Discription" required/>
                                            </div>
                        </div>
                        <div class="form-group">
                            <label>Discription<sub>&nbsp;<b>1</b></sub> </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                                    <input type="text" class="form-control" value="<?php echo $psdiscription1; ?>" name="psdiscription1" placeholder="Discription" required/>
                                </div>
                        </div>
                        <div class="form-group">
                            <label>Discription<sub>&nbsp;<b>2</b></sub> </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                                    <input type="text" class="form-control" value="<?php echo $psdiscription2; ?>" name="psdiscription2" placeholder="Discription" required/>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                        <label>Price</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                                <input type="number" class="form-control" value="<?php echo $price; ?>" name="price" placeholder="Enter Price" required/>
                                            </div>
                                    </div>
            
                                    <div class="form-group">
                                        <label>Discounted Price</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-dollar" aria-hidden="true"></i></span>
                                                <input type="number" class="form-control" value="<?php echo $dprice; ?>" name="dprice" placeholder="Enter Discounted Price" required/>
                                            </div>
                                    </div>
                        
                        <div class="form-group">
                                        <label>Quantity</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-box-archive" aria-hidden="true"></i></span>
                                                <input type="number" class="form-control" value="<?php echo $quantity; ?>" name="quantity" placeholder="Enter Quantity" required/>
                                            </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Item Cover</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                <input type="file" class="form-control" name="cover" >
                                            </div>
                                    </div>
                                    
                                    
                                    
            
                            <button type="submit" name="update">Update</button>
                                
                 
                                    
                      </form>
                            
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