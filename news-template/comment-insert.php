<?php
include "config.php";

// Assuming $post_id is defined somewhere in your code
$post_id = $_POST["post_id"];
$user_email = $_POST["email_id"];
$comment = $_POST["comment"];

$sql5 = "INSERT INTO comments(post_id, user_email, comment) VALUES ('$post_id', '$user_email', '$comment')";
$result5 = mysqli_query($conn, $sql5) or die("Query failed");

if ($result5) {

    echo 1;
} else {
    echo 0;
}
?>
