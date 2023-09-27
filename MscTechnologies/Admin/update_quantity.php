<?php
// update_quantity.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderId = $_POST['orderId'];
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];

    $mysqli = new mysqli('localhost', 'root', '', 'msctechnologies') or die(mysqli_error($mysqli));

    // Get the quantity from the addpproducts table
    $product_query = "SELECT quantity FROM addpproducts WHERE pid = $productId";
    $product_result = mysqli_query($mysqli, $product_query);

    if ($product_result && $product_row = mysqli_fetch_assoc($product_result)) {
        $productQuantity = $product_row['quantity'];

        // Check if the quantity is already 1, no need to update further
        if ($productQuantity <= 1) {
            echo 'Quantity is already at the minimum.';
            exit; // Exit the script
        }

        // Get the quantity from the order table
        $order_query = "SELECT quantity FROM orders WHERE orderid = $orderId";
        $order_result = mysqli_query($mysqli, $order_query);

        if ($order_result && $order_row = mysqli_fetch_assoc($order_result)) {
            $orderQuantity = $order_row['quantity'];

            // Calculate the new quantity
            $newQuantity = $productQuantity - $orderQuantity;

            if ($newQuantity >= 1) {
                // Update the addpproducts table by subtracting the order quantity
                $update_query = "UPDATE addpproducts SET quantity = $newQuantity WHERE pid = $productId";
                $update_result = mysqli_query($mysqli, $update_query);

                if ($update_result) {
                    echo 'Quantity updated successfully';
                } else {
                    echo 'Error updating quantity';
                }
            } else {
                echo 'Quantity is already at the minimum.';
            }
        } else {
            echo 'Error fetching order quantity';
        }
    } else {
        echo 'Error fetching product quantity';
    }
}
?>
