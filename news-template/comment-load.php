<?php
include "config.php";
$post_id =$_POST["postid"];
$output = '';  // Initialize an empty string to store the output

$sql6 = "SELECT * FROM comments WHERE post_id='$post_id' ORDER BY id DESC";
$result6 = mysqli_query($conn, $sql6) or die("Query failed");

if (mysqli_num_rows($result6) > 0) {
    while ($row6 = mysqli_fetch_assoc($result6)) {
        $comment = $row6['comment'];
        $email = $row6['user_email'];

        // Concatenate HTML content to the $output variable
        $output .= '<div class="cbox"><span><i class="fa-solid fa-user"></i>' . $email . '</span><p>' . $comment . '</p></div>';
    }
} else {
    // Concatenate HTML content for the case where there are no comments
    $output .= '<div class="user-banner"><div class="content"><p>No comments</p></div></div>';
}

// Now $output contains the HTML content
echo $output;
?>
