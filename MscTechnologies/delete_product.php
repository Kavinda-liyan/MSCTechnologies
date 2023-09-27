<?php
if (isset($_POST['deletecart'])) {
   
    $productId = $item['pid'];

    
    $mysqli = new mysqli('localhost', 'root', '', 'msctechnologies');
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

  
    $deleteQuery = "DELETE FROM cart WHERE userid=? AND productid=?";
    $stmt = $mysqli->prepare($deleteQuery);
    $stmt->bind_param("ii", $_SESSION['id'], $productId);
    $result = $stmt->execute();
    $stmt->close();

    if ($result) {
       
        header("Location: viewcart.php");
        exit();
    } else {
        
        echo "Error deleting product from cart: " . $mysqli->error;
    }

    $mysqli->close();
} else {
   
    echo "Invalid request.";
}
?>
