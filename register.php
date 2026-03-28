<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>

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

<h2>Register</h2>

<?php
if(isset($_SESSION["errors"])){
    foreach($_SESSION["errors"] as $error){
        echo "<p class='error'>$error</p>";
    }
    unset($_SESSION["errors"]);
}
?>

<form method="POST" action="register_process.php">

<input type="text" name="fullname" placeholder="Full Name" required>

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit">Register</button>

</form>

<p>Already have an account? <a href="login.php">Login</a></p>

</div>

</body>
</html>