<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $faqid = $_POST["faqid"];
    $reply = $_POST["reply"];

    // Instantiate DB & connect
    $mysqli = new mysqli('localhost', 'root', '', 'msctechnologies') or die(mysqli_error($mysqli));

    // Update the 'reply' column in the 'faq' table
    $updateQuery = "UPDATE faq SET reply = ? WHERE faqid = ?";
    $stmt = $mysqli->prepare($updateQuery);
    $stmt->bind_param("si", $reply, $faqid);
    
    if ($stmt->execute()) {
        // Successfully updated the reply
        header("Location: viewfaq.php"); // Redirect back to the FAQ page
        exit();
    } else {
        echo "Error updating the reply: " . $stmt->error;
    }
} else {
    // Check if 'faqid' is provided in the URL
    if (isset($_GET["edit"])) {
        $faqid = $_GET["edit"];
    } else {
        // Handle the case where 'faqid' is not provided, e.g., by redirecting or showing an error message.
        echo "FAQ ID is missing.";
        exit(); // Terminate script execution
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply to FAQ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h1>Reply to FAQ</h1>
                    <form method="POST" action="replyfaq.php">
                        <input type="hidden" name="faqid" value="<?php echo $faqid; ?>">
                        <div class="form-group">
                            <label for="reply">Reply:</label>
                            <textarea class="form-control" name="reply" id="reply" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Reply</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<?php
}
?>
