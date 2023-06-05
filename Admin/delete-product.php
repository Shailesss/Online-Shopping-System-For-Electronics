<?php
include("../config/constant.php");

$id = $_GET['id'];
$img1 = $_GET['img1'];
$img2 = $_GET['img2'];
$img3 = $_GET['img3'];

$path1 = "../images/product/".$img1;
$path2 = "../images/product/".$img2;
$path3 = "../images/product/".$img3;

$sql = "DELETE FROM product WHERE id = $id";
$res = mysqli_query($con, $sql);
if($res)
{
     $_SESSION['product-delete'] = "<div class=\"success\">* Product deleted successfully.</div><br>";
     unlink($path1);
     unlink($path2);
     unlink($path3);
     header('location:'.SITEURL.'/Admin/manage-product.php');
}
else
{
     $_SESSION['product-delete'] = "<div class=\"error\">* Failed to delete product.</div><br>";
     header('location:'.SITEURL.'/Admin/manage-product.php');
}
?>