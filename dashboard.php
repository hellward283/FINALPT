<?php
session_start();
include "database.php";

if(!isset($_SESSION["user_id"])){
    header("Location: login.php");
    exit;
}
?>

<h2>Welcome <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h2>

<p>You are logged in.</p>

<h3>Create Post</h3>

<form action="create_post.php" method="POST">

<textarea name="content" placeholder="What's on your mind?" required></textarea><br><br>

<button type="submit">Post</button>

</form>

<hr>

<h3>Recent Posts</h3>

<?php

$sql = "SELECT posts.*, users.username 
        FROM posts 
        JOIN users ON posts.user_id = users.id
        ORDER BY created_at DESC";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){

echo "<div>";

echo "<b>".$row['username']."</b><br>";
echo $row['content']."<br>";
echo "<small>".$row['created_at']."</small>";

echo "</div><hr>";

}

?>

<a href="logout.php">Logout</a>