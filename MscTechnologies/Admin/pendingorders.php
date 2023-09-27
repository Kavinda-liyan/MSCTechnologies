 
<?php
$mysqli = new mysqli('localhost', 'root', '', 'msctechnologies') or die(mysqli_error($mysqli));

// Define the number of records to display per page
$recordsPerPage = 3;

// Determine the current page number
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

// Calculate the offset for the SQL query based on the current page
$offset = ($currentPage - 1) * $recordsPerPage;

$orders_query = "SELECT o.orderid, o.productid, o.userid, o.quantity, o.subtotal, o.method, o.status,
                 u.username, u.email, u.phone, u.address1, u.address2,
                 p.pname, p.cover, p.quantity AS product_quantity, p.pprice
                 FROM orders AS o
                 INNER JOIN user AS u ON o.userid = u.id
                 INNER JOIN addpproducts AS p ON o.productid = p.pid
                 LIMIT $offset, $recordsPerPage";

$orders_result = mysqli_query($mysqli, $orders_query);

if (!$orders_result) {
    die("Query failed: " . mysqli_error($mysqli));
}
?>


<!------Adding collect.php------->
<?php require_once 'products.php'; ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>viewproducts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="./index.css">
    <style>
    /* Pagination styles */
    .pagination {
        margin-top: 20px;
    }

    .pagination a {
        padding: 5px 10px;
        margin-right: 5px;
        text-decoration: none;
        background-color: #007bff;
        color: #fff;
        border-radius: 3px;
    }

    .pagination a:hover {
        background-color: #0056b3;
    }

    /* Current page styles */
    .current-page {
        margin-top: 10px;
        font-weight: bold;
    }
</style>

</head>
<body>
    <section>
        <div class="container-fluid ">
          <div class="row">
            <!--SIDE BAR-->
            <div class="col-lg-3 col-md-4 pull-left sidebarcontent">
            <?php include('./sidebar.php') ?>
            </div>
           
                    

            <div class="col-lg-9 col-md-8 sidebarright rightslidebar">
              <div class="row">
                <div class="col  pull-left">
                  
                  <div class="head"> <h1>View Users</h1></div>
                  <div class="table-container">
                  <div class="table-responsive">  
                  <table id="issue_data" class="table-bordered" m-3 width="100%">
    <thead>
        <tr class="TableHead">
            <td><b>Order ID</b></td>
            <td><b>Product ID</b></td>
            <td><b>Product Name</b></td>
            <td><b>Stock Quantity</b></td>
            <td><b>Product Price<sub><br>(per 1 Product)</sub></b></td>
            <td>User Name</td>
            <td>Phone</td>
            <td>Email</td>
            <td>Address 1</td>
            <td>Address 2</td>
            <td>Quantity</td>
            <td>Total Price</td>
            <td>Payment method</td>
            

            
            <td>Place on User</td>
            <td>Place Oder</td>
        </tr>
    </thead>
    <tbody>
        <?php
while ($row = mysqli_fetch_array($orders_result)) {

    echo '
    <tr class="TableDetail">
        <td>' . $row["orderid"] . '</td>
        <td>' . $row["productid"] . '</td>
        <td>' . $row["pname"] . '</td>
        <td>' . $row["product_quantity"] . '</td>
        <td>' . $row["pprice"] . '</td>
        <td>' . $row["username"] . '</td>
        <td>' . $row["phone"] . '</td>
        <td>' . $row["email"] . '</td>
        <td>' . $row["address1"] . '</td>
        <td>' . $row["address2"] . '</td>
        <td>' . $row["quantity"] . '</td>
        <td>' . $row["subtotal"] . '</td>
        <td>' . $row["method"] . '</td>
        <td><center><button onclick="updateOrderStatus('. $row["orderid"].')" class="btn btn-success">Update Status</button></center></td>
        ';

    // Check if the status is equal to 1 to determine whether to show the "Place Order" button
    if ($row["status"] == 1) {
        echo '<td><center><button onclick="placeOrder(' . $row["orderid"] . ', ' . $row["productid"] . ', ' . $row["quantity"] . ')" class="btn btn-info">Place Order</button></center></td>';
    } else {
        // Display an empty cell if the status is not 1
        echo '<td></td>';
    }

    echo '</tr>';
}
?>

    </tbody>
</table>
                           </div> 
                           <!-- Add pagination controls to navigate between pages -->
<div class="pagination">
    <?php
    $totalRecordsQuery = "SELECT COUNT(*) AS total FROM orders";
    $totalRecordsResult = mysqli_query($mysqli, $totalRecordsQuery);
    $totalRecords = mysqli_fetch_assoc($totalRecordsResult)['total'];
    
    $totalPages = ceil($totalRecords / $recordsPerPage);
    
    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<a href='pendingorders.php?page=$i'>$i</a> ";
    }
    ?>
</div>

<!-- Display the current page number -->
<div class="current-page">Page <?php echo $currentPage; ?></div> 
                    
                  </div>
                  
                    
                    </div>
  
                </div>

              </div>
              
        
                
                </div>

                
            </div>
          </div>
        </div>
            </section>
            <!-- Add this script to your HTML body -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function placeOrder(orderId, productId, quantity) {
        var buttonId = "placeOrderBtn-" + orderId;
        var button = document.getElementById(buttonId);
        if (button) {
            button.disabled = true;
        }
        $.ajax({
            type: 'POST',
            url: 'update_quantity.php', // Create this PHP file to update the database
            data: {
                orderId: orderId,
                productId: productId,
                quantity: quantity
            },
            success: function (response) {
                // Handle the response, e.g., show a success message
                alert(response);
                // You can also update the page without a full reload if needed
                // For example, reload the table to show updated data
                location.reload();
            },
            error: function () {
                alert('Error updating quantity');
            }
        });
    }

    function updateOrderStatus(orderId) {
    $.ajax({
        type: 'POST',
        url: 'update_status.php', // Create this PHP file to update the order status
        data: {
            orderId: orderId
        },
        success: function (response) {
            // Handle the response, e.g., show a success message
            alert(response);
        },
        error: function () {
            alert('Error updating order status');
        }
    });
}
</script>

</body>
</html>