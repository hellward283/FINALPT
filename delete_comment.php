<?php
include "database.php";

$id = $_POST['id'];

$conn->query("DELETE FROM comments WHERE id='$id'");
?>