<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="./Style/User.css">
</head>
<body>
    <div class="Background">
        <div class="regform"> 
        <div class="contentforreg">
        <div class="auth-form-container">
            <h4>Register</h4>
        <form class="register-form input-group-sm"  action="Auth/authregistration.php" method="post">
            <div class="row">
                <div class="col-6">
                <label htmlFor="name">Full name</label>
                <input  name="username"  id="name" placeholder="full Name" required />

                </div>

                <div class="col-6">
                <label htmlFor="email">Phone</label>
            <input type="number" placeholder="07X-XXX-XXXX" id="email" name="phone" required/>
                </div>
            </div>
            
            
            <hr>
            <div class="Pw">
                <div class="row">
                    <div class="col-6">
                    <label htmlFor="email">email</label>
                <input  type="email" placeholder="youremail@gmail.com" required id="email" name="email" />

                    </div>
                    <div class="col-6">
                    <label htmlFor="email"class="text-warning font-weight-bold">Confirm email</label>
                    <input  type="email" placeholder="youremail@gmail.com" required id="cemail" name="cemail" />
                        
                    </div>
                </div>
                <hr>
                
               
            
           <div class="row">
            <div class="col-6">
            <label htmlFor="address1">Address Line 1</label>
                <input type="text" placeholder="Address 1" id="email" name="address1" />
           </div>
           <div class="col-6">
           <label htmlFor="address1" >Address Line 2</label>
                <input type="text" placeholder="Address 2" id="cemail" name="address2"  class="px-1"/>
           </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
            <label htmlFor="password">password</label>
              <input  type="password" placeholder="********"  name="password"  required id="password"/>

            </div>
            <div class="col-6">
            <label htmlFor="password" class="text-warning font-weight-bold">Confirm password</label>
              <input  type="password" placeholder="********" name="cpassword" required />

            </div>
        </div>
              
             
            
            </div>
            <button type="submit">Register</button>
        </form>
       
        <a href="./signin.php"><button class="link-btn" >Already have an account? Login here.</button></a>
    </div>
        </div>
        </div>
       
      </div>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>