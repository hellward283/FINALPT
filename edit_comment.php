<?php
include "database.php";

$id = $_POST['id'];
$comment = $_POST['comment'];

$conn->query("UPDATE comments SET comment='$comment' WHERE id='$id'");
?>