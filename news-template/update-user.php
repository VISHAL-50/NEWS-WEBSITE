<?php
include("config.php");



$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=$id";


$result = mysqli_query($conn, $sql) or die("connection failed:" . mysqli_connect_errno());
$row = mysqli_fetch_assoc($result);

?>


<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User | update</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/logo.png" type="images/icon">
</head>
<body>
<?php
include("config.php");


if(isset($_POST['update'])){
    $fname=mysqli_real_escape_string($conn,$_POST['fname']);//this function is used to prevent storing the characters like # $ etc
    $lname=mysqli_real_escape_string($conn,$_POST['lname']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    
    $role=mysqli_real_escape_string($conn,$_POST['role']);

    
        $sql3 = "UPDATE users SET fname='$fname', lname='$lname', email='$email' WHERE id=$id";

        if(mysqli_query($conn,$sql3)){
            header("Location:{$hostname}");
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    };
    

?>

<div id="wrapper-admin" class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-4">
                <img class="logo" src="images/news.png">
                <h3 class="heading">Update user </h3>
                <!-- Form Start -->
                <form action="" method="POST">
                    <div class="form-group">
                        <label>first name</label>
                        <div class="search-post">
                            <input type="text" name="fname" class="form-control"  value=<?php echo $row['fname']; ?> required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>last name</label>
                        <div class="search-post">
                            <input type="text" name="lname" class="form-control"  value=<?php echo $row['lname']; ?> required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <div class="search-post">
                            <input type="email" name="email" class="form-control"  value=<?php echo $row['email']; ?> readonly>
                        </div>
                    </div>
                   
                    <input type="submit" name="update" class="btn btn-primary" value="update" />
                </form>
                <!-- /Form End -->
            </div>
        </div>
    </div>
</div>
</body>
</html>
