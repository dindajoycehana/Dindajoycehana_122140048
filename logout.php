<?php
session_start();
if($_SESSION["loggedIn"] == true){
    session_unset();
    setcookie("admin_user", "", time() -3600, "/"); // agar expired
    echo 'not logged in';
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta http-equiv="refresh" content="5;url=login.php">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center justify-content-center">
    <div class="container" >
        <h2>Anda Telah Logout</h2>
        <a href="login.php" class="button">Login Kembali</a>
    </div>

</body>
</html>
