<?php include("partials/menu.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Change Password - Gada Electronics</title>
     <style>
          .error{
               color:red;
               font-size:20px;
          }

          .success{
               color:green;
               font-size:20px;
          }
          
          table{
               width: 50%;
               border-collapse: collapse;
               text-align:left;
               background:silver;
          }

          table td{
               padding:15px;
               font-family:verdana;
               font-size:20px;
          }

          [type="text"]{
               width:80%;
               font-size:large;
               padding:5px
          }

          #change{
               color: white;
               background-color: orange;
               padding:5px;
               width:40%;
               font-size:large;
               cursor:pointer;
               margin-left: 30%;
          }

          #change:hover{
               background-color: red;
          }

          h1{
               padding:10px;
          }
     </style>
</head>
<body>
     <div class="main-content">
          <center>
               <br>
               <h1>Change Password</h1>
               <br><br>
               <form action="" method="post">
                    <?php
                         if(isset($_SESSION['password-update']))
                         {
                              echo $_SESSION['password-update'];
                              unset($_SESSION['password-update']);
                         }                    
                    ?>
                    <table>
                    
                         <tr>
                              <td>Old Password :</td>
                              <td><input type="text" name="old" required></td>
                         </tr>
                         <tr>
                              <td>New Password :</td>
                              <td><input type="text" name="new" required></td>
                         </tr>
                         <tr>
                              <td>Confirm Password :</td>
                              <td><input type="text" name="confirm" required></td>
                         </tr>
                         
                         <tr>
                              <td colspan="2"><input id="change" type="submit" name="submit" value="Change Password"></td>
                         </tr>
                         
                    </table>
               </form>
               <br><br><br><br>
          </center>
     </div>
     <div class="footer">
          <div class="center">© 2023 - All rights reserved - Gada Electronics</div>
     </div> 
</body>
</html>
<?php
     if(isset($_POST['submit']))
     {
          $email = $_SESSION['user'];

          $res = mysqli_query($con, "SELECT password FROM customer WHERE email='$email'");
          if($res){
               $row=mysqli_fetch_assoc($res);
               $pass = $row['password'];
          }

          $old = md5($_POST['old']);
          $new = md5($_POST['new']);
          $confirm = md5($_POST['confirm']);

          if($old == $pass)
          {
               if($new == $confirm)
               {
                    $sql = "UPDATE customer SET password='$confirm' WHERE email = '$email'";
                    $result = mysqli_query($con, $sql);
                    if($result)
                    {
                         $_SESSION['password-update'] = '<div class="success">* Password updated successfully.</div>';
                         header("Location:".SITEURL."/change-password.php");
                    }
                    else
                    {
                         $_SESSION['password-update'] = '<div class="error">* Failed to update Password.</div>';
                         header("Location:".SITEURL."/change-password.php");
                         die();
                    }
               }
               else
               {
                    $_SESSION['password-update'] = '<div class="error">* New password and Confirm password must be same.</div>';
                    header("Location:".SITEURL."/change-password.php");
                    die();
               }
          }
          else
          {
               $_SESSION['password-update'] = '<div class="error">* Incorrect Old Password.</div>';
               header("Location:".SITEURL."/change-password.php");
               die();
          }              
     }
?>
