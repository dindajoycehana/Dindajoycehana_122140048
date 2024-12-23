<?php
session_start();
if($_SESSION["loggedIn"] == true){
    echo 'not logged in';
    header("Location: index.php");
    exit;
}

$db_servername = "localhost";
$db_username = "root";
$db_password = "root";
$db_name = "Datasiswa";

//periksa koneksi
$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

// periksa bahwa data tersubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Query untuk memeriksa admin
    $query = "SELECT * FROM admin WHERE username = ? AND email = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Data admin ditemukan
        $_SESSION['admin'] = $username;
        $_SESSION["loggedIn"]= true;
        // Set cookie untuk login
        setcookie("admin_user", $username, time() + (86400 * 7), "/"); // Berlaku selama 7 hari

        echo "<script>alert('Login berhasil!'); window.location.href = 'index.php';</script>";
    } else {
        // Data admin tidak ditemukan
        echo "<script>alert('Username atau password salah!'); window.location.href = 'login.php';</script>";
    }

    $stmt->close();
}

$conn->close();
?>  