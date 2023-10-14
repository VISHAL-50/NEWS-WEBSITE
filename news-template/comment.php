
<div class="block">
	<div class="block-header">
		<div class="title">
			<h2>Comments</h2>
			<div class="tag">

				<?php

				// Assuming $post_id is defined somewhere in your code
				
				// Example query to count the number of rows in the 'comment' column for a specific post_id
				$sql_count = "SELECT COUNT(post_id) AS comment_count FROM comments WHERE post_id = '$post_id'";

				$result_count = mysqli_query($conn, $sql_count) or die("Query failed");

				if ($row_count = mysqli_fetch_assoc($result_count)) {
					$comment_count = $row_count['comment_count'];
					echo "Number of comments: " . $comment_count;
				} else {
					echo "No comments found.";
				}?>
</div>
		</div>
	</div>
	<form class="writing" id="comment_section">
		<textarea name="comment" id="comment" class="textarea" autofocus spellcheck="false" rows="20" cols="40" autocomplete="off"
			role="textbox" aria-autocomplete="list" aria-haspopup="true" placeholder="Your comment"></textarea>
		<button type="submit"  name="submit_comment" value="Post" class="btn primary group-button" id="insert">Send <i
				class="fa fa-paper-plane" aria-hidden="true"></i></button>
	</form>
	<div class="comment" id="table-data">
	</div>
</div>
<script type="text/javascript" >
$(document).ready(function(){
    function loadtable(){
        var post_id = <?php echo json_encode($_GET['id']); ?>;
        $.ajax({
            url: "comment-load.php",
            data: {postid: post_id},
            type: "POST",
            success : function(data){
                $("#table-data").html(data);
            }
        });}
    loadtable();
	$("#insert").on("click", function(e){
        e.preventDefault();
		
        var com = $("#comment").val();
		if (com.length > 0) {
        var user_email = "<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : ''; ?>";
        var pid = <?php echo json_encode($_GET['id']); ?>;
        $.ajax({
            url: "comment-insert.php",
            type: "POST",
            data: {comment: com, email_id: user_email, post_id: pid},
            success: function(data){
                if(data == 1){
                    loadtable();
					$("#comment_section").trigger("reset");
                } else {
                    alert("record not found!! error");
                }
            }
        });
	}else{
		alert("write some comments");
}});
});


	</script>