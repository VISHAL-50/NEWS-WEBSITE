<style>
  .profile {
    position: absolute;
    bottom: 128%;
    right: -19rem;
    background-color: var(--white);
    border-radius: 0.55rem;
    padding: 2rem;
    text-align: center;
    width: 30rem;
    transform: scale(0);
    transform-origin: bottom left;
    transition: .2s linear;
    box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
  }

  .active {
    transform: scale(1);
  }

  .profile img {
    height: 10rem;
    width: 10rem;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 5rem;
  }

  .profile h3 {
    font-size: 2rem;
    color: var(--black);
  }

  .profile span {
    color: var(--light-bg);
    font-size: 1.65rem;
  }
</style>

<script>
  
</script>
<?php
include "config.php";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE id = $id";

    $result = mysqli_query($conn, $sql) or die("Connection failed: " . mysqli_connect_errno());
    $row = mysqli_fetch_assoc($result);

    // Now you can use $row data as needed for the session user
}
?>


<div class="button-container">
  <div class="header">
    <section class="flex">
      <div class="icons">
        <div id="user-btn" class="fas fa-user"></div>
        <div id="toggle-btn" class="fas fa-sun"></div>
      </div>
      <div class="profile">
        <img src="admin\images\profile.png" alt="">
        <h3><?php echo isset($row["fname"]) && isset($row["lname"]) ? $row["fname"] . " " . $row["lname"] : "Guest"; ?></h3>
        <span>User</span>
        <div class="flex-btn">
          <?php if(isset($row["fname"]) && isset($row["lname"])): ?>
            <a href="logout.php" class="btn">Logout</a>
            <a href="update-user.php?id=<?php echo isset($_SESSION["id"]) ? $_SESSION["id"] : ''; ?>" class="btn">Update</a>
          <?php else: ?>
            <a href="user-login.php" class="btn">Login</a>
            <a href="user-register.php" class="btn">Register</a>
          <?php endif; ?>
        </div>
      </div>
    </section>
  </div>
</div>

<script src="js/script.js"></script>
