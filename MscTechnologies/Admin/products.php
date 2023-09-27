<?php
// session_start();

$mysqli = new mysqli('localhost', 'root', '', 'msctechnologies') or die(mysqli_error($mysqli));  

// DELETE SECTION

if (isset($_GET['del'])) {
    $pid = $_GET['del'];

    // First, delete from the orders table
    $delOrdersQuery = "DELETE FROM orders WHERE productid='$pid'";
    $delOrdersResult = $mysqli->query($delOrdersQuery);

    // Next, delete from the cart table
    $delCartQuery = "DELETE FROM cart WHERE productid='$pid'";
    $delCartResult = $mysqli->query($delCartQuery);

    // Then, delete from the addpproducts table
    $delProductsQuery = "DELETE FROM addpproducts WHERE pid='$pid'";
    $delProductsResult = $mysqli->query($delProductsQuery);

    // Finally, delete from the faq table 
    $delFaqQuery = "DELETE FROM faq WHERE itemid='$pid'";
    $delFaqResult = $mysqli->query($delFaqQuery);

    if ($delProductsResult && $delOrdersResult && $delCartResult && $delFaqResult) {
        header("location:viewproducts.php?bookdel=1");
    } else {
        $_SESSION['message'] = "ERROR!";
        $_SESSION['type'] = "alert-danger";
        header("location:viewproducts.php");
    }
}
?>
