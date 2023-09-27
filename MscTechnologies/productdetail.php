<?php
include('./header.php');
include('./connection/dbconnection.php');

// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="./Style/Navbar.css" rel="stylesheet">
    <link href="./Style/Home.css" rel="stylesheet">
    <link href="./Style/productdetail.css" rel="stylesheet">
</head>
<style>
    
</style>
<body>
<?php include('./navbar.php') ?>
<?php 
$product = null;

if (isset($_GET['id'])) {
    if (isset($_SESSION['id'])) {

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
    else{
        header("Location: ./signin.php");
    }
    
}

?>

<section>
    <div class="profile-card">
        <div class="profile-card-container">
        <div class="profile container">
            <img class="avatar" src="./Images/cartview.gif" alt="avatar">
            <h3 style="text-align:center; font-weight:bold;">Purchase Item</h3>
            <hr>
            
            <div class="container profiled">
                
            </div>
        </div>
        <div class="container">
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
                  <h4>Rs.' . $product['pdprice'] . '.00</h5>
                  
                  <hr>
                  <h4 class="discription">Discription</h4>
                  <p >' . $product['pdiscription'] . '</p>
                  <p >Brand name :<span class="bname" style="font-weight:bold;  color:red;"> ' . $product['brand'] . '</span> | Category :<span class="bname" style="font-weight:bold;  color:red;"> ' . $product['category'] . '</span></p>
                  <hr>'
                  
                  ?>
                  
    <!-- ... (other form fields) ... -->
    <div class="quantity">
        <label for="quantity">Quantity:</label>
        <button id="decrement">-</button>
        <input type="number" id="quantity" name="quantity" value="1" min="1" width="30px">
        <button id="increment">+</button>
    </div>
    <div class="subtot">
        <label for="subtot">Subtotal:</label>
        <input type="text" id="subtot" name="subtot" disabled>
    </div>
    <form method="post" action="payment-checkout.php">
    <input type="hidden" name="pid" value="<?php echo $product['pid']; ?>">
    <!-- Add hidden input fields for quantity and subtotal -->
    <input type="hidden" id="hiddenQuantity" name="hiddenQuantity" value="">
<input type="hidden" id="hiddenSubtotal" name="hiddenSubtotal" value="">

    <div class="submit">
        <input type="submit" name="Purchase" value="Purchase" class="btn btn-warning"></input>
    </div>
</form>

        </div>
        
    </div>
    
</div>


</section>

<?php include('./component/footer.php') ?>

<script>
   document.addEventListener('DOMContentLoaded', function () {
    var quantityInput = document.getElementById('quantity');
    var hiddenQuantityInput = document.getElementById('hiddenQuantity');
    var incrementButton = document.getElementById('increment');
    var decrementButton = document.getElementById('decrement');
    var subtotInput = document.getElementById('subtot');
    var hiddenSubtotalInput = document.getElementById('hiddenSubtotal');

    var productPrice = <?php echo $product['pdprice']; ?>;
    
    function updateSubtotal() {
        var currentQuantity = parseInt(quantityInput.value);
        var subtotal = productPrice * currentQuantity;

        subtotInput.value = 'Rs. ' + subtotal.toFixed(2) + '.00';

        // Update the hidden quantity and subtotal input fields
        hiddenQuantityInput.value = currentQuantity;
        hiddenSubtotalInput.value = subtotal.toFixed(2);
    }

    incrementButton.addEventListener('click', function () {
        var currentQuantity = parseInt(quantityInput.value);
        quantityInput.value = currentQuantity + 1;
        updateSubtotal();
    });

    decrementButton.addEventListener('click', function () {
        var currentQuantity = parseInt(quantityInput.value);
        if (currentQuantity > 1) {
            quantityInput.value = currentQuantity - 1;
            updateSubtotal();
        }
    });

    quantityInput.addEventListener('input', function () {
        var currentQuantity = parseInt(quantityInput.value);
        if (isNaN(currentQuantity) || currentQuantity < 1) {
            quantityInput.value = 1;
        }
        updateSubtotal();
    });

    updateSubtotal();
});

</script>


</body>
</html>