<?php
include('./header.php');
include('./connection/dbconnection.php');

session_start();


error_reporting(E_ALL);
ini_set('display_errors', 1);


$user_name = '';
$user_email = '';
$user_phone = '';
$product_cover = '';
$product_name = '';
$product_pid = '';
$product_price = '';
$quantity = '';
$subtotal = '';
$user_address1 = '';
$user_address2 = '';


if (isset($_POST['Purchase'])) {
    
    $quantity = isset($_POST['hiddenQuantity']) ? $_POST['hiddenQuantity'] : 0;
    $subtotal = isset($_POST['hiddenSubtotal']) ? $_POST['hiddenSubtotal'] : 0;

    
    $product_pid = isset($_POST['pid']) ? $_POST['pid'] : 0;

    
    $stmt = $dbConnection->prepare('SELECT pname, pdprice, brand, cover FROM addpproducts WHERE pid = ?');
    $stmt->bind_param('i', $product_pid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

        
        $product_name = $product['pname'];
        $product_price = $product['pdprice'];
        $product_brand = $product['brand'];
        $product_cover = $product['cover'];

        
    }

    
    $userid = $_SESSION['id'];
    $user_query = "SELECT username, email, phone,address1,address2 FROM user WHERE id = ?";
    $user_stmt = $dbConnection->prepare($user_query);
    $user_stmt->bind_param('i', $userid);
    $user_stmt->execute();
    $user_result = $user_stmt->get_result();

    if ($user_result->num_rows > 0) {
        $user_data = $user_result->fetch_assoc();

        
        $user_name = $user_data['username'];
        $user_email = $user_data['email'];
        $user_phone = $user_data['phone'];
        $user_address1 = $user_data['address1'];
        $user_address2 = $user_data['address2'];

    }
}

if (isset($_POST['pay'])) {
    
    $paymentMethod = isset($_POST['paymentMethod']) ? $_POST['paymentMethod'] : '';
    $quantity = isset($_POST['hiddenQuantity']) ? $_POST['hiddenQuantity'] : 0;
    $subtotal = isset($_POST['hiddenSubtotal']) ? $_POST['hiddenSubtotal'] : 0;
    $product_pid = isset($_POST['pid']) ? $_POST['pid'] : 0;
  
   
    if (empty($quantity) || empty($subtotal) || empty($product_pid) || empty($paymentMethod)) {
        echo "Some data is empty. Check your form submission.";
    } else {
        
        $userid = $_SESSION['id'];

       
        $insert_order_query = "INSERT INTO orders (userid, productid, quantity, subtotal, method) VALUES (?, ?, ?, ?, ?)";
        $insert_order_stmt = $dbConnection->prepare($insert_order_query);
        $insert_order_stmt->bind_param('iiids', $userid, $product_pid, $quantity, $subtotal, $paymentMethod);

        if ($insert_order_stmt->execute()) {
            
            header("Location: thankyou.html");
            exit;
        } else {
            
            echo "Error: " . $insert_order_stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Item Purchase</title>
    <style>
        .payment-options {
           font-weight: bold;
        }
        .btnpay{
            margin: 1rem;
            
        }
        .btnpay input{
            width: 250px;
        }
    </style>
    
</head>
<body>
    <div class="container">
        <h1 style="text-align:center; margin:1rem; ">Item Purchase</h1>
        <hr>
        <div class="row">
            <div class="col-6">
                <img src="./upload/<?php echo $product_cover ?>" height="150px">
                <br><br>
                <p>Product Name: <strong><?php echo $product_name ?></strong></p>
                <p>Product ID: <strong><?php echo $product_pid ?></strong></p>

                <p>Price: <strong>Rs.<?php echo $product_price ?>.00</strong></p>
                <hr>
                <p>Quantity: <strong><?php echo $quantity; ?></strong></p>
                <p>SubTotal: <span id="total"><strong>Rs.<?php echo $subtotal; ?></strong></span></p>
            </div>
            <div class="col-6">
                
                <p>Name: &nbsp;<strong><?php echo $user_name ?></strong></p>
                <p>Email: &nbsp;<strong><?php echo $user_email ?></strong></p>
                <p>Phone Number: &nbsp;<strong><?php echo $user_phone ?></strong></p>
                <p>Address 1: &nbsp;<strong><?php echo $user_address1 ?></strong></p>
                <p>Address 2: &nbsp;<strong><?php echo $user_address2 ?></strong></p>
                <hr>
                <p><sub>(<span style="color:red; font-weight: bold;">Note:</span> Your Information Select From Your Profile <strong>Make sure to add True Details</strong> Once Purchase Confirmed, One of Our
                Agents Will Call You to Confirm Your Details.)</sub></p>
                
                <div class="payment-options">
                    <p>Select Payment Method:</p>
                    <form action="" method="post"> 
                        <div class="cashonD">
                            <img src="./Images/cod.jpg" height="100px">
                            <input type="radio" name="paymentMethod" value="cashOnDelivery"><label>&nbsp; Cash On Delivery</label>
                        </div>
                        
                        <div class="OP">
                            <img src="./Images/visa.jpg" width="100px">
                            <input type="radio" name="paymentMethod" value="onlinePayment"><label>&nbsp; Online Payment</label>
                        
                        </div>
                        <input type="hidden" name="hiddenQuantity" value="<?php echo $quantity; ?>">
                        <input type="hidden" name="hiddenSubtotal" value="<?php echo $subtotal; ?>">
                        <input type="hidden" name="pid" value="<?php echo $product_pid; ?>">

                        <div class="btnpay">
                             <input type="submit" name="pay" Value="Confirm" class="btn btn-info">
                        </div>

                    </form>
                </div>
                
            </div>
        </div>
        
        <p id="paymentMessage"></p>
    </div>
</body>
</html>
