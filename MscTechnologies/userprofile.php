<?php
include('./header.php');



include('./connection/dbconnection.php');

// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);



// Fetch banner data from the database
// Fetch banner data from the database




// $mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="./Style/Navbar.css" rel="stylesheet">
    <link href="./Style/Home.css" rel="stylesheet">
</head>
<style>
    .profile-card{
        background-color: aliceblue;
        height: 100vh;
        width:100%;
        margin:0;
    }
    .profile-card-containe{
        margin: 1rem;
        padding: 1rem;
    }
    .profile{
        padding-top: 2rem;
        width: 60%;
       
    }
    .profile hr{
        
        height: 5rem solid;
        Size:1rem;
    }
    .profile img{
        display: block;
  margin-left: auto;
  margin-right: auto;
  width: 150px;
  height: 150px;
  border-radius: 10rem;
  
    }
    .line{
        height: 0.5rem;
        background-color: antiquewhite;
border-radius: 2rem;
width: 50%;
margin-left: auto;
margin-right: auto;
    }
    .profiled{
        margin-top: 2rem;
        margin-right: auto;
        margin-left: auto;
        padding-left: 5rem;
        width: 50%;
    }
    .editbtn{
        margin-left: auto;
        margin-right: auto;
        
        border-radius: 0.5rem;
        padding: 0.5rem;
        margin-bottom: 1rem;
        background-color:#007FFF ;
        border-color: #007FFF;
        
    }
    
    .editbtn a{
        text-decoration: none;
        color: aliceblue;
        font-weight: bold;
    }

</style>
<body>
<?php include('./navbar.php') ?>
<section>
    <div class="profile-card">
        <div class="profile-card-container">
        <div class="profile container">
            <img src="./Images/avatar.jpg" alt="avatar">
            
            <div class="line"></div>
                <div class="container profiled">
               <?php
               $mysqli = new mysqli('localhost', 'root', '', 'msctechnologies');
               if (isset($_SESSION['id'])) {
                $userId = $_SESSION['id'];
    $sql = "SELECT username, email, phone, address1, address2 FROM user WHERE id = " . $_SESSION['id'] . "";
    
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $email = $row['email'];
        $phone = $row['phone'];
        $address1 = $row['address1'];
        $address2 = $row['address2'];
    } else {
        // Handle the case where no user data is found (optional)
        echo "No user data found in the database.";
    }
}
if (!isset($_SESSION['id'])){
    $username = '';
        $email = '';
        $phone = '';
        $address1 = '';
        $address2 = '';
}


                    echo'<h3><span><i class="fa fa-address-card "></i></span>
                    Name :<br><span style="color:#002D62;">'.$username.'</span>
                    </h3>
                    <hr>
                    <h5><span><i class="fa fa-circle"></i> &nbsp;</span>
                    Email : <span style="color:#002D62;">'.$email.'</span>
                    </h5>
                    <br>
                    <h5><span><i class="fa fa-phone"></i> &nbsp;</span>
                    Phone : <span style="color:#002D62;">'.$phone.'</span>
                    </h5>
                    <br>
                    <h5><span><i class="fas fa-location"></i> &nbsp;</span>
                    Address :
                    </h5>
                    <div class="px-4">
                    <h6>Address 1 : <span style="color:#002D62;">'.$address1.'</span></h6>
                    <h6>Address 2 : <span style="color:#002D62;">'.$address2.'</span></h6>';

                   echo' </div>';
                   echo' <br>';
                    
                    
?>
                <button class="editbtn"><a href="#"><span><i class="fa fa-address-card px-2"></i></span>Edit Profile</a></button>   
                </div>
                
                <div class="line"></div>
            
            

        </div>

        </div>
       

    </div>

</section>

<?php include('./component/footer.php') ?>
</body>
</html>