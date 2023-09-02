<?php
session_start();

$mysqli = new mysqli('localhost' , 'root' , '' , 'msctechnologies') or die(mysqli_error($mysqli)); 

if(isset($_POST['logbtn'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];


    $sqladmin = "SELECT * FROM admin  WHERE  username = '$username' AND password = '$password'";
    $resultadmin = $mysqli->query($sqladmin);
    $admincount = mysqli_num_rows($resultadmin);
    $adminrow = mysqli_fetch_row($resultadmin);

    if ($admincount == 1) {

        $_SESSION['LoggedUser'] = $adminrow[0];

       // $admin = $_SESSION['LoggedUser'];

        header("location: welcome.html");
    } else {
        
        header('location:loginerror.html');
        
    }
    
}
?>




