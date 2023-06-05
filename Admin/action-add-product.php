<?php
include("../config/constant.php");

     $id = $_POST['id'];
     $name = $_POST['title'];
     $category = $_POST['category'];
     $price = $_POST['price'];
     $stock = $_POST['stock'];

     if((isset($_FILES['image1']['name'])) && (isset($_FILES['image2']['name'])) && (isset($_FILES['image3']['name'])))
     {
          $image1 = $_FILES['image1']['name'];
          $image2 = $_FILES['image2']['name'];
          $image3 = $_FILES['image3']['name'];
          
          $extension1 = explode('.',$image1)[1];
          $extension2 = explode('.',$image2)[1];
          $extension3 = explode('.',$image3)[1];

          $image_name1 = "Product_".$id."_A.".$extension1;
          $image_name2 = "Product_".$id."_B.".$extension2;
          $image_name3 = "Product_".$id."_C.".$extension3;

          $source1 = $_FILES['image1']['tmp_name'];
          $source2 = $_FILES['image2']['tmp_name'];
          $source3 = $_FILES['image3']['tmp_name'];

          $destination1 = "../images/".$image_name1;
          $destination2 = "../images/".$image_name2;
          $destination3 = "../images/".$image_name3;
     }
     else
     {
          $image_name1 = "";
          $image_name2 = "";
          $image_name3 = "";
     }

     $sql = "INSERT INTO product SET product_name = '$name', product_category = '$category', price = $price, product_stock= $stock, image1 = '$image_name1', image2 = '$image_name2', image3 = '$image_name3'";

     $result = mysqli_query($con, $sql);
     if($result == TRUE)
     {
          $upload1 = move_uploaded_file($source1,$destination1);
          $upload2 = move_uploaded_file($source2,$destination2);
          $upload3 = move_uploaded_file($source3,$destination3);

          if($upload1 ==false && $upload2==false && $upload3==false)
          {
               $_SESSION['upload'] = "<div class='error'>* Failed to upload image.</div>";
               header("location:".SITEURL."/Admin/add-product.php");
          }
          
          $_SESSION['product-add'] = "<div class='success'>* Product added successfully</div>";
          header("location:".SITEURL."/Admin/add-product.php");
     }
     else
     {
          
          $_SESSION['product-add'] = "<div class='error'>* Failed to add product.</div>";
        header("location:".SITEURL."/Admin/add-product.php");
     }
     
?>