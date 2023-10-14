<?php 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- <title>News</title> -->
      <!-- Bootstrap -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/comment.css">

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Questrial&family=Scope+One&display=swap"
        rel="stylesheet">
    <?php
// Extract the filename from the URL
$currentPage = basename($_SERVER['PHP_SELF']);

switch ($currentPage) {
    case "single.php":
        echo '<title>new-site</title>';
        break;
    case "category.php":
        echo "<title>new-site</title>";
        break;
    case "search.php":
        echo "<title>search</title>";
        break;
    case "author.php":
        echo "<title>author</title>";
        break;
    default:
        echo "<title>Home</title>";
        break;
}
    ?>
  
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="images/news.png"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                include("config.php");
                if(isset($_GET['cid'])){
                    $cat_id=$_GET['cid'];
                }

                $sql="SELECT * FROM category WHERE post > 0 ";
                $result = mysqli_query($conn, $sql) or die("connection failed:CATEGORY" . mysqli_connect_errno());

                if(mysqli_num_rows($result) > 0) {
                    $active = "";

                    echo "<ul class='menu'>";
                    echo "<li><a class='{$active}' href='$hostname'>Home</a></li>";

                    while ($row = mysqli_fetch_assoc($result)) {
                        if(isset($_GET['cid'])){
                            if($row['category_id'] == $cat_id){
                                $active = "active";
                            }
                            else{
                                $active = "";
                            }
                        }
                        echo "<li><a class='{$active}' href='category.php?cid={$row['category_id']}'>{$row['category_name']}</a></li>";
                    }

                    echo "</ul>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->