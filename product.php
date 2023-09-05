<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MscTechnologies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="./Style/Navbar.css" rel="stylesheet">
    <link href="./Style/product.css" rel="stylesheet">
</head>
<body>
<?php include('./navbar.php') ?>
    
    
  <section>
    <div class="container-fluid">
        <div class="Container">

            <div class="row">
              <div class="col-xl-4 p-1 col-sm-8 col-md-6">
                <a href="./cctv.php" class="Links" >
                    <div class="Products"><p>CCTV</p>
                    <img src="Images/Products/CCTV.jpg"></img></div>
                </a>
              </div>

              <div class="col-xl-4 p-1 col-sm-8 col-md-6">
                 <a href="./dashcam.php" class="Links">
                    <div class="Products"><p>DASH Camera</p>
                    <img src="Images/Products/DASHCAMS.jpg"></img></div>
                 </a>
              </div>
              <div class="col-xl-4 p-1 col-sm-8 col-md-6">
              <a href="./dasystem.php" class="Links">
                <div class="Products"><p>DOOR Alarm System</p>
                    <img src="Images/Products/DOORALARM.jpg"></img></div>
                      </a>
              </div>
              <div class="col-xl-4 p-1 col-sm-8 col-md-6">
               
               <a class="Links">
                <div class="Products"><p>GPS System</p>
                    <img src="Images/Products/GPS.jpg"></img></div>
                      </a>
                
              </div>

              <div class="col-xl-4 p-1 col-sm-8 col-md-6">
               
               <a href="#" class="Links">
                <div class="Products"><p>Networking</p>
                    <img src="Images/Products/Networking.jpg"></img></div>
               </a>
              </div>

              <div class="col-xl-4 p-1 col-sm-8 col-md-6">
               
              <a class="Links">
                  <div class="Products"><p>Other Accessories</p>
                    <img src="Images/Products/CCTV.jpg"></img></div>
              </a>
                
              </div>
          </div>
            
                
            
                    </div>

    </div>

  </section>
    
  <section class="fixed-bottom">
  <?php include('./component/footer.php') ?>

  </section>
  
    
</body>
</html>