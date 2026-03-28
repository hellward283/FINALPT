<?php 
include "database.php"; 
?>

<!DOCTYPE html>
<html>
<head>
<title>Post System</title>
<script src="script.js"></script>
</head>

<body>

<h2>Posts</h2>

<?php

$sql = "SELECT * FROM posts ORDER BY id DESC";
$result = $conn->query($sql);

if($result->num_rows > 0){

    while($row = $result->fetch_assoc()){
?>

<div style="border:1px solid #000; padding:10px; margin:10px;">

    <!-- POST CONTENT -->
    <p><?php echo htmlspecialchars($row['content']); ?></p>

    <!-- LIKE BUTTON -->
    <button onclick="likePost(<?php echo $row['id']; ?>)">Like</button>

    <span id="like-count-<?php echo $row['id']; ?>">
        <?php
        $likes = $conn->query("SELECT COUNT(*) as total FROM likes WHERE post_id=".$row['id']);
        $likeRow = $likes->fetch_assoc();
        echo $likeRow['total'];
        ?>
    </span>

    <br><br>

    <!-- COMMENT INPUT -->
    <input type="text" id="comment-<?php echo $row['id']; ?>" placeholder="Write comment">

    <button onclick="addComment(<?php echo $row['id']; ?>)">Comment</button>

    <hr>

    <!-- SHOW COMMENTS -->
    <?php

    $comments = $conn->query("SELECT * FROM comments WHERE post_id=".$row['id']);

    if($comments->num_rows > 0){

        while($c = $comments->fetch_assoc()){
    ?>

    <div style="margin-left:20px;">

        <span id="comment-text-<?php echo $c['id']; ?>">
            <?php echo htmlspecialchars($c['comment']); ?>
        </span>

        <button onclick="editComment(<?php echo $c['id']; ?>)">Edit</button>

        <button onclick="deleteComment(<?php echo $c['id']; ?>)">Delete</button>

    </div>

    <?php
        }
    }
    ?>

</div>

<?php
    }

}else{

    echo "<p>No posts yet.</p>";

}

?>

</body>
</html>