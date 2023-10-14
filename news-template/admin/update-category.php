<?php
include "header.php";
include "config.php";


    $id = $_GET['id'];
    
    // Select the category with the given ID
    $sql = "SELECT * FROM category WHERE category_id=$id";
    $result = mysqli_query($conn, $sql) or die("Connection failed: " . mysqli_connect_errno());
    $row = mysqli_fetch_assoc($result);

    // Check if the category exists
    if ($row) {
        if (isset($_POST['submit'])) {
            $category_name = mysqli_real_escape_string($conn, $_POST['cat_name']);
            
            // Update the category
            $sql3 = "UPDATE `category` SET category_name='$category_name' WHERE category_id=$id";
            if (mysqli_query($conn, $sql3)) {
                header("Location: {$hostname}/admin/category.php");
                exit(); // Make sure to exit after the header redirection
            } else {
                echo "Can't update this record: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Category not found.";
    }

?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Update Category</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>" method="POST">
                    <input type="hidden" name="cat_id" class="form-control" value="<?php echo $row['category_id']; ?>">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']; ?>" placeholder="" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" required>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
