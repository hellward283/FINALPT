<?php
include "database.php";

$post_id = $_POST['post_id'];
$comment = $_POST['comment'];

$conn->query("INSERT INTO comments (post_id, comment) VALUES ('$post_id', '$comment')");
?>