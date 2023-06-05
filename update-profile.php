<?php include("partials/menu.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Update profile - Gada Electronics</title>
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
               padding:10px;
               font-family:verdana;
               font-size:20px;
          }

          [type="text"], [type="tel"],[type="email"],[type="number"],textarea{
               width:80%;
               font-size:large;
               padding:5px
          }

          a{
               color: red;
               text-decoration:none;
          }
          a:hover{
               color: blue;
          }

          #change{
               color: white;
               background-color: orangered;
               padding:5px;
               width:50%;
               font-size:large;
               cursor:pointer;
               margin-left: 25%;
          }
     </style>
</head>
<body>
     <div class="main-content">
          <center>
          <form action="" method="post">
               <?php
                    if(isset($_SESSION['address-update']))
                    {
                         echo $_SESSION['address-update'];
                         unset($_SESSION['address-update']);
                    }

                    $mail = $_SESSION['user'];
                    $query="SELECT * FROM customer WHERE email='$mail'";
                    $res = mysqli_query($con,$query);
                    if($res)
                    {
                         if(mysqli_num_rows($res)>0)
                         {
                              $row = mysqli_fetch_assoc($res);
                         }
                         else
                         {
                              $_SESSION['no-login-msg'] = '<div class="error">* Something went wrong! Try again!</div>';
                              header("Location:".SITEURL."/login.php");
                         }
                    }
               ?>
               <table>
                    <tr>
                         <td>First Name :</td>
                         <td><input type="text" name="fname" value="<?php echo $row['first_name'] ?>" required></td>
                    </tr>
                    <tr>
                         <td>Last Name :</td>
                         <td><input type="text" name="lname" value="<?php echo $row['last_name'] ?>" required></td>
                    </tr>
                    <tr>
                         <td>Mobile Number :</td>
                         <td><input type="tel" pattern="[789][0-9]{9}" name="mobile" value="<?php echo $row['mobile_number'] ?>" required></td>
                    </tr>
                    <tr>
                         <td>Email :</td>
                         <td><input type="email" name="email" value="<?php echo $row['email'] ?>" required></td>
                    </tr>
                    <tr>
                         <td>Address :</td>
                         <td><textarea name="address" cols="30" rows="4" required><?php echo $row['address'] ?></textarea></td>
                    </tr>
                    <tr>
                         <td>City :</td>
                         <td><input type="text" name="city" value="<?php echo $row['city'] ?>" required></td>
                    </tr>
                    <tr>
                         <td>State :</td>
                         <td><input type="text" name="state" value="<?php echo $row['state'] ?>" required></td>
                    </tr>
                    <tr>
                         <td>Pincode :</td>
                         <td><input type="number" maxlength="6" name="pincode" value="<?php echo $row['pincode'] ?>" required></td>
                    </tr>
                    <tr>
                         <td colspan="2"><input id="change" type="submit" name="submit" value="Update"></td>
                    </tr>
                    <tr>
                         <td></td>
                         <td>Click to<a href="change-password.php"> CHANGE PASSWORD</a></td>
                    </tr>
               </table>
          </form>
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
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $mobile = $_POST['mobile'];
          $email = $_POST['email'];
          $address = $_POST['address'];
          $city = $_POST['city'];
          $state = $_POST['state'];
          $pincode = $_POST['pincode'];

          $sql = "UPDATE customer SET first_name='$fname', last_name='$lname', mobile_number='$mobile', email='$email', address = '$address', city='$city', state='$state', pincode='$pincode' WHERE email = '$mail'";
          $result = mysqli_query($con, $sql);
          if($result)
          {
               if($_GET['flag']==1)
               {
                    header("Location:".SITEURL."/place-order.php");
               }
               else
               {
                    $_SESSION['address-update'] = '<div class="success">* Record updated successfully.</div>';
                    header("Location:".SITEURL."/update-profile.php");
               }
               
          }
          else
          {
               $_SESSION['address-update'] = '<div class="error">* Failed to update record.</div>';
               header("Location:".SITEURL."/update-profile.php");
          }
     }
?>
