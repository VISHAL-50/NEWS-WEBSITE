<?php
session_start();
$user_profile = $_SESSION["username"];
include("config.php");

if (!isset($user_profile)) {
    header("Location: $hostname/admin");
    exit(); // Make sure to exit after the header redirection.
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN Panel</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="../css/font-awesome.css">
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="../css/style.css">
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Questrial&family=Scope+One&display=swap"
        rel="stylesheet">
</head>
<body>
    <!-- HEADER -->
    <div id="header-admin">
        <div class="container">
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-2">
                    <a href="post.php"><img class="logo" src="images/news.png"></a>
                </div>
                <!-- /LOGO -->
                <!-- LOGOUT -->
                <div class="col-md-offset-9 col-md-3">
                    <a href="logout.php" class="admin-logout">Hello&nbsp; <?php echo $_SESSION["username"]; ?>&nbsp; logout</a>
                </div>
                <!-- /LOGOUT -->
            </div>
        </div>
    </div>
    <!-- /HEADER -->

    <!-- Menu Bar -->
    <div id="admin-menubar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="admin-menu">
                        <li>
                            <a href="post.php">Post</a>
                        </li>
                        <?php
                        if ($_SESSION["user_role"] == '1') {
                            ?>
                            <li>
                                <a href="category.php">Category</a>
                            </li>
                            <li>
                                <a href="users.php">Users</a>
                            </li>
                            <li>
                                <a href="customer.php">Customers</a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /Menu Bar -->

    <!-- Your content goes here -->
    

