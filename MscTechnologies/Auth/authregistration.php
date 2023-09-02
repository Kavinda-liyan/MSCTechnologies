<?php
$user =$_POST['username'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$cemail=$_POST['cemail'];
$password=md5($_POST['password']);
$cpassword=md5($_POST['cpassword']);

if(!empty($user) || !empty($address1) || !empty($address2) || !empty($address2) || !empty($phone) || !empty($email) || !empty($cemail) || !empty($password) || !empty($cpassword))
{
    $host ="localhost";
    $dbUsername="root";
    $dbPassword ="";
    $dbname="msctechnologies";

    // create Connection

    $conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);

    if(mysqli_connect_error()){
        die('Connection Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    elseif($_POST['password'] != $_POST['cpassword']){
        echo '<script>alert("Password Dose not match") </script>';
        ob_flush();
        flush();

        
        die ();
        
    }
    elseif($_POST['password'] <8 ){
        echo '<script>alert("Password should be 8 characters") </script>';
        ob_flush();
        flush();

        die ();
        
    }
    elseif($_POST['email'] == $_POST['cemail'] && $_POST['password'] == $_POST['password'] ){
        $SELECT = "SELECT email From user Where email= ? Limit 1";
        $INSERT = "INSERT Into user(username, address1, address2 , phone, email, cemail,password, cpassword )
         values(?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($SELECT);
                $stmt->bind_param("s",$email);
                $stmt->execute();
                $stmt->bind_result($email);
                $stmt->store_result();
                $rnum = $stmt->num_rows;

                if($rnum==0){
                    $stmt->close();
                    $stmt =$conn->prepare($INSERT);
                    $stmt->bind_param("sssissss",$user, $address1, $address2, $phone, $email, $cemail, $password, $cpassword);
                    $stmt->execute();
                    echo "<script>alert('Registered Successfully!')</script>";
                    ob_flush();
                    flush();

                    
                    header('Location: ../signin.php');
                }
                else{
                    echo '<script>alert("Already registerd using this email")</script>';
                    

                    header('location: ../register.php');
                }
                $stmt->close();
                $conn->close();

    }
    else{
        echo '<script>alert("Password or Email did not matching")</script>';
        die();
    }

}
else{
    echo '<script>alert("All field are required")</script>';
        
}

?>