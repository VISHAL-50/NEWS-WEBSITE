<?php
include("config.php");
if(isset($_FILES['fileToUpload'])){
    $errors=array();
    $file_name=$_FILES['fileToUpload']['name'];
    $file_size=$_FILES['fileToUpload']['size'];
    $file_temp=$_FILES['fileToUpload']['tmp_name'];
    $file_type=$_FILES['fileToUpload']['type'];
    $file_ext1=explode('.',$file_name);
    $file_ext=strtolower(end($file_ext1));
    $extension = array("jpeg", "jpg", "png", "gif", "mp4", "avi", "mov", "wmv", "flv", "mkv");

    if(in_array($file_ext,$extension)===false){
        $errors[]="this extension file is not allowed, please choose jpeg or png file" ;
    }
    if($file_size > 20971520){
        $errors[]="filoe size must be 20mb or lower";
    }
    if(empty($errors)==true){
        move_uploaded_file($file_temp,"upload/.$file_name");
    }
    else{
        print_r($errors);
        die();
    }
}
session_start();
$title= mysqli_real_escape_string($conn,$_POST['post_title']);; 
$description= mysqli_real_escape_string($conn,$_POST['postdesc']);
$category= mysqli_real_escape_string($conn,$_POST['category']);
echo $category;

$date= date("d M, Y");
 $author=$_SESSION['user_id'];

 $sql="INSERT INTO post(title, description, category, post_date, author, post_img) VALUES ('$title', '$description', $category, '$date', $author, '$file_name');";
 $sql.="UPDATE category SET post = post + 1 WHERE category_id={$category}";
 
 if(mysqli_multi_query($conn, $sql)){
     header("Location: {$hostname}/admin/post.php");
 }
 else{
     echo "<div class='alert alert-danger'>Query failed</div>";
 }

?>