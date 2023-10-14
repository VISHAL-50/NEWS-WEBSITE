<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Loader</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
</head>
<body>

<div id="table-data">
    <!-- Comments will be displayed here -->
</div>

<button id="load-btn">Load Comments</button>

<script>
    $(document).ready(function(){
        $("#load-btn").on("click", function(e){
            $.ajax({
                url: "comment-load.php",
                type: "POST",
                success : function(data){
                    $("#table-data").html(data);
                }
            });
        })
    });
</script>

</body>
</html>
