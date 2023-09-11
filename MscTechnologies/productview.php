<?php
include('./header.php');
require './connection/dbconnection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCTV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">  
    <link href="./Style/Home.css" rel="stylesheet">
    <link href="./Style/Navbar.css" rel="stylesheet">
    <link href="./Style/item.css" rel="stylesheet">
    <style>
  /* Style the star rating container */
  .star-rating {
    margin-left: auto;
    margin-right: auto;
    display: inline-block;
    font-size: 40px;
    cursor: pointer;
    text-align: center;

  }

  /* Style the individual stars */
  .star-rating .star {
    color: gray;
    transition: color 0.2s;
  }

  /* Style the selected stars */
  .star-rating .star.selected {
    color: gold; /* or any other color you prefer for selected stars */
  }

  /* Style the hidden input */
  .star-rating input[type="hidden"] {
    display: none;
  }
  .stars{
    
    margin-left: 40rem;
    margin-right: auto;
    align-items: center;
    text-align: center;
  }
</style>


</head>
<body>
<?php include('./navbar.php') ?>
<?php 
$product = null;

if (isset($_GET['id'])) {
    
    $product_id = $_GET['id'];
    $stmt = $dbConnection->prepare('SELECT * FROM addpproducts WHERE pid = ?');
    $stmt->bind_param('i', $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    
$query = "SELECT * FROM addpproducts ";
$book = mysqli_query($dbConnection, $query);



    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    }
    $stmt->close();
}

if ($product != null && isset($_POST['addToCart'])) {
    if (isset($_SESSION['id'])) {
        $product_id = $product['pid'];
        $user_id = $_SESSION['id'];

        
        $stmt = $dbConnection->prepare('SELECT * FROM cart WHERE userid = ? AND productid = ?');
        $stmt->bind_param('ii', $user_id, $product_id);
        $stmt->execute();
        $cart_result = $stmt->get_result();

        if ($cart_result->num_rows > 0) {
          
            header("Location: ./cartexist.html");
        } else {
            
            $stmt = $dbConnection->prepare('INSERT INTO cart (userid, productid) VALUES (?, ?)');
            $stmt->bind_param('ii', $user_id, $product_id);
            $stmt->execute();

            header("Location: ./cartsuccess.html");
        }
        $stmt->close();
    } else {
       
        header("Location: ./signin.php");
    }
}


    
?>
<section id="cart" class="cartview" style="margin-top:0px;">
    
    <?php
    echo '<div class="col-md-12  viewcontainer">';
    echo '<div class="items">
    <div class="row">
    <div class="col-6">
    <img src="./upload/' . $product['cover'] . '" alt="' . $product['pname'] . '" class="card-img-top rounded shadow p-3 mb-5 "/>

    </div>
    <div class="col-6">
    <hr>
                <div class="itemscol">
                  <h2 >' . $product['pname'] . '</h4>                             
                  <h4><small><s class="text-secondary">Rs.' . $product['pprice'] . '.00</s></small></h5>
                  <h4 >Rs.' . $product['pdprice'] . '.00</h5>

                  <hr>
                  <h4 class="discription">Discription</h4>
                  <p >' . $product['pdiscription'] . '</p>
                  <p >' . $product['psdiscription1'] . '</p>
                  <p >' . $product['psdiscription2'] . '</p>
                  <hr>
                  <p >Brand name :<span class="bname"> ' . $product['brand'] . '</span></p>'
                  ?>

<?php

if ($product != null) {
    $product_id = $product['pid'];
    $stmt = $dbConnection->prepare('SELECT quantity FROM addpproducts WHERE pid = ?');
    $stmt->bind_param('i', $product_id);
    $stmt->execute();
    $quantity_result = $stmt->get_result();

    if ($quantity_result->num_rows > 0) {
        $product_quantity = $quantity_result->fetch_assoc()['quantity'];

        
        if ($product_quantity >= 5) {
           
            echo '<form action="productview.php?id=' . $product['pid'] . '" method="post">
                      <button class="btn btn-primary addcart my-2 atc" type="submit" name="addToCart"><span><i class="fa fa-shopping-cart px-2"></i></span>Add To Cart</button>
                      </form>
                      
                      <form action="productdetail.php?id=' . $product['pid'] . '" method="post">
                      <button class="btn btn-primary buynow my-2 atc" type="submit" name="byProduct"><span><i class="fa-solid fa-cash-register px-2"></i></i></span>Buy Now</button>
                      </form>';
        } else {
            
            echo '<p class="out-of-stock" style="color:red; font-size:1.5rem;">Out of Stock</p>';
        }
    }
    $stmt->close();
}
?>
    

    </div>
    
                
    
    </div>
                
                </div>
              </div>;
    <!-- echo ''; -->
    
    </div>

    


<section class="mainfaq">
          <div class="container  ">
            <div class="row d-flex justify-content-center">
              <div class="col-md-12 col-lg-10 backgroundmsg">
                <div class="massage   card text-dark bg-light" style="border-color: #fff;">
                  <div class="card-body p-4">
                    <h4 class="mb-0">Recent comments</h4>
                    <p class="fw-light mb-4 pb-2">Latest Comments section by users</p>
                    <?php

