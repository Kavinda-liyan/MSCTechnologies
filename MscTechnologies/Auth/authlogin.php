<?php
session_start();
?>

<?php
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "msctechnologies";

    //create connection...
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    $select_user = "SELECT * FROM user WHERE email='$email'";
    $run_qry = mysqli_query($conn, $select_user);
    if (mysqli_num_rows($run_qry) > 0) {
        while ($row = mysqli_fetch_assoc($run_qry)) {
            $hashedPassword = md5($password);
            if ($hashedPassword == $row['password']) {
                
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];

                echo '<script>alert("Login Successfully!")</script>';
                
                header('location:index.php');
            } else {
                echo '<script>alert("Incorrect Email or Password!")</script>';
            }
        }
    } else {
        echo '<script>alert("Incorrect Email or Password!")</script>';
    }
}
?>