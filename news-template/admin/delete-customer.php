<?php

if($_SESSION["user_role"]=='0'){
    header("Location:{$hostname}/admin/post.php");
 }
include("config.php");
$id = $_GET['id'];
$sql="DELETE FROM `users` WHERE id=$id";
mysqli_query($conn, $sql) or die("connection failed:" . mysqli_connect_errno());
if(mysqli_query($conn,$sql)){
    header("Location:{$hostname}/admin/customer.php");
} else {
    echo "cant delete this recor record. " . mysqli_error($conn);
}
?>