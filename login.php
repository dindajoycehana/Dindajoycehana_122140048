<?php
session_start();
if(isset($_SESSION["loggedIn"]) ){
    if($_SESSION["loggedIn"]  == true){ 
    echo 'not logged in';
    header("Location: index.php");
    exit;
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">

    <script>
        // memberi pop up ketika login success
        function loginSuccess() {
            alert('Login berhasil!');
            window.location.href = 'index.php';
        }
        // memberi pop up ketika login gagal
        function loginError() {
            alert('Username atau password salah!');
            window.location.href = 'login.php';
        }
    </script>
</head>

<body>
    <!-- form login  -->
<div class="container">
        <form action="process.php" method="post" id="loginForm" enctype="multipart/form-data">
            <h2>LOGIN</h2>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required minlength="5" maxlength="20">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required minlength="8" maxlength="15">
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>

    
    <script src="scripts.js"></script>
</body>
</html>
