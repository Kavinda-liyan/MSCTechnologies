<?php  
 // Instantiate DB & connect
 $mysqli = new mysqli('localhost', 'root', '', 'msctechnologies') or die(mysqli_error($mysqli)); 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
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
                      <li class="list-group-item list-group-item-dark hoverlist logoutbtn"  ><a class="logout" href="logout.php"> Logout</a> <span class="p-2"></span></li>
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
                    <a href="viewuser.php" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-users"></i><span class="p-2  ">View Users</span></li>
                    </a>
                    <a href="store.php?brand=ASUS" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-truck-loading"></i><span class="p-2 ">Pending Oders</span></li>
                    </a>
                    <a href="viewfaq.php" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-question-circle"></i><span class="p-2 ">FAQs</span></li>
                    </a>
                    <a href="viewmessage.php" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-message"></i><span class="p-2 ">Massages</span></li>
                    </a>
                    
                  </ul>
                </div>
                <!--Coustomers close -->

                <!--Page Edit-->
                <div class="card mb-1" style="background-color: rgba(255, 255, 255, 0.125);">
    
                  <h4 class="justify-content-center text-light text-center py-1" style=" font-family: Verdana, Arial, Helvetica, sans-serif; ">Website</h4>
        
                  <ul class="list-group m-1 categories" style="background-color: rgba(255, 255, 255, 0.125); font-weight: bold;">
                    <a href="Homepage.php" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-gears"></i><span class="p-2  ">Home Page</span></li>
                    </a>
                    <a href="servicepage.php" class="nav-link linkhover">
                      <li class="list-group-item list-group-item"><i class="fa fa-gears"></i><span class="p-2 ">Service Page</span></li>
                    </a>
                    
                    
                  </ul>
                </div>


              </div>
            </div>

            <div class="col-lg-9 col-md-9 rightslidebar">
              <div class="row">
                <div class="col  pull-left">
                  <div class="head"> <h1>DashBord</h1></div>
                  <div class="Product-Sort" >
                    <div class="row statistic-field">
                      <div class="productsban">
                      <h2>Products</h2>
                      </div>
                      
                      <div class="col-3 statistic">
  
                        <div class="card-body ">
                        <?php

                        $sumb = "SELECT SUM(quantity) AS sum FROM addpproducts WHERE category='CCTV'";

                        $sumresult = mysqli_query($mysqli,$sumb);

                        $sumcheck = mysqli_fetch_array($sumresult);

                        $totalcctv = $sumcheck['sum'];

                        ?>
                          <h5>CCTV</h5>
                          <hr>
                          <h1><span><i class="bi bi bi-camera-video"></i></span></i></h1>
                          <h1 class="number"><?php echo "$totalcctv"; ?></h1>
                        </div>
  
                      
                        </div>
                        <div class="col-3  statistic">
                        <?php

                        $sumb = "SELECT SUM(quantity) AS sum FROM addpproducts WHERE category='DASHCAM'";

                        $sumresult = mysqli_query($mysqli,$sumb);

                        $sumcheck = mysqli_fetch_array($sumresult);

                        $totaldash = $sumcheck['sum'];

                        ?>
  
                          <div class="card-body">
                            <h5>DASH CAM</h5>
                            <hr>
                            <h1><span><i class="bi bi bi-camera"></i></span></i></h1>
                            <h1 class="number"><?php echo "$totaldash"; ?></h1>
                          </div>
    
                        
                          </div>
                          <div class="col-3  statistic">
                          <?php

                          $sumb = "SELECT SUM(quantity) AS sum FROM addpproducts WHERE category='DASystem'";

                          $sumresult = mysqli_query($mysqli,$sumb);

                          $sumcheck = mysqli_fetch_array($sumresult);

                          $totalda = $sumcheck['sum'];

                          ?>
  
                            <div class="card-body">
                              <h5>Door Alarm Systems</h5>
                              <hr>
                              <h1><span><i class="bi bi bi-alarm"></i></span></i></h1>
                              <h1 class="number"><?php echo "$totalda"; ?></h1>
                            </div>
      
                          
                            </div>
                            <div class="col-3  statistic">
                            <?php

                          $sumb = "SELECT SUM(quantity) AS sum FROM addpproducts WHERE category='GPS'";

                          $sumresult = mysqli_query($mysqli,$sumb);

                          $sumcheck = mysqli_fetch_array($sumresult);

                          $totalgps = $sumcheck['sum'];

                          ?>
                              <div class="card-body">
                                <h5>GPS Systems</h5>
                                <hr>
                                <h1><span><i class="bi bi bi-map"></i></span></i></h1>
                                <h1 class="number"><?php echo "$totalgps"; ?></h1>
                              </div>
        
                            
                              </div>
        
                      </div>

                      


                      



                    </div>
                    <!-- user statistic -->
                    <div class="Product-Sort" >
                    <div class="row statistic-field">
                      <div class="productsban">
                      <h2>User</h2>
                      </div>
                      
                      <div class="col-3 statistic">
  
                        <div class="card-body ">
                        <?php

                            $sumb = "SELECT COUNT(id) AS sum FROM user";

                            $sumresult = mysqli_query($mysqli,$sumb);

                            $sumcheck = mysqli_fetch_array($sumresult);

                            $totalmemb = $sumcheck['sum'];

                        ?>
                          <h5>Registerd Users</h5>
                          <hr>
                          <h1><span><i class="bi bi bi-person"></i></span></i></h1>
                          <h1 class="number"><?php echo " $totalmemb"; ?></h1>
                        </div>
  
                      
                        </div>
                        <div class="col-3  statistic">
                        <?php

                          $sumb = "SELECT COUNT(faqid) AS sum FROM faq";

                          $sumresult = mysqli_query($mysqli,$sumb);

                          $sumcheck = mysqli_fetch_array($sumresult);

                          $totalfaq = $sumcheck['sum'];

                        ?>
  
                          <div class="card-body">
                            <h5>FAQs</h5>
                            <hr>
                            <h1><span><i class="bi bi-question-circle"></i></span></i></h1>
                            <h1 class="number"><?php echo "$totalfaq"; ?></h1>
                          </div>
    
                        
                          </div>
                          <div class="col-3  statistic">
                          <?php

                          $sumb = "SELECT SUM(quantity) AS sum FROM addpproducts WHERE category='DASystem'";

                          $sumresult = mysqli_query($mysqli,$sumb);

                          $sumcheck = mysqli_fetch_array($sumresult);

                          $totalda = $sumcheck['sum'];

                          ?>
  
                            <div class="card-body">
                              <h5>Pending Oders</h5>
                              <hr>
                              <h1><span><i class="bi bi-sort-up"></i></span></i></h1>
                              <h1 class="number"><?php echo "$totalda"; ?></h1>
                            </div>
      
                          
                            </div>
                            <div class="col-3  statistic">
                            <?php

                          $sumb = "SELECT COUNT(comment) AS sum FROM comment ";

                          $sumresult = mysqli_query($mysqli,$sumb);

                          $sumcheck = mysqli_fetch_array($sumresult);

                          $totalgps = $sumcheck['sum'];

                          ?>
                              <div class="card-body">
                                <h5>Massages</h5>
                                <hr>
                                <h1><span><i class="bi bi-chat"></i></span></i></h1>
                                <h1 class="number"><?php echo "$totalgps"; ?></h1>
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


    <script>
      $('.number').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 3000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    </script>
</body>
</html>