<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<title>SocialHub | Register</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background: linear-gradient(135deg,#1877f2,#4e73df);
height:100vh;
display:flex;
justify-content:center;
align-items:center;
font-family: Arial;
}

.card{
border:none;
border-radius:15px;
box-shadow:0px 10px 30px rgba(0,0,0,0.2);
}

.logo{
font-size:32px;
font-weight:bold;
color:#1877f2;
}

.subtitle{
color:gray;
font-size:14px;
}

.btn-socialhub{
background:#1877f2;
color:white;
font-weight:bold;
}

.btn-socialhub:hover{
background:#0f5ed7;
color:white;
}

</style>

</head>

<body>

<div class="container">
<div class="row justify-content-center">

<div class="col-md-5">

<div class="card p-4">

<div class="text-center mb-3">

<div class="logo">SocialHub</div>
<p class="subtitle">Create your account</p>

</div>

<form method="POST" action="register_process.php">

<div class="mb-3">
<label class="form-label">Full Name</label>
<input type="text" name="fullname" class="form-control" placeholder="Enter your full name" required>
</div>

<div class="mb-3">
<label class="form-label">Username</label>
<input type="text" name="username" class="form-control" placeholder="Choose a username" required>
</div>

<div class="mb-3">
<label class="form-label">Password</label>
<input type="password" name="password" class="form-control" placeholder="Create a password" required>
</div>

<div class="d-grid">
<button type="submit" class="btn btn-socialhub">Register</button>
</div>

</form>

<hr>

<div class="text-center">
Already have an account?
<a href="login.php">Login</a>
</div>

</div>

</div>

</div>
</div>

</body>
</html>