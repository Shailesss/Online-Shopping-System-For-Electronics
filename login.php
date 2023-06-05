<?php include("config/constant.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/signup-login.css">
     <link type="" rel="icon" href="images/logo.png">
     <title>Login - Gada Electronics</title>
</head>
<body>
<img id="jetha" src="images/logo.png" alt="">

     <div>
          <div class="main-content">
               <div class="titlebar text-center"><br>
                    <h1>Welcome to Gada Electronics</h1>
                    <p><strong>Gada Electronics</strong> Retail is one stop destination for online electronics appliance shopping in India. Buy online all the products that you need here. Shop online in India through <strong>Gada Electronics</strong>.</p>
               </div>
               <div class="addition text-center">
                    <br>
                    <?php
                         if(isset($_SESSION['signup']))
                         {
                              echo $_SESSION['signup'];
                              unset($_SESSION['signup']);
                         }
                         if(isset($_SESSION['no-login-msg']))
                         {
                              echo $_SESSION['no-login-msg'];
                              unset($_SESSION['no-login-msg']);
                         }
                    ?>
                    <form action="" method="post">
                         <table>
                             <tr><th>Enter your email:</th></tr>
                              <tr><td><input maxlength="50" type="email" name="email" placeholder="Enter your email" required><hr></td></tr>
                              <tr><th>Enter your password:</th></tr>
                              <tr><td><input maxlength="10" type="password" name="password" placeholder="Enter your password" required><hr></td></tr>
                              <tr><td id="btn"><input class="btn-green" name="submit" type="submit" value="Login"></td></tr>
                              <tr><td id="btn">Don't have an acoount? <a href="signup.php" class="btn-blue"> Signup</a></td></tr>
                              <tr><td id="btn"><a href="index.php"><u>Home</u></a></td></tr>
                         </table>
                         <br>
                    </form>
          </div>
     </div>
<?php
if(isset($_POST['submit']))
{
     $email = $_POST['email'];
     $password = md5($_POST['password']);

     if($email=="admin@gmail.com" && $password==md5("admin"))
     {
          $_SESSION['user'] = $email;
          header("location:".SITEURL."/Admin");
     }
     else
     {
          $sql = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
          $res = mysqli_query($con, $sql) or die(mysqli_error($con));
          $count = mysqli_num_rows($res);
          if($count>0)
          {
               $_SESSION['user'] = $email;
               $row = mysqli_fetch_assoc($res);
               
               $fname = $row['first_name'];
               setcookie("name",$fname);
               header("location:".SITEURL."/home-page.php");
          }
          else
          {
               $_SESSION['signup'] = '<div class="error">You are not registered user. Kindly sign up first.</div>';
               header("location:".SITEURL."/login.php");
          }
     }
}
?>
</body>
</html>