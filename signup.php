<?php include("config/constant.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="images/logo.png">
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/signup-login.css">
     <title>Signup - Gada Electronics</title>
</head>
<body>
<img id="jetha" src="images/logo.png" alt="">
               <div class="titlebar text-center">
                    <h1>Welcome to Gada Electronics</h1>
                    <p><strong>Gada Electronics</strong> Retail is one stop destination for online electronics appliance shopping in India. Buy online all the products that you need here. Shop online in India through <strong>Gada Electronics</strong>.</p>
               </div>
               <div class="addition text-center">
                    <?php
                         if(isset($_SESSION['signup']))
                         {
                              echo $_SESSION['signup'];
                              unset($_SESSION['signup']);
                         }
                    ?>
                    <form action="" method="post">
                         <table>
                              <tr><th>Enter your first name:</th></tr>
                              <tr><td><input maxlength="20" type="text" pattern="[a-zA-Z ]+" title="Must contains characters{a-z A-Z}" name="fname" placeholder="Enter your first name" required autofocused><hr></td></tr>
                              <tr><th>Enter your last name:</th></tr>
                              <tr><td><input maxlength="20" type="text" pattern="[a-zA-Z ]+" title="Must contains characters{a-z, A-Z}" name="lname" placeholder="Enter your last name" required><hr></td></tr>
                              <tr><th>Enter your mobile number:</th></tr>
                              <tr><td><input maxlength="10" type="tel" pattern="[789][0-9]{9}" name="mob" placeholder="Enter your mobile number" required><hr></td></tr>
                              <tr><th>Enter your email:</th></tr>
                              <tr><td><input maxlength="50" type="email" name="email" pattern="[a-z0-9]+@[a-z]+\.[a-z]{2,}$" placeholder="Enter your email" required><hr></td></tr>
                              <tr><th>Enter your password:</th></tr>
                              <tr><td><input maxlength="10" type="password" name="password" placeholder="Enter your password" required><hr></td></tr>
                              <tr><td id="btn"><input class="btn-green" type="submit" name="submit" value="Signup"></td></tr>
                              <tr><td id="btn">Already user? <a href="login.php" class="btn-blue"> Login</a></td></tr>
                         </table>
                    </form>
               </div><br>
</body>
</html>
<?php 
if(isset($_POST['submit']))
{
     $firstname = $_POST['fname']; 
     $lastname = $_POST['lname']; 
     $mob = $_POST['mob']; 
     $password = md5($_POST['password']); 
     $email = $_POST['email']; 

     $sql = "INSERT INTO customer SET first_name='$firstname', last_name='$lastname', mobile_number='$mob', password='$password', email='$email'";
     $r = mysqli_query($con, $sql);// or die(mysqli_error($con));
     if($r)
     {
          $_SESSION['signup'] = '<div class="success">* Registration successful. Please login here</div>';
          header("location:".SITEURL."/login.php");
     }
     else
     {
          $_SESSION['signup'] = '<div class="error">* Something went wrong. Enter valid details.</div>';
          header("location:".SITEURL."/signup.php");
     }
}
?>