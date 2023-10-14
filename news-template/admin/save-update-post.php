<?php
include("config.php");


if(empty($_FILES['new-image']['name'])){
    $file_name=$_POST['old-image'];
}

else{

    $errors=array();
    $file_name=$_FILES['new-image']['name'];
    $file_size=$_FILES['new-image']['size'];
    $file_temp=$_FILES['new-image']['tmp_name'];
    $file_type=$_FILES['new-image']['type'];
    $file_ext1=explode('.',$file_name);
    $file_ext=strtolower(end($file_ext1));
    $extension=array("jpeg","jpg","png");
    if(in_array($file_ext,$extension)===false){
        $errors[]="this extension file is not allowed, please choose jpeg or png file" ;
    }
    if($file_size > 2097152){
        $errors[]="filoe size must be 2mb or lower";
    }
    if(empty($errors)==true){
        move_uploaded_file($file_temp,"upload/.$file_name");
    }
    else{
        print_r($errors);
        die();
    }
}

$sql ="UPDATE post SET title='{$_POST["post_title"]}',description='{$_POST["postdesc"]}',category={$_POST["category"]},post_img='{$file_name}' WHERE post_id={$_POST["post_id"]}";

  
$result =mysqli_query($conn,$sql);
if($result){
    header("Location: {$hostname}/admin/post.php");
}
else{
    echo "Query failed";
}
?> 