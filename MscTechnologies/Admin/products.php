<?php
// session_start();

$mysqli = new mysqli('localhost', 'root', '', 'msctechnologies') or die(mysqli_error($mysqli));  

//DELETE SECTION

if( isset($_GET['del']))
{

    $pid = $_GET['del'];

    $delitem = "DELETE FROM addpproducts WHERE pid='$pid'";

    $delright = $mysqli->query($delitem);

    if($delright==true)
    {

        header("location:viewproducts.php?bookdel=1");

        }
    else
        {
            $_SESSION['message'] = "ERROR!";
            $_SESSION['type'] = "alert-danger";

            header("location:allitems.php");
           
        }
}