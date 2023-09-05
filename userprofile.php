<?php
include('./header.php');



include('./connection/dbconnection.php');

// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);



// Fetch banner data from the database
if (isset($_SESSION['id'])) {
    

    $sql = 'SELECT username, email, phone, address1, address2 FROM user WHERE id = ' . $_SESSION['id'] . '';
    $result = $mysqli->query($sql);

    if ($result && $result->num_rows > 0) {
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
       
    }
    .profile hr{
        
        height: 5rem solid;
        Size:1rem;
    }
    .profile img{
        display: block;
  margin-left: auto;
  margin-right: auto;
  width: 200px;
  height: 200px;
  border-radius: 20rem;
  box-shadow: 1px 1px 1px 2px gray;
    }
    .line{
        height: 0.5rem;
        background: rgb(255,233,255);
background: linear-gradient(90deg, rgba(233,233,255,1) 25%, rgba(218,218,218,1) 50%, rgba(100,46,150,1) 100%);
border-radius: 2rem;
    }
    .profiled{
        margin-top: 2rem;
        margin-right: auto;
        margin-left: auto;
        padding-left: 5rem;
        width: 50%;
    }

</style>
<body>
<?php include('./navbar.php') ?>
<section>
    <div class="profile-card">
        <div class="profile-card-container">
        <div class="profile container">
            <img src="./Images/avatar.png" alt="avatar">
            
            <div class="line"></div>
                <div class="container profiled">
                    
                    <h3><span><i class="fa fa-address-card "></i></span>
                    Name :<?php echo $username; ?>
                    </h3>
                    <hr>
                    <h5><span><i class="fa fa-circle"></i> &nbsp;</span>
                    Email :<?php echo $email; ?>
                    </h5>
                    <br>
                    <h5><span><i class="fa fa-phone"></i> &nbsp;</span>
                    Phone :<?php echo $phone; ?>
                    </h5>
                    <br>
                    <h5><span><i class="fas fa-location"></i> &nbsp;</span>
                    Address :
                    </h5>
                    <div class="px-4">
                    <h6>Address 1 : <?php echo $address1; ?></h6>
                    <h6>Address 2 : <?php echo $address2; ?></h6>

                    </div>
                    <br>
                    
                    

                </div>
            
            

        </div>

        </div>
       

    </div>

</section>

<?php include('./component/footer.php') ?>
</body>
</html>