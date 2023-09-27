<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
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

            <div class="col-lg-9 col-md-8 pull-left rightslidebar">
              <div class="head"> <h1>Add Products</h1></div>

              <div class="container maincontainer">
               
                <div class="row">
                  <!-- Brand -->
                  <div class="col-6">

                    <div class="main brand">
                      <div class="main-center">
                      <h3>Add Brand</h3>
                        <form method="post" action="addproduct.php">
                          
                          <div class="form-group">
                            <label>Brand Name</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="bra" placeholder="Brand name :Hikvision, dahuja" required/>
                            </div>
                          </div>
                          <button type="submit" name="addBrand">ADD</button>
                        </form>
                        </div>

                    </div>

                    <div class="main brand">
                      <div class="main-center">
                      <h3>Add Product Category</h3>
                        <form method="post" action="addproduct.php">
                          
                          <div class="form-group">
                            <label>Product Category</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="cat" placeholder="Product Category :CCTV ,DASHCAM ,DOOR ALARM ,GPS" required/>
                            </div>
                          </div>
                          <button type="submit" name="addCategory">ADD</button>
                        </form>
                        </div>
                    </div>

                  </div>
                  <!-- Brand -->
                  <div class="col-6">
                    <div class=" main brand">
                      <form method="post" action="addproduct.php" enctype="multipart/form-data">
						
                        <div class="form-group">
                          <label>Product Name</label>
                            <div class="input-group">
                              <span class="input-group-addon"></span>
                    <input type="text" class="form-control" name="pname" placeholder="Enter Product Name" required/>
                          </div>
                        </div>
                        <div class="container">
                          <hr>
                          <h5>Description</h5>
                        <div class="form-group">
                          <label>Product Description</label>
                            <div class="input-group">
                              <span class="input-group-addon"></span>
                              <input type="text" class="form-control" name="pmdiscription" placeholder="Enter Description" required/>
                          </div>
                        </div>
                        <div class="form-group">
                          <label style="color:#3B3B3B;">Sub Description 1 </label>
                            <div class="input-group">
                              <span class="input-group-addon"></span>
                              <input type="text" class="form-control" name="psdiscription1" placeholder="Enter Description" required/>
                          </div>
                        </div>
                        <div class="form-group">
                          <label style="color:#3B3B3B;">Sub Description 2 </label>
                            <div class="input-group">
                              <span class="input-group-addon"></span>
                              <input type="text" class="form-control" name="psdiscription2" placeholder="Enter Description" required/>
                          </div>
                        </div>
                        <hr>

                        </div>
                        
            
            
                        <div class="form-group">
                          <label>Brand Name</label>
                            <div class="input-group">
                              <span class="input-group-addon"></span>
                              <select class="form-control" name="brand" required>
                              <option>Choose Brand Name</option>
                              
                              <?php
            
                              $mysqli = new mysqli('localhost' , 'root' , '' , 'msctechnologies') or die(mysqli_error($mysqli)); 
                              //get category
                              $getcategory = "SELECT * FROM productbrand";
                              $getcat_query = mysqli_query($mysqli, $getcategory);
            
                              while($row = mysqli_fetch_assoc($getcat_query))
                              {
                                $category = $row["brand"];
            
                                echo'<option value="'.$category.'">'.$category.'</option>';
                              }
                              ?>
                                                
                                               </select>
                            </div>
                        </div>
            
                        <div class="form-group">
                          <label>Item Category</label>
                            <div class="input-group">
                              <span class="input-group-addon"></span>
                              <select class="form-control" name="category" required>
                              <option>Choose Item Category</option>
                              
                              <?php
            
                              $mysqli = new mysqli('localhost' , 'root' , '' , 'msctechnologies') or die(mysqli_error($mysqli)); 
                              //get category
                              $getcategory = "SELECT * FROM productcategory";
                              $getcat_query = mysqli_query($mysqli, $getcategory);
            
                              while($row = mysqli_fetch_assoc($getcat_query))
                              {
                                $category = $row["category"];
            
                                echo'<option value="'.$category.'">'.$category.'</option>';
                              }
                              ?>
                                                
                                               </select>
                            </div>
                        </div>
                        
                          <div class="form-group">
                          <label>Item Price</label>
                            <div class="input-group">
                              <span class="input-group-addon"></span>
                              <input type="number" class="form-control" name="price"  placeholder="Enter Item Price" required/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                          <label>Item Discount Price</label>
                            <div class="input-group">
                              <span class="input-group-addon"></span>
                              <input type="text" class="form-control" name="dprice" placeholder="Enter Discount Price" required/>
                            </div>
                        </div>
      
                        <div class="form-group">
                          <label>Item Quantity</label>
                            <div class="input-group">
                              <span class="input-group-addon"></span>
                              <input type="number" class="form-control" name="quantity" placeholder="Enter Stock Quantity" required/>
                            </div>
                        </div>
      
                        <div class="form-group">
                          <label>Item Cover<sub>&nbsp;(Use 1x1 JPEG or PNG image with less than 2MB)</sub> </label>
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                              <input type="file" class="form-control" name="cover" placeholder="Use 1x1 ">
                            </div>
                        </div>
                    <button type="submit" name="upload">ADD</button>
                      </form>

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