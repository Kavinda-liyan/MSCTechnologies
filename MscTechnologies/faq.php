<?php
// Start or resume the session
session_start();

// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<?php
$mysqli = new mysqli('localhost', 'root', '', 'msctechnologies') or die(mysqli_error($mysqli));

if (isset($_POST['addfaq'])) {
    if (!isset($_SESSION['id'])){
        // User is not logged in
        $username = $_POST['name'];
        $question = $_POST['question'];
        $itemid = $_POST['itemid'];

        $addfaq = "INSERT INTO faq (username, itemid, question) VALUES (?, ?, ?)";
        
        // Use prepared statement
        $stmt = $mysqli->prepare($addfaq);
        $stmt->bind_param("sis", $username, $itemid, $question);
        
        if ($stmt->execute()) {
            header("location: successfaq.html");
        } else {
            header("location: error.html");
        }
        $stmt->close();
    }
    elseif (isset($_SESSION['id'])) {
        // User is logged in
        $userId = $_SESSION['id'];
        
        // Retrieve the user's username from the database
        $getUserQuery = "SELECT username FROM user WHERE id = ?";
        $stmt = $mysqli->prepare($getUserQuery);
        $stmt->bind_param("i", $userId);
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $username = $row['username'];
            $stmt->close();
            
            // Now you have the username, so you can proceed to insert the FAQ entry
            $question = $_POST['question'];
            $itemid = $_POST['itemid'];
            
            $addfaq = "INSERT INTO faq (username, itemid, question, userid) VALUES (?, ?, ?, ?)";
           
            // Use prepared statement
            $stmt = $mysqli->prepare($addfaq);
            $stmt->bind_param("sisi", $username, $itemid, $question, $userId);
            
            if ($stmt->execute()) {
                header("location: successfaq.html");
            } else {
                header("location: error.html");
            }
            $stmt->close();

            // Get the user's submitted rating from the hidden input field
            $rating = $_POST['rating'];

            // Insert the review into the reviews table
            $insertReviewStmt = $mysqli->prepare('INSERT INTO reviews (user_id, product_id, rating, comment) VALUES (?, ?, ?, ?)');
            $insertReviewStmt->bind_param('iiis', $_SESSION['id'], $product['pid'], $rating, $_POST['question']);

            if ($insertReviewStmt->execute()) {
                echo '<script>alert("Review added successfully")</script>';
            } else {
                echo '<script>alert("Failed to add review")</script>';
            }

            $insertReviewStmt->close();
        } else {
            header("location: error.html");
        }
    }
}
?>
