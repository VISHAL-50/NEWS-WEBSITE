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
                    if(isset($_GET['search'])){
                        $serach_term=mysqli_real_escape_string($conn,$_GET['search']);
                       
                    }
                    ?>

                    <h2 class="page-heading">Search:<?php echo $serach_term; ?></h2>
                <?php
                
                    $limit = 3;

                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                      
                    } else {
                        $page = 1;
                    }
                    
                    $offset = ($page - 1) * $limit;
                    // $offset=3;


                    $sql = "SELECT post.post_id, post.title, post.description,post.post_date, category.category_name, user.username,post.category, post.post_img,post.author FROM post 
              LEFT JOIN category ON post.category=category.category_id
              LEFT JOIN user ON post.author=user.user_id
              WHERE post.title LIKE '%{$serach_term}%' OR post.description LIKE '%{$serach_term}%'
              ORDER BY post.post_id DESC LIMIT {$offset},{$limit} ";
            //  echo $sql;
            //  die();
                    $result = mysqli_query($conn, $sql) or die("connection failed:" . mysqli_connect_errno());

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $file_name =$row['post_img']; // Replace with your file name
                            $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
                            ?>
                            <div class="post-content">
                                <div class="row">
                                    <div class="col-md-4">
                                    <?php
                                     if (in_array($file_extension, array('mp4', 'avi', 'mov', 'wmv', 'flv', 'mkv'))) {
                                        // Display the video if it's one of the supported video formats
                                        echo '<a class="post-img" href="single.php?id=' . $row['post_id'] . '">';
                                        ?>
                                        <video autoplay muted>
    <source src="admin/upload/.<?php echo $row['post_img']; ?>" type="video/<?php echo $file_extension; ?>">
   
</video>

                                        <?php
                                        echo '</a>'; // Add a semicolon here
                                       
                                    }
                                    if (in_array($file_extension, array('jpg', 'jpeg', 'png', 'gif'))) {
                                        // Display the image if it's one of the supported image formats
                                        ?>
                                        <a class="post-img" href="single.php?id=<?php echo $row['post_id']; ?>">
                                            <img src="admin/upload/.<?php echo $row['post_img']; ?>" alt="" />
                                        </a>
                                        <?php
                                    
                                    }else {
                                        
                                    }
                                    
                                        
                                        ?>  
                                    </div>
                                    <div class="col-md-8">
                                        <div class="inner-content clearfix">
                                            <h3><a href='single.php?id=<?php echo $row['post_id']; ?>'><?php echo $row['title'] ?></a>
                                            </h3>
                                            <div class="post-information">
                                                <span>
                                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                                    <a href='category.php?cid=<?php echo $row['category']; ?>'><?php echo $row['category_name']?></a>
                                                </span>
                                                <span>
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <a href='author.php?search=<?php echo $row['author'] ?>'>
                                                        <?php echo $row['username'] ?></a>
                                                </span>
                                                <span>
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    <?php echo $row['post_date'] ?>
                                                </span>
                                            </div>
                                            <p class="description">
                                                <?php echo substr($row['description'], 0, 130) . "..." ?>
                                            </p>
                                            <a class='read-more pull-right'
                                                href='single.php?id=<?php echo $row['post_id']; ?>'>read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<h2 class='no_record'>No records found.......</h2>";
                    }
                

                 
                    $sql1 = "SELECT * FROM post 
                         WHERE post.title LIKE '%{$serach_term}%'";
                        $result1 = mysqli_query($conn, $sql1) or die("Query failed");
                        $row1=mysqli_fetch_assoc($result1);
    
                if (mysqli_num_rows($result1)>0) {
                    $total_records = mysqli_num_rows($result1);

                    $total_page = ceil($total_records / $limit);
                    echo " <ul class='pagination admin-pagination'>";
                    if ($page > 1) {
                        echo '<li><a href="search.php?search='.$serach_term.'&page=' . ($page - 1) . '">prev</a></li>';
                    }


                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i == $page) {
                            $active = "active";
                        } else {
                            $active = "";
                        }
                        echo "<li class='$active'><a href='search.php?search=".$serach_term."&page=" .$i. "'>$i</a></li>";
                    }
                    if ($total_page > $page) {
                        
                        // echo '<li><a href="index.php?search=' . $serach_term . '&page=' . ($page + 1) . '">next</a></li>';
                        echo '<li><a href="search.php?search='.$serach_term.'&page=' . ($page + 1) . '">next</a></li>';


                    }
                    echo "</ul> ";

                }
                ?>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
    </div>
<?php include 'footer.php'; ?>
