<?php 
include('header.php');
include('./connection/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MscTechnologies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="./Style/Navbar.css" rel="stylesheet">
    <link href="./Style/Home.css" rel="stylesheet">
</head>
<body>
    <?php include('./navbar.php') ?>
    
      <div class="container1">
        <div class="Content">
            <div class="container2">
            <h1><span class="glow">MSC TECHNOLOGIES</span>  </h1>
            <h3> Your Security is Our Business</h3>
            <p> "Our Mission is your protection not only in home but also in business places 
                with our security monitors and System certified by the highest standerds."</p>
                
                <button class="discoverBtn"> Discover More..</button>
            </div>
        </div>

        </div>
<?php include('./component/footer.php') ?>

      
   

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>