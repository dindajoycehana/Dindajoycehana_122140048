<?php
session_start();
if($_SESSION["loggedIn"] != true){
    echo 'not logged in';
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Home.css">
    <title>WELCOME</title>
</head>
<body>
    <!-- tampilan home page -->
<header>
        <nav class="navbar">
            <div class="nav-left">
                <a class="navbar-brand" href="#">Hogwart School</a>
            </div>
            <div class="nav-right">
                <a href="index.php">Home</a>
                <a href="rekapdatasiswa.php">Data Siswa</a>
                <a href="logout.php">Logout</a>
            </div>
            </div>
        </nav>
    </header>

    <div class="centered">
        <h1> Hogwart School </h1>
        <h3> Selamat Datang di Sekolah Ilmu Tinggi Hogwart</h3>
        <img src="img/Dinjoypic.png" alt="dinda sihir" class="img-fluid">
    </div>
</body>
</html>

