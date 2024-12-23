<?php
session_start();
if($_SESSION["loggedIn"] != true){
    echo 'not logged in';
    header("Location: login.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "root";

$dbname = "datasiswa";
$conn = new mysqli($servername, $username, $password, $dbname);

//periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//mencari data berdasarkan id
$id = $_GET['id'];
$sql = "SELECT * FROM siswa WHERE id = {$id}";
$result = $conn->query($sql);
// periksa bahwa row sudah ditampilkan
if ($result->num_rows > 0) {
    // Ambil row pertama 
    $row = $result->fetch_assoc();

} else {
    echo "Tidak ada data yang ditemukan berdasarkan id.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
        <form action="update.php" method="post" id="siswaForm">
            <h2>EDIT DATA SISWA</h2>
            <input type="hidden" name="id" value="<?php echo $row['id']?>">
            <div class="form-group">
                <label for="Nama">Nama</label>
                <input type="text" id="Nama" name="Nama" required value="<?php echo $row['Nama'] ?>">
            </div>
            <div class="form-group">
                <label for="NIS">NIS</label>
                <input type="text" id="NIS" name="NIS" required value="<?php echo $row['NIS'] ?>">
            </div>
            <div class="form-group">
                <label for="TTL">Tempat, Tanggal Lahir</label>
                <input type="text" name="TTL" id="TTL" autocomplete="off" required value="<?php echo $row['TTL'] ?>">
            </div>
            <div>
                <label for="Kelas">Kelas</label>
                <input type="numeric" id="Kelas" name="Kelas" required value="<?php echo $row['Kelas'] ?>">
            </div>
            <div class="form-group">
                <button type="submit">Ubah</button>
            </div>
        </form>
    </div>
    <script src="scripts.js"></script>
</body>
</html>