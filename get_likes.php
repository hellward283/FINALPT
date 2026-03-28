<?php
include "database.php";

$post_id = $_GET['post_id'];

$result = $conn->query("SELECT COUNT(*) as total FROM likes WHERE post_id='$post_id'");
$row = $result->fetch_assoc();

echo $row['total'];
?>