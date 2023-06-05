<?php 
     include("partials/menu.php");
     $email = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="stylesheet" href="css/message-us.css">
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Message our team - Gada Electronics</title>
</head>
<body>
    <div class="main-content"><br>
          <h1 class="color-red centar">Message our team</h1><br><br>
          <?php
               if(isset($_SESSION['msg']))
               {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
               }
          ?>
          <form class="centar" action="" method="post">
               <input type="text" id="m-sub" name="subject" placeholder="Enter your issue in short" required><br><br>
               <textarea name="message" placeholder="Describe your issue" cols="30" rows="10" required></textarea><br><br>
               <input type="submit" id="submit" name="submit" value="Send"> <br><br><br>    
          </form>
          <?php
               if(isset($_POST['submit']))
               {
                    $subject = $_POST['subject'];
                    $message = $_POST['message'];
                    $sql = "INSERT INTO message SET email='$email', message_date= sysdate(), subject='$subject', message_body='$message', reply='in process'";
                    $res = mysqli_query($con,$sql);
                    if($res)
                    {
                         $_SESSION['msg'] = '<div class="win"><br><h3>* Message sent ! Our team will call you soon.</h3><br></div>';
                         header("location:".SITEURL."/message-us.php");
                    }
                    else
                    {
                         $_SESSION['msg'] = '<div class="loss"><br><h3>* Something went wrong, try again!</h3><br></div>';
                         header("location:".SITEURL."/message-us.php");
                    }
               }
          ?>
    </div>
    <div class="main-content">
          <hr>
          <center>
          <br>
          <h3><u>Your issues</u> :</h3>
          <br><br>
          <table>
               <tr>
                    <th>Sr.Number</th>
                    <th>Date</th>
                    <th>Issue</th>
                    <th>Description</th>
                    <th>Status of request</th>
               </tr>
               <?php
                    $sql2 = "SELECT * FROM message WHERE email = '$email' ORDER BY message_date";
                    $res2 = mysqli_query($con, $sql2);
                    $count = mysqli_num_rows($res2);
                    $num = 1;
                    if($count>0)
                    {
                         while($row = mysqli_fetch_assoc($res2))
                         {
               ?>
                              <tr><td><?php echo $num++; ?></td>
                              <td><?php echo $row['message_date']; ?></td>
                              <td><?php echo $row['subject']; ?></td>
                              <td><?php echo $row['message_body']; ?></td>
                              <td><?php echo $row['reply']; ?></td></tr>              
               <?php
                         }
                    } 
                    else
                    {
               ?>
                         <tr><td colspan="5"><h2 class="win">No issues found. It seems like you are our happy customer.</h2></td></tr>
               <?php
                    }
               ?>
          </table>
          </center>
          <br><br>
    </div>
</body>
</html>
<?php include("partials/footer.php");?>