$faq_qry = ('SELECT * FROM faq f  JOIN  addpproducts i ON i.pid = f.itemid  WHERE itemid = '.$product['pid'].' ORDER BY f.faqid DESC');

$squery = mysqli_query($dbConnection,$faq_qry);
$faq_qry= mysqli_num_rows($squery);

if($faq_qry > 0)
{
   while ($ser = mysqli_fetch_array($squery)) 
   {

    echo'<div class="d-flex flex-start">
    <div class="msgbox">';
    if(isset($_SESSION['id'])){
        echo '<h6 class="fw-bold mb-1"><span><i class="fa fa-user-circle px-2" style="color:green;"></i></span>'.$ser["username"].'</h6>';
    }
    if(!isset($_SESSION['id'])){
        echo '<h6 class="fw-bold mb-1"><span><i class="fa fa-user-circle px-2" style="color:blue;"></i></span>'.$ser["username"].'</h6>';
    }
      echo'<div class="d-flex align-items-center mb-3">
        
      </div>
      <p class="mb-0">
      '.$ser["question"].'
      </p><br>

      <div class="container">
          
          <section>
              <div class="container">
              <div>
      <h6 class="fw-bold mb-1" style="color:red;"><span><i class="fa fa-pencil px-2"></i></span>ADMIN</h6>
      <div class="d-flex align-items-center mb-3">
        
      </div>
      <p class="mb-0" style="color:red;">';
      if($ser["reply"] == null){
          echo "No reply yet.";
      }else{
          echo ''.$ser["reply"].'';
      }
     echo'   
      </p>
      <hr>
              </div>
          </section>


      </div>
    </div>
  </div>
    ';
    
   
   
} 

}


?>
                    
                  </div>
        
                  <hr class="my-0" />
        
                  
                </div>
              </div>
            </div>
          </div>
        </section>
        
    
    
        <?php
if (isset($_SESSION['id'])) {

    

    

    if (isset($_GET['id'])) {
        $product_qry = mysqli_query($dbConnection, 'SELECT * FROM addpproducts where pid = ' . $_GET['id'] . '');

        $product = $product_qry->fetch_assoc();
    }
    $userid = $_SESSION['id'];
    echo '
    <form method="POST" action="faq.php">
    <div class="star-align">
    <div class="star-rating">
    <div class="stars">
        <span class="star" data-rating="1">&#9733;</span>
        <span class="star" data-rating="2">&#9733;</span>
        <span class="star" data-rating="3">&#9733;</span>
        <span class="star" data-rating="4">&#9733;</span>
        <span class="star" data-rating="5">&#9733;</span>
        </div>
    </div>
    </div>
    
    
    <!-- Hidden input field to store the selected rating -->
    <input type="hidden" name="rating" id="rating" value="0">
        <div class="card-footer my-3 border-0 card commentadd ">
            <div class="d-flex flex-start w-100">
                <div class="form-outline w-100">
                    <input type="hidden" name="name" value="' . $userid . '">
                    <input type="hidden" name="itemid" value="' . $product['pid'] . '">

                    
                    <textarea class="form-control" id="textAreaExample" rows="4" style="background: #fff;" name="question" placeholder="Enter Your Questions" required></textarea>
                </div>
            </div>
            
            <div class="float-end mt-2 p-1 m-1">
                <button type="submit" name="addfaq" class="btn btn-primary btn-sm">Post comment</button>
            </div>
        </div>
        
    </form>';

    
} else {
    if (isset($_GET['id'])) {
        $product_qry = mysqli_query($dbConnection, 'SELECT * FROM addpproducts where pid = ' . $_GET['id'] . '');

        $product = $product_qry->fetch_assoc();
    }

    echo '
    <form method="POST" action="faq.php" class="my-3">
        <div class="card-footer py-3 border-0 card " ">
            <div class="d-flex flex-start w-100">
                <div class="form-outline w-100">
                    <label style="font-weight:bold;">Enter Your name</label><br>
                    <input type="text" name="name" placeholder="Name" required>
                    <br><br>
                    <input type="hidden" name="itemid" value="' . $product['pid'] . '">
                    <label style="font-weight:bold;">Questions</label><br>
                    <textarea class="form-control" id="textAreaExample" rows="2" style="background: #fff;" name="question" placeholder="Enter Your Questions" required></textarea>
                </div>
            </div>
            <div class="float-end mt-2 p-1 m-1">
                <button type="submit" name="addfaq" class="btn btn-primary btn-sm">Post comment</button>
            </div>
        </div>

        
    </form>';
    
}
?>
   
</section>
<?php include('./component/footer.php') ?>
<script>

const stars = document.querySelectorAll(".star");
const ratingInput = document.getElementById("rating");

stars.forEach((star) => {
    star.addEventListener("click", () => {
        const ratingValue = parseInt(star.getAttribute("data-rating"));
        ratingInput.value = ratingValue;
        
        stars.forEach((s) => {
            if (parseInt(s.getAttribute("data-rating")) <= ratingValue) {
                s.classList.add("selected");
            } else {
                s.classList.remove("selected");
            }
        });
    });
});
</script>
</body>
</html>