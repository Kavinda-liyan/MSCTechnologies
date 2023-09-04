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
{
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
    if (isset($_SESSION['id'])){
        $username = $_POST['name'];
        $question = $_POST['question'];
        $itemid = $_POST['itemid'];

        // Retrieve the user ID based on the provided username
        $getUserIdQuery = "SELECT id FROM user WHERE username = ?";
        $stmt = $mysqli->prepare($getUserIdQuery);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();


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
    
        
    }
}
?>
