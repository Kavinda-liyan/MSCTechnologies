<?php

session_start();

$mysqli = new mysqli('localhost' , 'root' , '' , 'msctechnologies') or die(mysqli_error($mysqli)); 

 
    if(isset($_POST['update']))
    
    {
//image path to uploaded image
$target = "../upload/".basename($_FILES['cover']['name']); 



$pid = $_POST['pid'];        
$name = $_POST['name'];
$sdiscription = $_POST['sdiscription'];
$psdiscription1 = $_POST['psdiscription1'];
$psdiscription2 = $_POST['psdiscription2'];
$price = $_POST['pprice'];
$dprice = $_POST['pdprice'];
$quantity = $_POST['quantity'];
$cover = $_FILES['cover']['name'];


$publisher = $mysqli->real_escape_string($publisher);
        
$sql= "UPDATE addpproducts SET pname='$name',  pdiscription='$sdiscription', psdiscription1='$psdiscription1', psdiscription2='$psdiscription2', pprice='$price',pdprice='$dprice', quantity='$quantity', cover='$cover'";

                                                                                
        $right = $mysqli->query($sql);
   
        if((move_uploaded_file($_FILES['cover']['tmp_name'], $target)) && ($right==true))
        {
    
            $_SESSION['message'] = "Item Has Been Updated!";
            $_SESSION['type'] = "alert-success";
    
            header("location:editproduct.php");
        }
        else
        {
            $_SESSION['message'] = "Cant Update Item!Try Again!";
            $_SESSION['type'] = "alert-danger";
    
            header("location:editproduct.php");
        }

    }
?>