<?php


include("config.php");
$id = $_GET['id'];
$sql="DELETE FROM `category` WHERE category_id=$id";
mysqli_query($conn, $sql) or die("connection failed:" . mysqli_connect_errno());
if(mysqli_query($conn,$sql)){
    header("Location:{$hostname}/admin/category.php");
} else {
    echo "cant delete this recor record. " . mysqli_error($conn);
}
?>