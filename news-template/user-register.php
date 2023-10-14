<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User | Register</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/logo.png" type="images/icon">
</head>
<body>
<?php
include("config.php");

if (isset($_POST['register'])) {
    session_start();
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql1 = "SELECT email FROM users WHERE email='{$email}'";

    $result = mysqli_query($conn, $sql1) or die("connection failed:" . mysqli_connect_errno());

    if (mysqli_num_rows($result) > 0) {
        echo "<p style='color:red; text-align:center; margin:10px 0px;'>User already exists.</p>";
    } else {
        $sql = "INSERT INTO users(fname, lname, email, password) VALUES('$fname','$lname','$email','$password')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION["fname"] = $fname; // Set session variables
            $_SESSION["lname"] = $lname;
            $_SESSION["email"] = $email;
            header("Location: {$hostname}/index.php");
        }
    }
}
?>

<div id="wrapper-admin" class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-4">
                <img class="logo" src="images/news.png">
                <h3 class="heading">User</h3>
                <!-- Form Start -->
                <form action="" method="POST">
                    <div class="form-group">
                        <label>first name</label>
                        <div class="search-post">
                            <input type="text" name="fname" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>last name</label>
                        <div class="search-post">
                            <input type="text" name="lname" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <div class="search-post">
                            <input type="email" name="email" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="" required>
                    </div>
                    <input type="submit" name="register" class="btn btn-primary" value="Register" />
                </form>
                <!-- /Form End -->
            </div>
        </div>
    </div>
</div>
</body>
</html>
