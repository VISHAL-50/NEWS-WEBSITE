<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User | Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/logo.png" type="images/icon">
</head>

<body>
    <div id="wrapper-admin" class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <img class="logo" src="images/news.png">
                    <h3 class="heading">User</h3>
                    <!-- Form Start -->
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
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
                        <input type="submit" name="login" class="btn btn-primary" value="login" />
                    </form>
                    <!-- Form End -->
                    <?php
                    if (isset($_POST['login'])) {
                        session_start();
                        include("config.php");

                        $email = mysqli_real_escape_string($conn, $_POST['email']);
                        $password = mysqli_real_escape_string($conn, $_POST['password']);

                        $sql = "SELECT id, fname, lname, email FROM users WHERE email='$email' AND password='$password'";
                        $result = mysqli_query($conn, $sql) or die("Query failed");

                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION["fname"] = $row['fname'];
                            $_SESSION["lname"] = $row['lname'];
                            $_SESSION["email"] = $row['email'];
                            $_SESSION["id"] = $row['id'];

                            header("Location: index.php"); // Make sure $hostname is correctly set
                            exit;
                        } else {
                            echo "<div class='alert alert-danger'>Email and Password do not match</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
