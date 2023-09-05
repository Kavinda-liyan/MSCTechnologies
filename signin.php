<?php include('./Auth/authlogin.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MscTechnologies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="./Style/User.css">

</head>
<body>
    <div >
        <section class="Background">
            
                <div class="Loginform"> 
            
            <div class="content">
             
              <div class="auth-form-container">
                <h4>Login</h4>
                <form class="login-form" action="signin.php" method="post" name="login-form">
                    <label >email</label>
                    <input type="email" placeholder="youremail@gmail.com" id="email" name="email" />
                    <label >password</label>
                    <input  type="password" placeholder="********" id="password" name="password" />
                    <button type="submit" class="login">Log In</button>
                </form>
                <a href="./register.php"> <button class="link-btn" >Don't have an account? Register here.</button></a>
                <a class="Arrow" href="./index.php"> <span class="fa fa-home"></span></a>
            </div>
    
            </div>
            </div>

               
            </div>
            
           
        </section>

    </div>
    

    
    
</body>
</html>