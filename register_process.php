<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require "database.php";

$errors = [];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $fullname = trim($_POST["fullname"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if(empty($fullname) || empty($username) || empty($password)){
        $errors[] = "All fields are required";
    }

    if(strlen($password) < 6){
        $errors[] = "Password must be at least 6 characters";
    }

    if(empty($errors)){
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username");
        $stmt->execute(["username" => $username]);

        if($stmt->fetch()){
            $errors[] = "Username already taken";
        }
    }

    if(empty($errors)){

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (fullname, username, password)
                VALUES (:fullname, :username, :password)";

        $stmt = $pdo->prepare($sql);

        if($stmt->execute([
            "fullname" => $fullname,
            "username" => $username,
            "password" => $hashedPassword
        ])){
            header("Location: login.php");
            exit;
        } else {
            $errors[] = "Something went wrong. Try again.";
        }
    }

    $_SESSION["errors"] = $errors;
    header("Location: register.php");
    exit;
}