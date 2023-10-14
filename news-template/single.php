<?php 
session_start(); 
include("config.php");
 if(!isset($_SESSION["id"])){
    header("Location:{$hostname}");
 }
     ?>
<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                    <?php
                    include("config.php");
                   $post_id=$_GET['id'];

                    $sql = "SELECT post.post_id, post.title, post.description,post.post_date, category.category_name, user.username,post.category, post.post_img,post.author FROM post 
              LEFT JOIN category ON post.category=category.category_id
              LEFT JOIN user ON post.author=user.user_id WHERE post.post_id={$post_id}";
            

                    $result = mysqli_query($conn, $sql) or die("connection failed:" . mysqli_connect_errno());

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $file_name =$row['post_img']; // Replace with your file name
                            $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
                            
                            ?>
                        <div class="post-content single-post">
                            <h3><?php echo $row['title']?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <a href='category.php?cid=<?php echo $row['category']; ?>'><?php echo $row['category_name']?></a>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php?aid=<?php echo $row['author'] ?>'>
                                                        <?php echo $row['username'] ?>
                                                    </a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row['post_date']?>
                                </span>
                            </div>
                            
                            <?php
                                    if (in_array($file_extension, array('mp4', 'avi', 'mov', 'wmv', 'flv', 'mkv'))) {
                                     
                                        ?>
                                        <video autoplay controls>
                                        <source src="admin/upload/.<?php echo $row['post_img']; ?>" type="video/<?php echo $file_extension; ?>">
   
                                                </video>

                                        <?php
                                       
                                       
                                    }
                                    elseif (in_array($file_extension, array('jpg', 'jpeg', 'png', 'gif'))) {
                                        // Display the image if it's one of the supported image formats
                                        echo '<img class="single-feature-image" src="admin/upload/.' . $row['post_img'] . '" alt="" />';
                                    } else {
                                           
                                        }
                                        
                                        ?>  
                            <!-- <img class="single-feature-image" src="admin/upload/.<?php echo $row['post_img']?>" alt="" /> -->
                            <p class="description">
                            <?php echo $row['description']?>
                            </p>
                        </div>
                        <?php
                        }
                        include "comment.php";


                    }else{
                        echo "<h2>No records found</h2>";
                    }
                    ?>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
    </div>
<?php include 'footer.php'; ?>



