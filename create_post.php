<?php
session_start();
include "database.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

$content = $_POST['content'];
$user_id = $_SESSION['user_id'];

$sql = "INSERT INTO posts (user_id, content) VALUES ('$user_id','$content')";
$conn->query($sql);

header("Location: dashboard.php");
}
?>