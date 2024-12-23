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
    <title>Data Siswa Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<!-- membuat form untuk inputkan data siswa -->
<div class="container">
        <form action="datasiswaprocess.php" method="post" id="siswaForm" enctype="multipart/form-data">
            <h2>Tambah Data Siswa</h2>
            <div class="form-group">
                <label for="Nama">Nama</label>
                <input type="text" id="Nama" name="Nama" required >
            </div>
            <div class="form-group">
                <label for="NIS">NIS</label>
                <input type="text" id="NIS" name="NIS" required >
            </div>
            <div class="form-group">
                <label for="TTL">Tempat, Tanggal Lahir</label>
                <input type="text" id="TTL" name="TTL" required >
            </div>
            <div class="form-group">
                <label for="Kelas">Kelas</label>
                <input type="numeric" id="Kelas" name="Kelas" required >
            </div>
            <div class="form-group">
                <button type="submit">Tambah Data</button>
            </div>
        </form>
    </div>

    
<script src="scripts.js"></script>
</body>
</html>


