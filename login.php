<?php
session_start();
require "database.php";

$errors = [];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if(empty($username) || empty($password)){
        $errors[] = "All fields are required";
    }

    if(empty($errors)){

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(["username" => $username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user["password"])){

            session_regenerate_id(true);

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];

            header("Location: dashboard.php");
            exit;

        } else {
            $errors[] = "Invalid username or password";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<style>
body{
font-family: Arial;
background:#f0f2f5;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.container{
background:white;
padding:30px;
border-radius:10px;
width:350px;
box-shadow:0px 0px 10px rgba(0,0,0,0.1);
text-align:center;
}

input{
width:100%;
padding:10px;
margin:10px 0;
border:1px solid #ccc;
border-radius:5px;
}

button{
width:100%;
padding:10px;
background:#1877f2;
color:white;
border:none;
border-radius:5px;
}

.error{
color:red;
}
</style>
</head>

<body>

<div class="container">

<h2>Login</h2>

<?php
foreach($errors as $error){
    echo "<p class='error'>$error</p>";
}
?>

<form method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit">Login</button>

</form>

<p>Don't have an account? <a href="register.php">Register</a></p>

</div>

</body>
</html>