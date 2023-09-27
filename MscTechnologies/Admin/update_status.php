<?php
// update_status.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderId = $_POST['orderId'];

    $mysqli = new mysqli('localhost', 'root', '', 'msctechnologies') or die(mysqli_error($mysqli));

    // Update the order status to 1
    $update_query = "UPDATE orders SET status = 1 WHERE orderid = $orderId";
    $update_result = mysqli_query($mysqli, $update_query);

    if ($update_result) {
        echo 'Order status updated successfully.';
    } else {
        echo 'Error updating order status.';
    }
}
?>
