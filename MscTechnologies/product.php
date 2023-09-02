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
    <header>
        <img class="logor" src="./Images/MSCLogo.png"/>
        
         <nav class="Navs navbar navbar-dark navbar-expand-lg" >
            <button class="navbar-toggler m-2" data-toggle="collapse" data-target="#coldow"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse justify-content-center" id="coldow">
                <ul class="navbar-nav fw-bold hovef ">
                    <li class="nav-item"><a href="./index.php" class="links nav-link" ><span></span>Home</a></li>
                    <li class="nav-item"><a href="./product.php" class="links nav-link"><span></span>Product</a></li>
                    <li class="nav-item"><a href="./signin.php" class="links nav-link" to="/services"><span></span>Services</a></li>
                        <!-- {/* <a href="/#"><span><FaInfo className="nav-icon"/></span>About Us</a> */} -->
                    <li class="nav-item"></li><a href="./signin.php" class="Login nav-link" to="/Login">Sign In<span><FaUser class="nav-icon"/></span></a></li>
        
             

                </ul>
                

            </div>
             
         </nav>
             <button class="nav-btn" onClick={showNavbar}>
                 <FaBars/>

             </button>
     </header>
    
    
  <section>
    <div class="container-fluid">
        <div class="Container">

            <div class="row">
              <div class="col-xl-4 p-1 col-sm-8 col-md-6">
              <Link class="Links" to="/Products">
                <div class="Products"><p>CCTV</p>
                    <img src="Images/Products/CCTV.jpg"></img></div>
                </Link>
              </div>
              <div class="col-xl-4 p-1 col-sm-8 col-md-6">
                <Link class="Links">
                <div class="Products"><p>DASH Camera</p>
                    <img src="Images/Products/DASHCAMS.jpg"></img></div>
                </Link>
              </div>
              <div class="col-xl-4 p-1 col-sm-8 col-md-6">
              <Link class="Links">
                <div class="Products"><p>DOOR Alarm System</p>
                    <img src="Images/Products/DOORALARM.jpg"></img></div>
                </Link>
              </div>
              <div class="col-xl-4 p-1 col-sm-8 col-md-6">
               
               <Link class="Links">
                <div class="Products"><p>GPS System</p>
                    <img src="Images/Products/GPS.jpg"></img></div>
                </Link>
                
              </div>
              <div class="col-xl-4 p-1 col-sm-8 col-md-6">
               
               <Link class="Links">
                <div class="Products"><p>Networking</p>
                    <img src="Images/Products/Networking.jpg"></img></div>
                </Link>
                
                
              </div>
              <div class="col-xl-4 p-1 col-sm-8 col-md-6">
               
               <Link class="Links">
                <div class="Products"><p>Other Accessories</p>
                    <img src="Images/Products/CCTV.jpg"></img></div>
                </Link>
                
              </div>
          </div>
            
                
            
                    </div>

    </div>

  </section>
    
  <section class="fixed-bottom">
    <footer class=" text-center text-white foote  fixed">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
          <!-- Section: Social media -->
          <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="fab fa-facebook-f"></i
            ></a>
      
            <!-- Twitter -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="fa fa-info"></i
            ></a>
      
            <!-- Google -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="fa fa-phone"></i
            ></a>
      
      
            <!-- Linkedin -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="fab fa-linkedin-in"></i
            ></a>
      
            <!-- Github -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="fab fa-github"></i
            ></a>
          </section>
          <!-- Section: Social media -->
        </div>
        <!-- Grid container -->
      
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2023 Copyright:
          <a class="text-white" href="https://mdbootstrap.com/">CodeVibes</a>
          
        </div>
        <!-- Copyright -->
      </footer>

  </section>
   
    
</body>
</html>