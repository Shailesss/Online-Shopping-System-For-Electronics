<?php
include("../config/constant.php");
$id=$_GET['id'];
$sql = "UPDATE message SET reply='Solved' WHERE id=$id";
$res = mysqli_query($con,$sql) OR die(mysqli_error($con));
header("location:".SITEURL."/Admin/manage-message.php");
?>