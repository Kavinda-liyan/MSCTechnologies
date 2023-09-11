<?php
// session_start();

$mysqli = new mysqli('localhost', 'root', '', 'msctechnologies') or die(mysqli_error($mysqli));  

//DELETE SECTION

if( isset($_GET['del']))
{

    $id = $_GET['del'];

    $delitem = "DELETE FROM user WHERE id='$id'";

    $delright = $mysqli->query($delitem);

    if($delright==true)
    {

        header("location:viewuser.php?bookdel=1");

        }
    else
        {
            $_SESSION['message'] = "ERROR!";
            $_SESSION['type'] = "alert-danger";

            header("location:viewuser.php");
           
        }
}