<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $cemail = $_POST['cemail'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    // Validation: Check if any required fields are empty
    if (empty($user) || empty($address1) || empty($address2) || empty($phone) || empty($email) || empty($cemail) || empty($password) || empty($cpassword)) {
        echo '<script>alert("All fields are required")</script>';
    } else {
        // Database connection
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "msctechnologies";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        if (mysqli_connect_error()) {
            die('Connection Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
        } else {
            // Check if passwords match
            if ($_POST['password'] != $_POST['cpassword']) {
                echo '<script>alert("Passwords do not match")</script>';
            } elseif (strlen($_POST['password']) < 8) {
                echo '<script>alert("Password should be at least 8 characters")</script>';
            } else {
                // Check if the email already exists in the database
                $SELECT = "SELECT email FROM user WHERE email = ? LIMIT 1";
                $stmt = $conn->prepare($SELECT);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->bind_result($existingEmail);
                $stmt->store_result();
                $rnum = $stmt->num_rows;

                if ($rnum == 0) {
                    // Email is not in use, proceed with registration
                    $stmt->close();

                    // Check if the email is already associated with an account
                    $SELECT = "SELECT email FROM user WHERE email = ? LIMIT 1";
                    $stmt = $conn->prepare($SELECT);
                    $stmt->bind_param("s", $cemail);
                    $stmt->execute();
                    $stmt->bind_result($existingEmail);
                    $stmt->store_result();

                    if ($stmt->num_rows > 0) {
                        echo '<script>alert("Email is already registered")</script>';
                    } else {
                        // Email is not in use, proceed with registration
                        $stmt->close();
                        $INSERT = "INSERT INTO user (username, address1, address2, phone, email, cemail, password, cpassword) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                        $stmt = $conn->prepare($INSERT);
                        $stmt->bind_param("sssissss", $user, $address1, $address2, $phone, $email, $cemail, $password, $cpassword);

                        if ($stmt->execute()) {
                            echo '<script>alert("Registered Successfully!")</script>';
                            header('Location: ../successregistration.html');
                        } else {
                            echo '<script>alert("Error registering user")</script>';
                            header('Location: ../unsuccessfull.html');
                        }
                    }
                    $stmt->close();
                } else {
                    echo '<script>alert("Email is already registered")</script>';
                    header('Location: ../register.php');
                }
                $conn->close();
            }
        }
    }
}
?>
