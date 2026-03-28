<?php
include "database.php";

$post_id = $_POST['post_id'];

$conn->query("INSERT INTO likes (post_id) VALUES ('$post_id')");
?>