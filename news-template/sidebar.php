<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <!-- <button type="submit" class="btn btn-danger">Search</button> -->
                    <button type="submit" class="fa fa-search btn " name="serach_box"> </button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
        <?php
        include("config.php");
        $limit = 3;




        $sql = "SELECT post.post_id, post.title,post.post_date, category.category_name, post.category, post.post_img 
         FROM post 
   LEFT JOIN category ON post.category=category.category_id
   ORDER BY post.post_id DESC LIMIT {$limit} ";

        $result = mysqli_query($conn, $sql) or die("connection failed: Recent post" . mysqli_connect_errno());

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $file_name = $row['post_img']; // Replace with your file name
                $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

                ?>
                <div class="recent-post">


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

                    } else {

                    }


                    ?>
                    <div class="post-content">
                        <h5><a href='single.php?id=<?php echo $row['post_id']; ?>'>
                                <?php echo substr($row['title'], 0, 15) . "..." ?>
                            </a></h5>
                        <span>
                            <i class="fa fa-tags" aria-hidden="true"></i>
                            <a href='category.php?cid=<?php echo $row['category']; ?>'>
                                <?php echo $row['category_name'] ?>
                            </a>
                        </span>
                        <span>
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <?php echo $row['post_date'] ?>
                        </span>
                        <a class="read-more" href='single.php?id=<?php echo $row['post_id']; ?>'>read more</a>
                    </div>
                </div>

            <?php }
            
        } else {
            echo "failed";
        }
        ?>
        <!-- /recent posts box -->

    </div>