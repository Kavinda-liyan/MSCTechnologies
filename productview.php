<?php
include('header.php');
require './connection/dbconnection.php';
$product = null;

if (isset($_GET['id'])) {
    // Use prepared statements to prevent SQL injection
    $product_id = $_GET['id'];
    $stmt = $dbConnection->prepare('SELECT * FROM addpproducts WHERE pid = ?');
    $stmt->bind_param('i', $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    }
    $stmt->close();
}

if ($product != null && isset($_POST['addToCart'])) {
    $product_id = $product['item_id'];

    // Check product availability using a prepared statement
    $stmt = $dbConnection->prepare('SELECT * FROM itemproducts WHERE item_id = ?');
    $stmt->bind_param('i', $product_id);
    $stmt->execute();
    $stock_result = $stmt->get_result();

    if ($stock_result->num_rows > 0) {
        $stock_line = $stock_result->fetch_assoc();

        if ($stock_line['quantity'] > 0) {
            // Check if the item is already in the cart
            $stmt = $dbConnection->prepare('SELECT * FROM cart WHERE itemId = ? AND userId = ?');
            $stmt->bind_param('ii', $product_id, $_SESSION['id']);
            $stmt->execute();
            $cart_result = $stmt->get_result();

            if ($cart_result->num_rows > 0) {
                // Update the quantity in the cart
                $stmt = $dbConnection->prepare('UPDATE cart SET quantity = quantity + 1 WHERE itemId = ? AND userId = ?');
                $stmt->bind_param('ii', $product_id, $_SESSION['id']);
                $stmt->execute();
            } else {
                // Insert a new item into the cart
                $stmt = $dbConnection->prepare('INSERT INTO cart (itemId, quantity, userId) VALUES (?, 1, ?)');
                $stmt->bind_param('ii', $product_id, $_SESSION['id']);
                $stmt->execute();
            }

            echo '<script>alert("Item added to the cart")</script>';
        } else {
            echo '<script>alert("Current item is not available")</script>';
        }
    }
    $stmt->close();
}
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

</head>
<body>
<?php include('./navbar.php') ?>
<section id="cart" class="cartview">
    
    <?php
    echo '<div class="col-md-12 my-3 viewcontainer">';
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
                  echo '<form action="productdetail.php?id=' . $product['pid'] . '" method="post">
                  <button class="btn btn-primary my-2 atc"  type="submit" name="addToCart">Add To Cart</button>
                  </form>';
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
              <div class="col-md-12 col-lg-10">
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

    echo '<div class="d-flex flex-start">
    <div class="msgbox">
      <h6 class="fw-bold mb-1"><span><i class="fa fa-user-circle px-2"></i></span>'.$ser["username"].'</h6>
      <div class="d-flex align-items-center mb-3">
        
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
        <div class="card-footer py-3 border-0 card " ">
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
    <form method="POST" action="faq.php">
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
    
</body>
</html>