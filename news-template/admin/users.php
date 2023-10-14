<?php include "header.php";

 if($_SESSION["user_role"]=='0'){
    header("Location:{$hostname}/admin/post.php");
 }
     ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
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
              $sql="SELECT * FROM user ORDER BY user_id DESC LIMIT {$offset},{$limit}";
              $result=mysqli_query($conn,$sql) or die("connection failed:".mysqli_connect_errno());

              if(mysqli_num_rows($result)>0){
                 
             
          
              ?>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                      <?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['user_id']. "</td>";
    echo "<td class='id'>" . $row['first_name'] ." " . $row['last_name'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    // echo "<td>" . $row['password'] . "</td>";
   if($row['role']==1){
        echo "<td> admin</td>";
    } 
    else{
        echo "<td> normal</td>";
    } "</td>";
    echo "<td class='edit'><a href='update-user.php?id=" . $row['user_id'] . "'><i class='fa fa-edit'></i></a></td>";

    echo "<td class='delete'><a href='delete.php?id=" . $row['user_id'] . "'><i class='fa fa-trash-o'></i></a></td>";
    echo "</tr>";
}
?>

                      
                         
                      </tbody>
                  </table>
                  <?PHP
                   }
                   $sql1="SELECT * FROM user";
                   $result1=mysqli_query($conn,$sql1) or die("Query failed");
                   if(mysqli_num_rows($result1)){
                    $total_records=mysqli_num_rows($result1);
                    
                    $total_page= ceil($total_records/$limit);
                    echo " <ul class='pagination admin-pagination'>";
                    if($page>1){
                         echo '<li><a href="users.php?page='.($page-1).'">prev</a></li>';
                    }

                   
                    for($i=1; $i<=$total_page; $i++){
                        if($i==$page){
                            $active="active";
                        }else{
                            $active="";
                        }
                        echo "<li class='$active'><a href='users.php?page=$i'>$i</a></li>";
                    }
                    if($total_page>$page){
                        echo '<li><a href="users.php?page='.($page+1).'">next</a></li>';
                    }
                  echo "</ul> ";

                   }
                  ?>
            
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
