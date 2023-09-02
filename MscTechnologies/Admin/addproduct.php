<?php

$mysqli = new mysqli('localhost' , 'root' , '' , 'msctechnologies') or die(mysqli_error($mysqli)); 
 
if(isset($_POST['upload']))
    
{
//image path to uploaded image
$target = "../upload/".basename($_FILES['cover']['name']); 
//$aim = "../upload/".basename($_FILES['fimage']['name']); 
//$way = "../upload/".basename($_FILES['simage']['name']); 

$brand = $_POST['brand'];
$category=$_POST['category'];
$name = $_POST['pname'];
$pdiscription = $_POST['pmdiscription'];
$psdiscription1 = $_POST['psdiscription1'];
$psdiscription2 = $_POST['psdiscription2'];
$price = $_POST['price'];
$dprice = $_POST['dprice'];
$quantity = $_POST['quantity'];
$cover = $_FILES['cover']['name'];
//$fimage = $_FILES['fimage']['name'];
//$simage = $_FILES['simage']['name'];

//Get current date 

//$currentdate = date('Y-m-d');

$quantity = $mysqli->real_escape_string($quantity);

        
 $sql= "INSERT INTO addpproducts(brand,category, pname, pdiscription, psdiscription1, psdiscription2, pprice, pdprice, quantity, cover) VALUES ('$brand','$category','$name','$pdiscription','$psdiscription1','$psdiscription2','$price','$dprice','$quantity','$cover')";
 $right = $mysqli -> query($sql);
        if((move_uploaded_file($_FILES['cover']['tmp_name'], $target)) && ($right==true))
        {
        header("location:success.html");
        }
        else
        {
       header("location:error.html");
        }

    }

    if(isset($_POST['addCategory']))
    {
        $cat = $_POST['cat'];

        $add_cat = "INSERT INTO productcategory(category) VALUES ('$cat')";
        $add_query = mysqli_query($mysqli, $add_cat);

        if($add_query)
        {
            
            header("location:success.html");

        }
        else
        {
            header("location:error.html");
        }

        
    }
    if(isset($_POST['addBrand']))
    {
        $bar = $_POST['bra'];

        $add_bar = "INSERT INTO productbrand(brand) VALUES ('$bar')";
        $add_query = mysqli_query($mysqli, $add_bar);

        

        if($add_query)
        {

            header("location:success.html");

        }
        else
        {
            header("location:error.html");
        }

    }
?>