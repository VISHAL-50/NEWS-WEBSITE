
<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
              <?php
              include("config.php");
              $limit=3;
              
              if(isset($_GET['page'])){
                $page=$_GET['page'];
              }
              else{
                $page=1;
              };
              $offset=($page-1)*$limit;
              if($_SESSION["user_role"]=='1'){

           
              $sql="SELECT post.post_id, post.title, post.description,post.post_date, category.category_name, user.username,post.category FROM post 
              LEFT JOIN category ON post.category=category.category_id
              LEFT JOIN user ON post.author=user.user_id
              ORDER BY post.post_id DESC LIMIT {$offset},{$limit} ";
              }
              elseif($_SESSION["user_role"]=='0'){
                $sql="SELECT post.post_id, post.title, post.description,post.post_date, category.category_name, user.username,post.category FROM post 
              LEFT JOIN category ON post.category=category.category_id
              LEFT JOIN user ON post.author=user.user_id
              WHERE post.author={$_SESSION['user_id']}
              ORDER BY post.post_id DESC LIMIT {$offset},{$limit} ";
              }
              $result=mysqli_query($conn,$sql) or die("connection failed:".mysqli_connect_errno());

              if(mysqli_num_rows($result)>0){
                 
             
          
              ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                      <?php
while ($row = mysqli_fetch_assoc($result)) {
                          echo "<tr>";
                              echo "<td>" . $row['post_id']. "</td>";
                              echo "<td>" . $row['title']. "</td>";
                              echo "<td>" . $row['category_name']. "</td>";
                              echo "<td>" . $row['post_date']. "</td>";
                              echo "<td>" . $row['username']. "</td>";
                              echo "<td class='edit'><a href='update-post.php?id=" . $row['post_id'] . "'><i class='fa fa-edit'></i></a></td>";
                              echo "<td class='edit'><a href='delete-post.php?id=" . $row['post_id'] . "&catid=" . $row['category'] . "'><i class='fa fa-trash-o'></i></a></td>";

                            echo "</tr>";
}
                          ?>
                      </tbody>
                  </table>
                  <?PHP
                  
                   }
              
                   $sql1="SELECT * FROM post ";
                   $result1=mysqli_query($conn,$sql1) or die("Query failed");
                   if(mysqli_num_rows($result1)){
                    $total_records=mysqli_num_rows($result1);
                    
                    $total_page= ceil($total_records/$limit);
                    echo " <ul class='pagination admin-pagination'>";
                    if($page>1){
                         echo '<li><a href="post.php?page='.($page-1).'">prev</a></li>';
                    }

                   
                    for($i=1; $i<=$total_page; $i++){
                        if($i==$page){
                            $active="active";
                        }else{
                            $active="";
                        }
                        echo "<li class='$active'><a href='post.php?page=$i'>$i</a></li>";
                    }
                    if($total_page>$page){
                        echo '<li><a href="post.php?page='.($page+1).'">next</a></li>';
                    }
                  echo "</ul> ";

                   }
                  ?>
                 
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
                