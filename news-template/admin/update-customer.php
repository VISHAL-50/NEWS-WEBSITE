<?php
include("config.php");



$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=$id";


$result = mysqli_query($conn, $sql) or die("connection failed:" . mysqli_connect_errno());
$row = mysqli_fetch_assoc($result);

?>

<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Modify User Details</h1>
            </div>
            <div class="col-md-offset-4 col-md-4">
                <!-- Form Start -->
                <?php

if(isset($_POST['submit'])){
    $fname=mysqli_real_escape_string($conn,$_POST['fname']);//this function is used to prevent storing the characters like # $ etc
    $lname=mysqli_real_escape_string($conn,$_POST['lname']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    
    
    
        $sql3 = "UPDATE users SET fname='$fname', lname='$lname' WHERE id=$id";

        if(mysqli_query($conn,$sql3)){
            header("Location:{$hostname}/admin/customer.php");
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    };
    


?>

                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" value=<?php echo $row['id']; ?>
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control" value="<?php echo $row['fname']; ?>"
                            placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" value="<?php echo $row['lname']; ?>"
                            placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $row['email'];  ?> "
                            placeholder="" readonly required>
                    </div>
                   
            <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
            </form>
            <!-- /Form -->
        </div>
    </div>
</div>
</div>
<?php include "footer.php"; ?>

