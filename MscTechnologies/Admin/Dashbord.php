<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                      <li class="list-group-item list-group-item" style="background-color:aqua;"><i class="fa fa-tachometer"></i><span class="p-2  ">Dashbord</span></li>
                    </a>
                  </ul>
                 
                </div>
                <!--Side Product-->
                <div class="card mb-1" style="background-color: rgba(255, 255, 255, 0.125);">
    
                  <h4 class="justify-content-center text-light text-center py-1" style=" font-family: Verdana, Arial, Helvetica, sans-serif; ">Products</h4>
        
                  <ul class="list-group m-1 categories" style=" font-weight: bold;">
                    <a href="viewproducts.php" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-sitemap"></i><span class="p-2  ">View Products</span></li>
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

            <div class="col-lg-9 col-md-8 pull-left">
              <div class="row">
                <div class="col  pull-left">
                  <div class="head"> <h1>DashBord</h1></div>
                  <div class="Product-Sort" >
                    <div class="row">
                      <div class="col-3 statistic">
  
                        <div class="card-body ">
                          <h5>CCTV</h5>
                          <img src="../Images/Products/CCTV.jpg" alt="dash">
                        </div>
  
                      
                        </div>
                        <div class="col-3  statistic">
  
                          <div class="card-body">
                            <h5>DASH CAM</h5>
                            <img src="../Images/Products/DASHCAMS.jpg" alt="dash">
                          </div>
    
                        
                          </div>
                          <div class="col-3  statistic">
  
                            <div class="card-body">
                              <h5>Door Alarm Systems</h5>
                              <img src="../Images/Products/DOORALARM.jpg" alt="dash">
                            </div>
      
                          
                            </div>
                            <div class="col-3  statistic">
  
                              <div class="card-body">
                                <h5>GPS Systems</h5>
                                <img src="../Images/Products/GPS.jpg" alt="dash">
                              </div>
        
                            
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